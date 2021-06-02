<?php
include_once 'dbconfig.php';
if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

if (!$_SESSION['admin_session']) {
    $user_id = $_SESSION['user_session'];
} else {
    $user_id = $_SESSION['admin_session'];
}

$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php
include_once 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'header.php';
    ?>
</head>

<body class="sb-nav-fixed">
    <?php
    include_once 'navbar.php';
    ?>
    <div id="layoutSidenav">
        <?php
        include_once 'sidebar.php';
        ?>
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <main>
                    <div class="row">
                        <div class="col-md-2">
                            <form method="POST" action="">
                                <label for="Komoditi">Pilih Komoditas</label>
                                <select id="jenis" name="jenis" class="form-control py-2" required>
                                    <option value="">Pilih</option>
                                    <option value="Jagung">Jagung</option>
                                    <option value="Padi">Padi</option>
                                    <option value="Kedelai">Kedelai</option>
                                    <option value="Ubi Kayu">Ubi Kayu</option>
                                    <option value="Ubi Jalar">Ubi Jalar</option>
                                    <option value="Kacang Tanah">Kacang Tanah</option>
                                    <option value="Kacang Hijau">Kacang Hijau</option>
                                </select>
                        </div>
                        <div class="col-md-2">
                            <label for="kecamatan">Pilih Kecamatan</label>
                            <select id="kecamatan" name="kecamatan" class="form-control py-2">
                                <option value="">Pilih</option>
                                <option value="Temon">Temon</option>
                                <option value="Wates">Wates</option>
                                <option value="Panjatan">Panjatan</option>
                                <option value="Galur">Galur</option>
                                <option value="Lendah">Lendah</option>
                                <option value="Sentolo">Sentolo</option>
                                <option value="Pengasih">Pengasih</option>
                                <option value="Kokap">Kokap</option>
                                <option value="Girimulyo">Girimulyo</option>
                                <option value="Nanggulan">Nanggulan</option>
                                <option value="Kalibawang">Kalibawang</option>
                                <option value="Samigaluh">Samigaluh</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="cari" class="btn btn-primary" style="margin-top: 32px;">Tampilkan</button>
                        </div>
                        </form>
                    </div>

                    <?php
                    include_once "proses.php";
                    $pertanian = new Pertanian;
                    if (isset($_POST["cari"])) {
                        if ($_POST['jenis'] && $_POST['kecamatan']) {
                            $jenis = $_POST['jenis'];
                            $kecamatan = $_POST['kecamatan'];
                            $total = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_tanam 
                                                        INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi 
                                                        WHERE komoditi.jenis = '$_POST[jenis]' AND kecamatan.nama_kecamatan = '$_POST[kecamatan]'");
                            $total1 = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_panen 
                                                        INNER JOIN kecamatan ON luas_panen.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_panen.id_komoditi 
                                                        WHERE komoditi.jenis = '$_POST[jenis]' AND kecamatan.nama_kecamatan = '$_POST[kecamatan]'");
                            $total2 = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM produksi 
                                                        INNER JOIN kecamatan ON produksi.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = produksi.id_komoditi 
                                                        WHERE komoditi.jenis = '$_POST[jenis]' AND kecamatan.nama_kecamatan = '$_POST[kecamatan]'");
                        } else if ($_POST['jenis']) {
                            $jenis = $_POST['jenis'];
                            $total = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_tanam 
                                                        INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi 
                                                        WHERE komoditi.jenis = '$_POST[jenis]'");
                            $total1 = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_panen 
                                                        INNER JOIN kecamatan ON luas_panen.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_panen.id_komoditi 
                                                        WHERE komoditi.jenis = '$_POST[jenis]'");
                            $total2 = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM produksi 
                                                        INNER JOIN kecamatan ON produksi.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = produksi.id_komoditi 
                                                        WHERE komoditi.jenis = '$_POST[jenis]'");
                        }
                    } else {
                        $jenis = '';
                        $kecamatan = '';
                        $row = $pertanian->GetAll();
                        $row1 = $pertanian->GetAll();
                        $row2 = $pertanian->GetAll();
                        $total = $pertanian->GetAll();
                        echo '<script>
                            document.getElementById("myChart").className = "d-none";
                            <script>';
                    }
                    ?>


                    <center>
                        <h3>Data <?php echo $_POST['jenis'] ?></h3>
                    </center>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Luas Tanam <?php echo $_POST['jenis'] ?>

                                    </div>
                                    <div class="card-body"><canvas id="myChart"></canvas></canvas></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Luas Panen <?php echo $_POST['jenis'] ?>

                                    </div>
                                    <div class="card-body"><canvas id="myChartSatu"></canvas></canvas></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Produksi <?php echo $_POST['jenis'] ?>

                                    </div>
                                    <div class="card-body"><canvas id="myChartDua"></canvas></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        var ctx = document.getElementById("myChart");
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],

                                datasets: [{
                                    label: 'Data Pertanian Luas Tanam',

                                    data: [
                                        <?php $rowTotal = mysqli_fetch_array($total);
                                        echo round($rowTotal[0], 1) ?>, <?php echo round($rowTotal[1], 1) ?>, <?php echo round($rowTotal[2], 1) ?>,
                                        <?php echo round($rowTotal[3], 1) ?>, <?php echo round($rowTotal[4], 1) ?>, <?php echo round($rowTotal[5], 1) ?>, <?php echo round($rowTotal[6], 1) ?>,
                                        <?php echo round($rowTotal[7], 1) ?>, <?php echo round($rowTotal[8], 1) ?>, <?php echo round($rowTotal[9], 1) ?>, <?php echo round($rowTotal[10], 1) ?>, <?php echo round($rowTotal[11], 1) ?>,
                                    ],

                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 165, 0, 1)',
                                        'rgba(106, 90, 205, 1)',
                                        'rgba(238, 130, 238, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 0, 1)',
                                        'rgba(60, 179, 113, 1)',
                                        'rgba(60, 60, 60, 1)',
                                        'rgba(180, 180, 180, 1)',
                                        'rgba(120, 120, 120, 1)',
                                    ],

                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 165, 0, 1)',
                                        'rgba(106, 90, 205, 1)',
                                        'rgba(238, 130, 238, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 0, 1)',
                                        'rgba(60, 179, 113, 1)',
                                        'rgba(60, 60, 60, 1)',
                                        'rgba(180, 180, 180, 1)',
                                        'rgba(120, 120, 120, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },

                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>

                    <script>
                        var ctx = document.getElementById("myChartSatu");
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],

                                datasets: [{
                                    label: 'Data Pertanian Produksi',

                                    data: [
                                        <?php $rowTotal1 = mysqli_fetch_array($total1);
                                        echo round($rowTotal1[0], 1) ?>, <?php echo round($rowTotal1[1], 1) ?>, <?php echo round($rowTotal1[2], 1) ?>,
                                        <?php echo round($rowTotal1[3], 1) ?>, <?php echo round($rowTotal1[4], 1) ?>, <?php echo round($rowTotal1[5], 1) ?>, <?php echo round($rowTotal1[6], 1) ?>,
                                        <?php echo round($rowTotal1[7], 1) ?>, <?php echo round($rowTotal1[8], 1) ?>, <?php echo round($rowTotal1[9], 1) ?>, <?php echo round($rowTotal1[10], 1) ?>, <?php echo round($rowTotal1[11], 1) ?>,
                                    ],

                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 165, 0, 1)',
                                        'rgba(106, 90, 205, 1)',
                                        'rgba(238, 130, 238, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 0, 1)',
                                        'rgba(60, 179, 113, 1)',
                                        'rgba(60, 60, 60, 1)',
                                        'rgba(180, 180, 180, 1)',
                                        'rgba(120, 120, 120, 1)',
                                    ],

                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 165, 0, 1)',
                                        'rgba(106, 90, 205, 1)',
                                        'rgba(238, 130, 238, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 0, 1)',
                                        'rgba(60, 179, 113, 1)',
                                        'rgba(60, 60, 60, 1)',
                                        'rgba(180, 180, 180, 1)',
                                        'rgba(120, 120, 120, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },

                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>

                    <script>
                        var ctx = document.getElementById("myChartDua");
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],

                                datasets: [{
                                    label: 'Data Pertanian Luas Tanam',

                                    data: [
                                        <?php $rowTotal2 = mysqli_fetch_array($total2);
                                        echo round($rowTotal2[0], 1) ?>, <?php echo round($rowTotal2[1], 1) ?>, <?php echo round($rowTotal2[2], 1) ?>,
                                        <?php echo round($rowTotal2[3], 1) ?>, <?php echo round($rowTotal2[4], 1) ?>, <?php echo round($rowTotal2[5], 1) ?>, <?php echo round($rowTotal2[6], 1) ?>,
                                        <?php echo round($rowTotal2[7], 1) ?>, <?php echo round($rowTotal2[8], 1) ?>, <?php echo round($rowTotal2[9], 1) ?>, <?php echo round($rowTotal2[10], 1) ?>, <?php echo round($rowTotal2[11], 1) ?>,
                                    ],

                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 165, 0, 1)',
                                        'rgba(106, 90, 205, 1)',
                                        'rgba(238, 130, 238, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 0, 1)',
                                        'rgba(60, 179, 113, 1)',
                                        'rgba(60, 60, 60, 1)',
                                        'rgba(180, 180, 180, 1)',
                                        'rgba(120, 120, 120, 1)',
                                    ],

                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 165, 0, 1)',
                                        'rgba(106, 90, 205, 1)',
                                        'rgba(238, 130, 238, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 0, 1)',
                                        'rgba(60, 179, 113, 1)',
                                        'rgba(60, 60, 60, 1)',
                                        'rgba(180, 180, 180, 1)',
                                        'rgba(120, 120, 120, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },

                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>

                </main>
            </div>
            <?php
            include_once 'footer.php';
            ?>
        </div>
    </div>
    <?php
    include_once 'script-js.php';
    ?>
</body>

</html>