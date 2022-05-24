<?php
$arr_bulan = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
function format_rupiah($rp, $start='Rp. ', $pemisah='.', $end=',-') {
    $rp = empty($rp)? 0: $rp;
    $hasil = $start.number_format($rp, 0, "", $pemisah) . $end;
    return $hasil;
}

?>

<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-12">
        <canvas id="canvas" height="100"></canvas>
    </div>
</div>

<script>
    var color = Chart.helpers.color;
    var barChartData = {
        labels: [
        <?php foreach ($bar as $label) {
            echo "'".$arr_bulan[$label['BULAN'] - 1]." ".$label['TAHUN']."', ";
        } ?>
        ],
        datasets: [{
            <?php
            if($satuan == 'currency'){
                ?>
                label: 'Target - dalam satuan (Billiun)',
                <?php
            }elseif($satuan == 'percent'){
                ?>
                label: 'Target - dalam satuan persen (%)',
                <?php
            }
            ?>
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,            
            data:[
            <?php foreach ($bar as $target) {
                echo $target['TARGET'].',';
            } ?>
            ]
        }, {
            <?php
            if($satuan == 'currency'){
                ?>
                label: 'Realisasi - dalam satuan (Billiun)',
                <?php
            }elseif($satuan == 'percent'){
                ?>
                label: 'Realisasi - dalam satuan persen (%)',
                <?php
            }
            ?>
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data:[
            <?php foreach ($bar as $realisasi) {
                echo $realisasi['REALISASI'].',';
            } ?>
            ]
        }]

    };

    
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            }
        }
    });

</script>