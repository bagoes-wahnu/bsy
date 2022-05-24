<section id="content_outer_wrapper">
  <div id="content_wrapper" class="card-overlay">
    <div id="header_wrapper" class="header-md">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <header id="header">
              <h1>Informasi Data Jabatan</h1>
              <p>Berikut ini adalah beberapa informasi data jabatan terkait aplikasi.</p>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                <li><a href="javascript:void(0)">Master</a></li>
                <li class="active">Master Jabatan</li>
              </ol>
            </header>
          </div>
        </div>
      </div>
    </div>
    <div id="content" class="container-fluid">
      <div class="content-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="card">
              <header class="card-heading">
                   <button type="button" onclick="add_jabatan()" class="btn btn-default oke">Tambah Data</button>   
              </header>
              <div class="card-body">
                <div id="items"> 
                 <!--  <div id="item2">
                      <a href="#" class="move-up"><i class="zmdi zmdi-chevron-up"></i></a>
                      <a href="#" class="move-down"><i class="zmdi zmdi-chevron-down"></i></a>
                      <span class="label label-danger font-size-12"><i class="zmdi zmdi-close"></i></span> Direksi
                      
                    </div> -->
                  <?php foreach ($jabatan as $key ) {
                    if ($key['STATUS']==1) {
                      $status = '<span class="label label-success font-size-12"><i class="zmdi zmdi-check"></i></span> ';
                    }else{
                      $status = '<span class="label label-danger font-size-12"><i class="zmdi zmdi-close"></i></span> ';
                    }
                  ?>
                    <div id="item1">
                      <a href="<?php echo site_url("jabatan/up_down/up/".$key['ID_JABATAN']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-up"><i class="zmdi zmdi-chevron-up"></i></a>
                      <a href="<?php echo site_url("jabatan/up_down/down/".$key['ID_JABATAN']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-down"><i class="zmdi zmdi-chevron-down"></i></a>
                      <?php echo $status.$key['JABATAN']; ?>
                      <a  onclick="edit_jabatan(<?php echo $key['ID_JABATAN']; ?>)"  class="move-down samping">Ubah</a> 
                    </div>
                   
                    <?php 
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- start: modal jabatan -->
<div class="modal fade" id="modal_jabatan" tabindex="-1" role="dialog" aria-labelledby="modal_jabatan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal Data Jabatan</h4>
                <p>Isilah data dibawah ini untuk menambahkan data jabatan !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_jabatan" method="post" action="" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl"> Jabatan : </label>
                    <input id="jabatan" type="text" name="jabatan" placeholder="Masukan Jabatan" data-rule-required="true"  class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <table>
                        <tr>
                            <td>
                                <label class="lbl">Status</label>
                            </td>
                            <td> : </td>
                            <td> 
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" class="toggle-primary" id="status" name="status" value="1" checked>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_save_jabatan">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal jabatan -->


<script type="text/javascript">
  // $('.move-up').click(function(e){
  //     var $div = $(this).closest('div');
  //     if ($div.index() > 0){
  //         $div.fadeOut('slow',function(){
  //             $div.insertBefore($div.prev('div')).fadeIn('slow');
  //         });
  //     }
  // });

  // $('.move-down').click(function(e){
  //     var $div = $(this).closest('div');
  //     if ($div.index() <= ($div.siblings('div').length - 1)){
  //         $div.fadeOut('slow',function(){
  //             $div.insertAfter($div.next('div')).fadeIn('slow');
  //         });
  //     }
  // });
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function reset_form_jabatan() {
        $('#modal_jabatan #jabatan').val('');
        $('#modal_jabatan #status').prop('checked', true);
        $('#btn_save_jabatan').removeAttr('onclick');
    }

    function add_jabatan() {
        $('#modal_jabatan').modal('show');
        $('#modal_jabatan .modal-header .modal-title').html('Tambah Data Jabatan');
        $('#modal_jabatan .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data jabatan !');
        $('#btn_save_jabatan').attr('onclick', 'simpan_jabatan()');
        $('#btn_save_jabatan').html('Tambah');
        
    }

    function edit_jabatan(id_jabatan) {
        $('#modal_jabatan').modal('show');
        $('#modal_jabatan .modal-header .modal-title').html('Ubah Data Jabatan');
        $('#modal_jabatan .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data jabatan !');
        $('#btn_save_jabatan').attr('onclick', 'simpan_jabatan('+id_jabatan+')');
        $('#btn_save_jabatan').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("jabatan/get"); ?>/"+id_jabatan,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_jabatan #jabatan').val(obj.data['JABATAN']);

                    if(obj.data['STATUS'] == 1){
                        $('#status').prop('checked', true);
                    }else{
                        $('#status').prop('checked', false);
                    }
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_jabatan(id_jabatan = '') {
        var data = $("#form_jabatan").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("jabatan/save"); ?>/"+id_jabatan,
            data:data,
            beforeSend:function() {
                $("#btn_save_jabatan").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_jabatan').modal('hide');
                    alertify.success(obj.msg);
                    setTimeout
                    window.setTimeout(function(){
                       location.reload();
                   }, 700);
                }
            },
            complete:function() {
                $("#btn_save_jabatan").removeAttr('disabled').attr('onclick', 'simpan_jabatan('+id_jabatan+')');
                if(id_jabatan == ''){
                    $('#btn_save_jabatan').html('Tambah');
                }else{
                    $('#btn_save_jabatan').html('Simpan');
                }
            }

        });
    }

    // function hapus_jabatan(id_jabatan = '') {
    //     var c = confirm('Apakah Anda yakin akan menghapus data ini?');

    //     if(c == true){
    //         $.ajax({
    //             type:"POST",
    //             url:"<?php echo base_url("jabatan/delete_jabatan"); ?>/"+id_jabatan,
    //             beforeSend:function() {
    //                 preventLeaving();
    //             },
    //             success:function(msg){
    //                 window.onbeforeunload = false;
    //                 var obj = jQuery.parseJSON(msg);
    //                 if(obj.status != "OK"){
    //                     swal("Peringatan!", obj.msg, "warning");
    //                 } else {
    //                     alertify.success(obj.msg);
    //                     window.setTimeout(function(){
    //                        location.reload();
    //                    }, 1500);
    //                 }
    //             }
    //         });
    //     }else{
    //         alertify.error('Proses berhasil dibatalkan');
    //     }
    // }

    $('#modal_jabatan').on('hidden.bs.modal', function () {
        reset_form_jabatan();
    });


    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }

</script>
<style type="text/css">
  #items div{
    background-color: #f5f5f5;
    padding: 10px 0px;
    margin-bottom: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
  }

  #items div a{
    padding: 10px 8px 10px 8px;
    background-color: #ecf0f1;
    color: #34495e;
  }

  #items div a:hover,
  #items div a:focus{
    color: #fff;
    background-color: #e74c3c;
  }

  #items div .samping{
    padding: 10px 16px;
    float: right;
    margin-top: -10px;
  }

  #items div .samping:hover,
  #items div .samping:focus{
    color: #fff;
    background-color: #42a5f5;
  }

  #items div .label{
    margin: 0px 4px;
    font-weight: bold;
  }

  #items div .label-danger{padding: 3px 8px;}

  #items div .label-success{padding: 3px 7px;}
</style>
