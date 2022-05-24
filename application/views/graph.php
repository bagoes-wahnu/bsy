<?php
// function format_rupiah($rp, $start='Rp. ', $pemisah='.', $end=',-') {
//     $rp = empty($rp)? 0: $rp;
//     $hasil = $start.number_format($rp, 0, "", $pemisah) . $end;
//     return $hasil;
// }

function format_rupiah($rp, $start='Rp. ', $pemisah='.', $end='') {
    $rp = empty($rp)? 0: $rp;
    $angka_belakang =',00';
    $temp_rp = explode('.', $rp);

    if(count($temp_rp) > 1){
        $rp = $temp_rp[0];
        $angka_belakang = ','.$temp_rp[1];
    }

    $hasil = $start.number_format($rp, 0, "", $pemisah) . $angka_belakang . $end;
    return $hasil;
}

$id_kota = empty($id_kota)? 'all' : $id_kota;
?>
<div class="row dash_surya">
    <div class="col-md-3">
        <a href="<?php echo site_url('graph/bar/aset/'.$id_kota); ?>">
            <div class="kotak" style="height: 280px;">
                <img src="<?php echo base_url();?>assets/img/image_icon/ic_aset.png">
                <p>DATA ASET</p>
                <table>
                    <?php
                    $aset_target = empty($graph['ASET_TARGET'])? 0 : $graph['ASET_TARGET'];
                    $aset_realisasi = empty($graph['ASET_REALISASI'])? 0 : $graph['ASET_REALISASI'];
                    ?>
                    <tr>
                        <td>Target</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td><?php echo ($aset_target == 0)? '-' : format_rupiah($aset_target); ?></td>
                    </tr>
                    <tr>
                        <td>Existing</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td>
                            <?php 
                            echo ($aset_realisasi == 0)? '-' : format_rupiah($aset_realisasi);
                            if($aset_realisasi > $aset_target){
                                echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                            }elseif ($aset_realisasi < $aset_target) {
                                echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?php echo site_url('graph/bar/laba/'.$id_kota); ?>">
            <div class="kotak" style="height: 280px;">
                <img src="<?php echo base_url();?>assets/img/image_icon/ic_laba.png">
                <p>DATA LABA</p>
                <table>
                    <?php
                    $laba_target = empty($graph['LABA_TARGET'])? 0 : $graph['LABA_TARGET'];
                    $laba_realisasi = empty($graph['LABA_REALISASI'])? 0 : $graph['LABA_REALISASI'];
                    ?>
                    <tr>
                        <td>Target</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td><?php echo ($laba_target == 0)? '-' : format_rupiah($laba_target); ?></td>
                    </tr>
                    <tr>
                        <td>Existing</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td>
                            <?php 
                            echo ($laba_realisasi == 0)? '-' : format_rupiah($laba_realisasi);
                            if($laba_realisasi > $laba_target){
                                echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                            }elseif ($laba_realisasi < $laba_target) {
                                echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?php echo site_url('graph/bar/biaya/'.$id_kota); ?>">
            <div class="kotak" style="height: 280px;">
                <img src="<?php echo base_url();?>assets/img/image_icon/Biaya.png">
                <p>DATA BIAYA</p>
                <table>
                    <?php
                    $biaya_target = empty($graph['BIAYA_TARGET'])? 0 : $graph['BIAYA_TARGET'];
                    $biaya_realisasi = empty($graph['BIAYA_REALISASI'])? 0 : $graph['BIAYA_REALISASI'];
                    ?>
                    <tr>
                        <td>Target</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td><?php echo ($biaya_target == 0)? '-' : format_rupiah($biaya_target); ?></td>
                    </tr>
                    <tr>
                        <td>Existing</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td>
                            <?php 
                            echo ($biaya_realisasi == 0)? '-' : format_rupiah($biaya_realisasi);
                            if($biaya_realisasi > $biaya_target){
                                echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                            }elseif ($biaya_realisasi < $biaya_target) {
                                echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?php echo site_url('graph/bar/pendapatan/'.$id_kota); ?>">
            <div class="kotak" style="height: 280px;">
                <img src="<?php echo base_url();?>assets/img/image_icon/Pendapatan.png">
                <p>DATA PENDAPATAN</p>
                <table>
                    <?php
                    $pendapatan_target = empty($graph['PENDAPATAN_TARGET'])? 0 : $graph['PENDAPATAN_TARGET'];
                    $pendapatan_realisasi = empty($graph['PENDAPATAN_REALISASI'])? 0 : $graph['PENDAPATAN_REALISASI'];
                    ?>
                    <tr>
                        <td>Target</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td><?php echo ($pendapatan_target == 0)? '-' : format_rupiah($pendapatan_target); ?></td>
                    </tr>
                    <tr>
                        <td>Existing</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td>
                            <?php 
                            echo ($pendapatan_realisasi == 0)? '-' : format_rupiah($pendapatan_realisasi);
                            if($pendapatan_realisasi > $pendapatan_target){
                                echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                            }elseif ($pendapatan_realisasi < $pendapatan_target) {
                                echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?php echo site_url('graph/tabungan/'.$id_kota); ?>">
            <div class="kotak" style="height: 280px;">
                <img src="<?php echo base_url();?>assets/img/image_icon/ic_tabungan.png">
                <p>DATA TABUNGAN</p>
                <table>
                    <?php
                    $tabungan_target = empty($graph['TABUNGAN_TARGET'])? 0 : $graph['TABUNGAN_TARGET'];
                    $tabungan_realisasi = empty($graph['TABUNGAN_REALISASI'])? 0 : $graph['TABUNGAN_REALISASI'];
                    ?>
                    <tr>
                        <td>Target</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td><?php echo ($tabungan_target == 0)? '-' : format_rupiah($tabungan_target); ?></td>
                    </tr>
                    <tr>
                        <td>Existing</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td>
                            <?php 
                            echo ($tabungan_realisasi == 0)? '-' : format_rupiah($tabungan_realisasi);
                            if($tabungan_realisasi > $tabungan_target){
                                echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                            }elseif ($tabungan_realisasi < $tabungan_target) {
                                echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?php echo site_url('graph/deposito/'.$id_kota); ?>">
            <div class="kotak" style="height: 280px;">
                <img src="<?php echo base_url();?>assets/img/image_icon/ic_deposito.png">
                <p>DATA DEPOSITO</p>
                <table>
                    <?php
                    $deposito_target = empty($graph['DEPOSITO_TARGET'])? 0 : $graph['DEPOSITO_TARGET'];
                    $deposito_realisasi = empty($graph['DEPOSITO_REALISASI'])? 0 : $graph['DEPOSITO_REALISASI'];
                    ?>
                    <tr>
                        <td>Target</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td><?php echo ($deposito_target == 0)? '-' : format_rupiah($deposito_target); ?></td>
                    </tr>
                    <tr>
                        <td>Existing</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td>
                            <?php 
                            echo ($deposito_realisasi == 0)? '-' : format_rupiah($deposito_realisasi);
                            if($deposito_realisasi > $deposito_target){
                                echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                            }elseif ($deposito_realisasi < $deposito_target) {
                                echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?php echo site_url('graph/kredit/'.$id_kota); ?>">
            <div class="kotak" style="height: 280px;">
                <img src="<?php echo base_url();?>assets/img/image_icon/ic_kredit.png">
                <p>DATA KREDIT</p>
                <table>
                    <?php
                    $kredit_target = empty($graph['KREDIT_TARGET'])? 0 : $graph['KREDIT_TARGET'];
                    $kredit_realisasi = empty($graph['KREDIT_REALISASI'])? 0 : $graph['KREDIT_REALISASI'];
                    ?>
                    <tr>
                        <td>Target</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td><?php echo ($kredit_target == 0)? '-' : format_rupiah($kredit_target); ?></td>
                    </tr>
                    <tr>
                        <td>Existing</td>
                        <td style="padding: 0px 5px;">:</td>
                        <td>
                            <?php 
                            echo ($kredit_realisasi == 0)? '-' : format_rupiah($kredit_realisasi);
                            if($kredit_realisasi > $kredit_target){
                                echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                            }elseif ($kredit_realisasi < $kredit_target) {
                                echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </div>

    <?php
    if(!empty($id_kota) and $id_kota != 'false'){
        ?>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/car/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/ic_car.png">
                    <p>DATA CAR</p>
                    <table>
                        <?php
                        $car_target = empty($graph['CAR_TARGET'])? 0 : $graph['CAR_TARGET'];
                        $car_existing = empty($graph['CAR_REALISASI'])? 0 : $graph['CAR_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($car_target == 0)? '-' : ($car_target * 100).'%'; ?>"><?php echo ($car_target == 0)? '-' : round(($car_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($car_existing == 0)? '-' : ($car_existing * 100).'%'; ?>">
                                <?php 
                                echo ($car_existing == 0)? '-' : round(($car_existing * 100), 2)."%";
                                if($car_existing > $car_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($car_existing < $car_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/roa/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/ic_roa.png">
                    <p>DATA ROA</p>
                    <table>
                        <?php
                        $roa_target = empty($graph['ROA_TARGET'])? 0 : $graph['ROA_TARGET'];
                        $roa_existing = empty($graph['ROA_REALISASI'])? 0 : $graph['ROA_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($roa_target == 0)? '-' : ($roa_target * 100).'%'; ?>"><?php echo ($roa_target == 0)? '-' : round(($roa_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($roa_existing == 0)? '-' : ($roa_existing * 100).'%'; ?>">
                                <?php 
                                echo ($roa_existing == 0)? '-' : round(($roa_existing * 100), 2)."%";
                                if($roa_existing > $roa_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($roa_existing < $roa_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/roe/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/ROE.png">
                    <p>DATA ROE</p>
                    <table>
                        <?php
                        $roe_target = empty($graph['ROE_TARGET'])? 0 : $graph['ROE_TARGET'];
                        $roe_existing = empty($graph['ROE_REALISASI'])? 0 : $graph['ROE_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($roe_target == 0)? '-' : ($roe_target * 100).'%'; ?>"><?php echo ($roe_target == 0)? '-' : round(($roe_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($roe_existing == 0)? '-' : ($roe_existing * 100).'%'; ?>">
                                <?php 
                                echo ($roe_existing == 0)? '-' : round(($roe_existing * 100), 2)."%";
                                if($roe_existing > $roe_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($roe_existing < $roe_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/bopo/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/ic_bopo.png">
                    <p>DATA BOPO</p>
                    <table>
                        <?php
                        $bopo_target = empty($graph['BOPO_TARGET'])? 0 : $graph['BOPO_TARGET'];
                        $bopo_existing = empty($graph['BOPO_REALISASI'])? 0 : $graph['BOPO_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($bopo_target == 0)? '-' : ($bopo_target * 100).'%'; ?>"><?php echo ($bopo_target == 0)? '-' : round(($bopo_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($bopo_existing == 0)? '-' : ($bopo_existing * 100).'%'; ?>">
                                <?php 
                                echo ($bopo_existing == 0)? '-' : round(($bopo_existing * 100), 2)."%";
                                if($bopo_existing > $bopo_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($bopo_existing < $bopo_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/cr/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/ic_cr.png">
                    <p>DATA CR</p>
                    <table>
                        <?php
                        $cr_target = empty($graph['CR_TARGET'])? 0 : $graph['CR_TARGET'];
                        $cr_existing = empty($graph['CR_REALISASI'])? 0 : $graph['CR_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($cr_target == 0)? '-' : ($cr_target * 100).'%'; ?>"><?php echo ($cr_target == 0)? '-' : round(($cr_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($cr_existing == 0)? '-' : ($cr_existing * 100).'%'; ?>">
                                <?php 
                                echo ($cr_existing == 0)? '-' : round(($cr_existing * 100), 2)."%";
                                if($cr_existing > $cr_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($cr_existing < $cr_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/ldr/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/ic_ldr.png">
                    <p>DATA LDR</p>
                    <table>
                        <?php
                        $ldr_target = empty($graph['LDR_TARGET'])? 0 : $graph['LDR_TARGET'];
                        $ldr_existing = empty($graph['LDR_REALISASI'])? 0 : $graph['LDR_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($ldr_target == 0)? '-' : ($ldr_target * 100).'%'; ?>"><?php echo ($ldr_target == 0)? '-' : round(($ldr_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($ldr_existing == 0)? '-' : ($ldr_existing * 100).'%'; ?>">
                                <?php 
                                echo ($ldr_existing == 0)? '-' : round(($ldr_existing * 100), 2)."%";
                                if($ldr_existing > $ldr_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($ldr_existing < $ldr_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/kap/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/KAP.png">
                    <p>DATA KAP</p>
                    <table>
                        <?php
                        $kap_target = empty($graph['KAP_TARGET'])? 0 : $graph['KAP_TARGET'];
                        $kap_existing = empty($graph['KAP_REALISASI'])? 0 : $graph['KAP_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($kap_target == 0)? '-' : ($kap_target * 100).'%'; ?>"><?php echo ($kap_target == 0)? '-' : round(($kap_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($kap_existing == 0)? '-' : ($kap_existing * 100).'%'; ?>">
                                <?php 
                                echo ($kap_existing == 0)? '-' : round(($kap_existing * 100), 2)."%";
                                if($kap_existing > $kap_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($kap_existing < $kap_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/npl_gross/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/NPL Gross.png">
                    <p>DATA NPL GROSS</p>
                    <table>
                        <?php
                        $npl_gross_target = empty($graph['NPL_GROSS_TARGET'])? 0 : $graph['NPL_GROSS_TARGET'];
                        $npl_gross_existing = empty($graph['NPL_GROSS_REALISASI'])? 0 : $graph['NPL_GROSS_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($npl_gross_target == 0)? '-' : ($npl_gross_target * 100).'%'; ?>"><?php echo ($npl_gross_target == 0)? '-' : round(($npl_gross_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($npl_gross_existing == 0)? '-' : ($npl_gross_existing * 100).'%'; ?>">
                                <?php 
                                echo ($npl_gross_existing == 0)? '-' : round(($npl_gross_existing * 100), 2)."%";
                                if($npl_gross_existing > $npl_gross_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($npl_gross_existing < $npl_gross_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/npl_net/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/NPL Nett.png">
                    <p>DATA NPL NET</p>
                    <table>
                        <?php
                        $npl_net_target = empty($graph['NPL_NET_TARGET'])? 0 : $graph['NPL_NET_TARGET'];
                        $npl_net_existing = empty($graph['NPL_NET_REALISASI'])? 0 : $graph['NPL_NET_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($npl_net_target == 0)? '-' : ($npl_net_target * 100).'%'; ?>"><?php echo ($npl_net_target == 0)? '-' : round(($npl_net_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($npl_net_existing == 0)? '-' : ($npl_net_existing * 100).'%'; ?>">
                                <?php 
                                echo ($npl_net_existing == 0)? '-' : round(($npl_net_existing * 100), 2)."%";
                                if($npl_net_existing > $npl_net_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($npl_net_existing < $npl_net_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo site_url('graph/bar/nim/'.$id_kota); ?>">
                <div class="kotak" style="height: 280px;">
                    <img src="<?php echo base_url();?>assets/img/image_icon/NIM.png">
                    <p>DATA NIM</p>
                    <table>
                        <?php
                        $nim_target = empty($graph['NIM_TARGET'])? 0 : $graph['NIM_TARGET'];
                        $nim_existing = empty($graph['NIM_REALISASI'])? 0 : $graph['NIM_REALISASI'];
                        ?>
                        <tr>
                            <td>Target</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($nim_target == 0)? '-' : ($nim_target * 100).'%'; ?>"><?php echo ($nim_target == 0)? '-' : round(($nim_target * 100), 2)."%"; ?></td>
                        </tr>
                        <tr>
                            <td>Existing</td>
                            <td style="padding: 0px 5px;">:</td>
                            <td title="<?php echo ($nim_existing == 0)? '-' : ($nim_existing * 100).'%'; ?>">
                                <?php 
                                echo ($nim_existing == 0)? '-' : round(($nim_existing * 100), 2)."%";
                                if($nim_existing > $nim_target){
                                    echo '<i class="zmdi zmdi-long-arrow-up"></i>';
                                }elseif ($nim_existing < $nim_target) {
                                    echo '<i class="zmdi zmdi-long-arrow-down"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </div>
        <?php 
    }
    ?>
</div>

<style type="text/css">
    table tr td{padding-right: 10px;}

    .proses_selek{
        height: 38px;
        margin-top: 0px;
        border-radius: 2px;
        padding: 8px 16px;
        text-transform: capitalize;
        font-family: 'Poppins', sans-serif;
    }
</style>