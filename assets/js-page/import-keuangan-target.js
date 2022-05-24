var target_table = "#table1";
var ajax_source = siteUrl+"import/json_grid_target";

$(document).ready(function() {
	load_table();
});

function load_table() {
	$('.card-data-tables table tbody .checkbox-cell .checkbox input[type=checkbox]').each(function (i) {
		$(this).attr('id', "CheckboxId_" + (i + 1));
	});

	var oTable = $(target_table).DataTable({
		"bDestroy": true,
		"processing": true,
		"serverSide": true,
		"sAjaxSource": ajax_source,
		"sPaginationType": "full_numbers",
		"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
		"aoColumns": [
		{ "mData": "TAHUN" },
		{ "mData": "WAKTU" },
		{ "mData": "WAKTU" },
		{ "mData": "WAKTU" },
		{ "mData": "TAHUN" }
		],
		"aaSorting": [[0, 'desc']],
		"lengthMenu": [ 10, 25, 50, 75, 100 ],
		"pageLength": 10,
		"aoColumnDefs": [
		{
			"aTargets": [1],
			"mData":"WAKTU",
			"mRender": function (data, type, full) {
				tanggalan_full = full.WAKTU;
				tanggalan_split = tanggalan_full.split(" ");
				tanggalan = tanggalan_split[0].split("-");
				return tanggalan[2]+"-"+tanggalan[1]+"-"+tanggalan[0];
			}
		},
		{
			"aTargets": [2],
			"mData":"WAKTU",
			"mRender": function (data, type, full) {
				jam_full = full.WAKTU;
				jam_split = jam_full.split(" ");
				jam = jam_split[1].split(":");
				return jam[0]+"."+jam[1];
			}
		},
		{
			"aTargets": [3],
			"mData":"WAKTU",
			"mRender": function (data, type, full) {
				let progress = ``
				if(full.PROGRESS == 2) 
				progress = `<span class="aktif" style="color:green">Selesai</span>`;
				else if(full.PROGRESS == 1) 
				progress = `<span class="aktif" style="color:blue">Progress</span>`;
				else
				progress = `<span class="aktif" style="color:orange">Pending</span>`;

				return progress
			}
		},
		{
			"aTargets": [4],
			"mData":"TAHUN",
			"mRender": function (data, type, full) {
				var btn_delete = '<button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_data('+full.TAHUN+')"><i class="zmdi zmdi-delete"></i></button>';

				return btn_delete;
			}
		}
		],
		"fnHeaderCallback": function( nHead, aData, iStart, iEnd, aiDisplay ) {
			$(nHead).children('th').addClass('text-center');
		},
		"fnFooterCallback": function( nFoot, aData, iStart, iEnd, aiDisplay ) {
			$(nFoot).children('th').addClass('text-center');
		},
		"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
			$(nRow).children('td:nth-child(1),td:nth-child(2),td:nth-child(3),td:nth-child(4),td:nth-child(5)').addClass('text-center');
			$(nRow).children('td:nth-child(1),td:nth-child(2),td:nth-child(3),td:nth-child(4),td:nth-child(5)').attr('style', 'text-align: center;');
			$('[data-toggle=tooltip]').tooltip();
		}
	});
	
	$('[data-toggle="tooltip"]').tooltip();	
	$('.filter-input').keyup(function () {
		oTable.search($(this).val()).draw();
	});
	var $lengthSelect = $(".card.card-data-tables select.form-control.input-sm");
	var tableLength = $lengthSelect.detach();
	$('#dataTablesLength').append(tableLength);
	$(".card.card-data-tables .card-actions select.form-control.input-sm").dropdown({
		"optionClass": "withripple"
	});
	$('#dataTablesLength .dropdownjs .fakeinput').hide();
	$('#dataTablesLength .dropdownjs .dropdown-menu').hide();
	$('#dataTablesLength .dropdownjs ul').addClass('dropdown-menu dropdown-menu-right asem');

	/* Mengecek Apakah ada class yang memiliki sub "#myTable_wrapper .row .col-sm-6" */	
	$("#myTable_wrapper .row .col-sm-6").each(function(i){
		/* Jika ada maka ditambahkan class ukuran dengan nilai berbeda "i" */	
		$(this).addClass("ukuran"+i);
	});
}

function RefreshTable()
{
	$.getJSON(ajax_source, null, function( json ){
		table = $(target_table).dataTable();
		oSettings = table.fnSettings();

		table.fnClearTable(this);

		for (var i=0; i<json.aaData.length; i++)
		{
			table.oApi._fnAddData(oSettings, json.aaData[i]);
		}

		oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
		table.fnDraw();
	});
}

function cekFile(fileName='') {
	if(fileName != ''){
		var ext = fileName.split(".")[fileName.split(".").length - 1];
		if ((ext.toUpperCase() == "CSV")){
			return true;
		}else {
			swal('Peringatan!', 'File yang diterima adalah .csv<br>Silahkan pilih file lagi atau file tidak akan disimpan.', 'warning');
			$("[name=file]").val('');
			return false;
		}
		return true;
	}
}

function import_data(save=false) {
	if(save == false){
		$('#modal_import').modal({backdrop: 'static',keyboard: false}, 'show');
	}else{
		var file = new FormData($("#form_import")[0]);
		var data = $("#form_import").serializeArray();
		$.ajax({
			type:"POST",
			url: baseUrl+"/import/target",
			data:file,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function() {
				$("#btn_import").attr('disabled', '').removeAttr('onclick').html('Mengimport...');
				$('.btn_batal_import_data').hide();
				preventLeaving();
			},
			success:function(msg){
				window.onbeforeunload = false;
				$('.btn_batal_import_data').show();
				var obj = jQuery.parseJSON(msg);
				if(obj.status != "OK"){
					swal("Peringatan!", obj.msg, "warning");
				} else {
					$('#modal_import').modal('hide');
					swal("Berhasil!", obj.msg, "success");
					reset_form_import();
					RefreshTable();
				}
			},
			complete:function() {
				$('.btn_batal_import_data').show();
				$("#btn_import").removeAttr('disabled').attr('onclick', 'import_data(true)');
				$('#btn_import').html('Import');
			}

		});
	}
}

function hapus_data(tahun = '') {
	var c = confirm('Apakah Anda yakin akan menghapus data ini?');

	if(c == true){
		$.ajax({
			type:"POST",
			url:baseUrl+"/import/delete_target/"+tahun,
			beforeSend:function() {
				preventLeaving();
			},
			success:function(msg){
				window.onbeforeunload = false;
				var obj = jQuery.parseJSON(msg);
				if(obj.status != "OK"){
					swal("Peringatan!", obj.msg, "warning");
				} else {
					alertify.success(obj.msg);
					RefreshTable();
				}
			}
		});
	}else{
		alertify.error('Proses berhasil dibatalkan');
	}
}

function reset_form_import() {
	$('#tahun').val('');
	$('#tahun').change();
	$('#kategori').val('');
	$('#kategori').change();
	$('#file').val('');
	$('#file').change();
}

// $('#modal_import').on('hidden.bs.modal', function () {
//     $('#modal_import'#file').val('');
// });

function preventLeaving() {
	window.onbeforeunload = function() {
		return "Are you sure you want to navigate away?";
	}
}