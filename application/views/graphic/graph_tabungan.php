<?php
$arr_bulan = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
// $arr_bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
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
<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-6">
        <canvas id="chart-area" height="150" />
    </div>
    <div class="col-md-6">
        <h1>Informasi Data Chart</h1>
        <p>Berikut ini adalah data keterangan terkait diagram Pie Chart disamping.</p>
        <table>
            <tr>
                <td>Tabungan Surya</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['TAB_SURYA']); ?></td>
            </tr>
            <tr>
                <td>ATM Khusus</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['ATM_KHUSUS']); ?></td>
            </tr>
            <tr>
                <td>ATM Surya</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['ATM_SURYA']); ?></td>
            </tr>
            <tr>
                <td>Tabungan Pensiun</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['TAB_PENSIUN']); ?></td>
            </tr>
            <tr>
                <td>TAS</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['TAS']); ?></td>
            </tr>
            <tr>
                <td>Tabungan KU</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['TAB_KU']); ?></td>
            </tr>
            <tr>
                <td>Tabungan Umroh</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['TAB_UMROH']); ?></td>
            </tr>
            <tr>
                <td>THT Umum</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['THT_UMUM']); ?></td>
            </tr>
            <tr>
                <td>Tabungan Simpel</td>
                <td> : </td>
                <td><?php echo format_rupiah($pie['TAB_SIMPEL']); ?></td>
            </tr>
            <?php
            if($id_kota == 1){
            echo "<tr>";
            echo    "<td>Tabungan Piknik</td>";
            echo    "<td> : </td>";
            echo    "<td>";
            echo    format_rupiah($pie['TAB_PIKNIK']);
            echo    "</td>";
            echo "</tr>";
            }
            ?>
        </table>
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
                // data: [12, 19, 10, 7, 9, 11, 12, 9, 7],
                data: [
                <?php echo empty($pie['TAB_SURYA'])? '' : round(($pie['TAB_SURYA'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['ATM_KHUSUS'])? '' : round(($pie['ATM_KHUSUS'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['ATM_SURYA'])? '' : round(($pie['ATM_SURYA'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['TAB_PENSIUN'])? '' : round(($pie['TAB_PENSIUN'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['TAS'])? '' : round(($pie['TAS'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['TAB_KU'])? '' : round(($pie['TAB_KU'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['TAB_UMROH'])? '' : round(($pie['TAB_UMROH'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['THT_UMUM'])? '' : round(($pie['THT_UMUM'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['TAB_SIMPEL'])? '' : round(($pie['TAB_SIMPEL'] / $pie['TOTAL']) * 100, 2); ?>,
                <?php echo empty($pie['TAB_PIKNIK'])? '' : round(($pie['TAB_PIKNIK'] / $pie['TOTAL']) * 100, 2); ?>
                ],
                backgroundColor: ['#e74c3c', '#e67e22', '#f1c40f', '#9b59b6', '#3498db', '#2ecc71', '#1abc9c', '#34495e', '#7f8c8d',
                <?php echo ($id_kota == 1) ? '"#0000ff"' : '' ?>
                ],
                label: 'Dataset 1'
            }],
            labels: [
            "Tabungan Surya",
            "ATM Khusus",
            "ATM Surya",
            "Tabungan Pensiun",
            "TAS",
            "Tabungan KU",
            "Tabungan Umroh",
            "THT Umum",
            "Tabungan Simpel",
            <?php echo ($id_kota == 1) ? '"Tabungan Piknik"' : '' ?>
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