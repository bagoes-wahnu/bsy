<?php
$arr_bulan = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
// $arr_bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
function format_rupiah($rp, $start='Rp. ', $pemisah='.', $end=',-') {
    $rp = empty($rp)? 0: $rp;
    $hasil = $start.number_format($rp, 0, "", $pemisah) . $end;
    return $hasil;
}

$total = $pie['KRED_UMUM'] + $pie['KRED_PEG'] + $pie['KRED_MOTOR'] + $pie['KRED_MOTOR_BT'] + $pie['KRED_URK'] + $pie['KRED_MOBIL'];

// $arr_jenis_kredit = array('KREDIT MOTOR','KREDIT PEGAWAI','KREDIT UMUM','KREDIT MOBIL');
?>

<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-12">
        <canvas id="canvas" height="100"></canvas>
    </div>
</div>
<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-6">
        <canvas id="chart-area" height="150" />
    </div>
    <div class="col-md-6">
        <h1>Informasi Data Chart</h1>
        <p>Berikut ini adalah data keterangan terkait diagram Pie Chart disamping.</p>
        <table>
            <tr>
                <td>Kredit Umum</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['KRED_UMUM']); ?></td>
            </tr>
            <tr>
                <td>Kredit Pegawai</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['KRED_PEG']); ?></td>
            </tr>
            <tr>
                <td>Kredit Motor</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['KRED_MOTOR']); ?></td>
            </tr>
            <tr>
                <td>Kredit Motor BT</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['KRED_MOTOR_BT']); ?></td>
            </tr>
            <tr>
                <td>Kredit URK</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['KRED_URK']); ?></td>
            </tr>
            <tr>
                <td>Kredit Mobil</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['KRED_MOBIL']); ?></td>
            </tr>
        </table>
    </div>
</div>
<?php
// dump($pie);
?>
<script>
    var color = Chart.helpers.color;
    var barChartData = {
        labels: [
        <?php foreach ($bar as $label) {
            echo "'".$arr_bulan[$label['BULAN'] - 1]." ".$label['TAHUN']."', ";
        } ?>
        ],
        datasets: [{
            label: 'Target - dalam satuan (Billiun)',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,            
            data:[
            <?php foreach ($bar as $target) {
                echo $target['TARGET'].',';
            } ?>
            ]
        }, {
            label: 'Realisasi - dalam satuan (Billiun)',
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

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                <?php echo empty($pie['KRED_UMUM'])? '' : round(($pie['KRED_UMUM'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['KRED_PEG'])? '' : round(($pie['KRED_PEG'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['KRED_MOTOR'])? '' : round(($pie['KRED_MOTOR'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['KRED_MOTOR_BT'])? '' : round(($pie['KRED_MOTOR_BT'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['KRED_URK'])? '' : round(($pie['KRED_URK'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['KRED_MOBIL'])? '' : round(($pie['KRED_MOBIL'] / $pie['TOTAL']) * 100, 2); ?>
                ],
                backgroundColor: ['#e74c3c', '#e67e22', '#f1c40f', '#9b59b6', '#3498db', '#2ecc71', '#1abc9c', '#34495e', '#7f8c8d'],
                label: 'Dataset 1'
            }],
            labels: [
            "Kredit Umum",
            "Kredit Pegawai",
            "Kredit Motor",
            "Kredit Motor BT",
            "Kredit URK",
            "Kredit Mobil"
            ]
        },
        options: {
            responsive: true
        }
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

    var ctx2 = document.getElementById("chart-area").getContext("2d");
    window.myPie = new Chart(ctx2, config);

</script>