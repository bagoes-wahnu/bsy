<script src="<?php echo base_url();?>assets/js/jquery.masknumber.js"></script>
<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>SDM Profile</h1>
                            <p>Berikut ini adalah beberapa informasi data SDM profile terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Company Profile</a></li>
                                <li class="active">SDM Profile</li>
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
                            <div class="card-body p-0">
                                <div class="tabpanel">
                                    <ul class="nav nav-tabs">
                                        <?php 
                                        $kota = $this->session->userdata('kota');
                                        ?>
                                        <?php if ($kota!=2){
                                            $active_a = 'active';
                                            $active_b = '';
                                        }else{
                                            $active_a = '';
                                            $active_b = 'active';
                                        }
                                        ?>
                                        <?php if (($kota==0) || ($kota==1)): ?>
                                        <li class="<?php echo $active_a ?>">
                                            <a href="#bna" data-toggle="tab" aria-expanded="true">Wilayah BNA</a>
                                        </li>
                                    <?php endif ?>
                                    <?php if (($kota==0) || ($kota==2)): ?>
                                    <li class="<?php echo $active_b ?>">
                                        <a href="#krt" data-toggle="tab" aria-expanded="true">Wilayah KRT</a>
                                    </li>
                                <?php endif ?>
                                
                                <li class="">
                                    <a href="#kons" data-toggle="tab" aria-expanded="true">Konsolidasi</a>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="tab-content p-20" style="padding-bottom: 0px !important;">
                            <div class="tab-pane fadeIn  <?php echo $active_a ?>" id="bna">
                                <div class="row">
                                    <div class="col-md-6 bna">
                                        <h1>Wilayah Banjarnegara</h1>
                                        <p class="sub_judul">
                                            Silahkan mengisi data terkait SDM Profil wilayah Bagian Banjarnegara !
                                        </p>
                                        <div class="form-group">
                                          <label class="control-label lbl">Laki - Laki : </label>
                                          <input id="laki_laki_1" type="text" name="laki_laki_1" placeholder="Masukan Jumlah Laki - Laki" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['L'] ;?>">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label lbl">Perempuan : </label>
                                          <input id="perempuan_1" type="text" name="perempuan_1" placeholder="Masukan Jumlah Perempuan" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['P'] ;?>">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label lbl">SD-SMP : </label>
                                          <input id="sdsmp_1" type="text" name="sdsmp_1" placeholder="Masukan Jumlah SD-SMP" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['SD'] ;?>">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label lbl">SMA/SMK : </label>
                                          <input id="smak_1" type="text" name="smak_1" placeholder="Masukan Jumlah SMA/SMK" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['SMA'] ;?>">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label lbl">D3 : </label>
                                          <input id="d3_1" type="text" name="d3_1" placeholder="Masukan Jumlah D3" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['D3'] ;?>">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label lbl">S1 - Sarjana : </label>
                                          <input id="s1_1" type="text" name="s1_1" placeholder="Masukan Jumlah S1" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['S1'] ;?>">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label lbl">S2 - Magister : </label>
                                          <input id="s2_1" type="text" name="s2_1" placeholder="Masukan Jumlah S2" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['S2'] ;?>">
                                      </div>
                                      
                                      <div style="float: right; padding-right: 30px; padding-bottom: 10px;">
                                        <button type="submit" class="btn btn-default oke"  onclick="simpan_pendidikan()" >Simpan</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fadeIn  <?php echo $active_b ?>" id="krt">
                            <div class="row">
                                <div class="col-md-6 wonosobo">
                                    <h1>Wilayah Wonosobo</h1>
                                    <p class="sub_judul">
                                        Silahkan mengisi data terkait SDM Profil wilayah Bagian Wonosobo !
                                    </p>
                                    <div class="form-group">
                                      <label class="control-label lbl">Laki - Laki : </label>
                                      <input id="laki_laki_2" type="text" name="laki_laki_2" placeholder="Masukan Jumlah Laki - Laki" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[1]['L'] ;?>">
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label lbl">Perempuan : </label>
                                      <input id="perempuan_2" type="text" name="perempuan_2" placeholder="Masukan Jumlah Perempuan" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[1]['P'] ;?>">
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label lbl">SD-SMP : </label>
                                      <input id="sdsmp_2" type="text" name="sdsmp_2" placeholder="Masukan Jumlah SD-SMP" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[1]['SD'] ;?>">
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label lbl">SMA/SMK : </label>
                                      <input id="smak_2" type="text" name="smak_2" placeholder="Masukan Jumlah SMA/SMK" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[1]['SMA'] ;?>">
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label lbl">D3 : </label>
                                      <input id="d3_2" type="text" name="d3_2" placeholder="Masukan Jumlah D3" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[0]['D3'] ;?>">
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label lbl">S1 - Sarjana : </label>
                                      <input id="s1_2" type="text" name="s1_2" placeholder="Masukan Jumlah S1" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[1]['S1'] ;?>">
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label lbl">S2 - Magister : </label>
                                      <input id="s2_2" type="text" name="s2_2" placeholder="Masukan Jumlah S2" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" value="<?php echo $data[1]['S2'] ;?>">
                                  </div>
                                  
                                  <div style="float: right; padding-right: 30px; padding-bottom: 10px;">
                                    <button type="submit" class="btn btn-default oke"  onclick="simpan_pendidikan()" >Simpan</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeIn " id="kons">
                        <div class="row">
                            <div class="col-md-6 konsolidasi">
                                <h1>Wilayah Konsolidasi</h1>
                                <p class="sub_judul">
                                    Berikut ini adalah total keseluruhan SDM yang terlibat dalam kegiatan dan pengembangan Perusahaan BPR Surya Yudha, baik dari wilayah Banjarnegara maupun Wonosobo.
                                </p>
                                <table>
                                    <tr>
                                        <td class="head">Total Laki - Laki</td>
                                        <td>:</td>
                                        <td><?php echo ($data[0]['L']+$data[1]['L']) ;?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td class="head">Total Perempuan</td>
                                        <td>:</td>
                                        <td><?php echo ($data[0]['P']+$data[1]['P']) ;?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td class="head">Total SD - SMP</td>
                                        <td>:</td>
                                        <td><?php echo ($data[0]['SD']+$data[1]['SD']) ;?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td class="head">Total SMA / SMK</td>
                                        <td>:</td>
                                        <td><?php echo ($data[0]['SMA']+$data[1]['SMA']) ;?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td class="head">Total D3</td>
                                        <td>:</td>
                                        <td><?php echo ($data[0]['D3']+$data[1]['D3']) ;?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td class="head">Total Sarjana S1</td>
                                        <td>:</td>
                                        <td><?php echo ($data[0]['S1']+$data[1]['S1']) ;?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td class="head">Total Magister S2</td>
                                        <td>:</td>
                                        <td><?php echo ($data[0]['S2']+$data[1]['S2']) ;?> Orang</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>







<script type="text/javascript">
   $(document).ready(function () {
    $('[name=laki_laki_1]').maskNumber({integer: true,thousands: ''});
    $('[name=perempuan_1]').maskNumber({integer: true,thousands: ''});
    $('[name=sdsmp_1]').maskNumber({integer: true,thousands: ''});
    $('[name=smak_1]').maskNumber({integer: true,thousands: ''});
    $('[name=d3_1]').maskNumber({integer: true,thousands: ''});
    $('[name=s1_1]').maskNumber({integer: true,thousands: ''});
    $('[name=s2_1]').maskNumber({integer: true,thousands: ''});
    $('[name=laki_laki_2]').maskNumber({integer: true,thousands: ''});
    $('[name=perempuan_2]').maskNumber({integer: true,thousands: ''});
    $('[name=sdsmp_2]').maskNumber({integer: true,thousands: ''});
    $('[name=smak_2]').maskNumber({integer: true,thousands: ''});
    $('[name=d3_2]').maskNumber({integer: true,thousands: ''});
    $('[name=s1_2]').maskNumber({integer: true,thousands: ''});
    $('[name=s2_2]').maskNumber({integer: true,thousands: ''});
});

   function simpan_pendidikan(id_pendidikan = '') {
    var laki_laki_1         =  $("#laki_laki_1").val();
    var perempuan_1         =  $("#perempuan_1").val();
    var sdsmp_1             =  $("#sdsmp_1").val();
    var smak_1              =  $("#smak_1").val();
    var d3_1                =  $("#d3_1").val();
    var s1_1                =  $("#s1_1").val();
    var s2_1                =  $("#s2_1").val();
    var laki_laki_2         =  $("#laki_laki_2").val();
    var perempuan_2         =  $("#perempuan_2").val();
    var sdsmp_2             =  $("#sdsmp_2").val();
    var smak_2              =  $("#smak_2").val();
    var d3_2              =  $("#d3_2").val();
    var s1_2                =  $("#s1_2").val();
    var s2_2                =  $("#s2_2").val();

    if ((laki_laki_1<0) || (perempuan_1<0) || (sdsmp_1<0) || (smak_1<0) || (d3_1<0) || (s1_1<0) || (s2_1<0) || (laki_laki_2<0) || (perempuan_2<0) || (sdsmp_2<0) || (smak_2<0) || (d3_2<0) || (s1_2<0) || (s2_2 <0)) {
        alertify.error('Data tidak boleh kurang dari nol !');
    }else{
     $.ajax({
        type    : "POST",
        data    : {laki_laki_1 : laki_laki_1, perempuan_1 : perempuan_1, sdsmp_1 : sdsmp_1, smak_1 : smak_1, d3_1 : d3_1, s1_1 : s1_1, s2_1 : s2_1, laki_laki_2 : laki_laki_2, perempuan_2 : perempuan_2, sdsmp_2 : sdsmp_2, smak_2 : smak_2, d3_2 : d3_2,s1_2 : s1_2, s2_2 : s2_2},
        url     : "<?php echo site_url('pendidikan/save_pendidikan') ?>",
        success: function(data){
            // alert('Data Berhasil Disimpan !');
            alertify.success('Data Berhasil Disimpan !');
            setTimeout
            window.setTimeout(function(){
             location.reload();
         }, 700);
            
        },
        error : function(data){
        }
    });
 }
}

</script>

<style type="text/css">
.slider_gambar{margin-top: 15px;}

.slider_gambar .fiks{
    position: relative;
    width: 100%;
    height: 300px;
    overflow: hidden;
    background-color: #f5f5f5;
}

.slider_gambar .fiks img{
    position: absolute;
    top: -9999px;
    left: -9999px;
    right: -9999px;
    bottom: -9999px;
    margin: auto;
}

.sub_judul{
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    margin-bottom: 0px;
    line-height: 22px;
    margin-bottom: 15px;
}

.bna h1,
.wonosobo h1,
.konsolidasi h1{
    font-family: 'Montserrat', sans-serif;
    color: #e74c3c;
    letter-spacing: -0.7px;
    font-weight: bold;
    margin-top: 0px;
}

#kons table tr .head{
    color: #e74c3c;
    font-weight: bold;
}

#kons table tr td{
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: -0.2px;
    padding: 0px 10px 8px 0px;
}
</style>