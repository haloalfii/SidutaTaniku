<?php
include_once "koneksi.php";
include_once "proses.php";
$pertanian = new Pertanian;
if (isset($_GET['hapus_tanam'])) {
    $id_tanam = $_GET['hapus_tanam'];
    $status = $pertanian->DelLuasTanam($id_tanam);
    if ($status) {
        echo "<script>
                alert ('Data luas tanam ini Berhasil Dihapus');
                location='lihat-data.php';
            </script>";
    }
}

if (isset($_GET['hapus_panen'])) {
    $id_panen = $_GET['hapus_panen'];
    $status = $pertanian->DelLuasPanen($id_panen);
    if ($status) {
        echo "<script>
                alert ('Data luas panen ini Berhasil Dihapus');
                location='lihat-data.php';
            </script>";
    }
}

if (isset($_GET['hapus_produksi'])) {
    $id_produksi = $_GET['hapus_produksi'];
    $status = $pertanian->DelProduksi($id_produksi);
    if ($status) {
        echo "<script>
                alert ('Data produksi ini Berhasil Dihapus');
                location='lihat-data.php';
            </script>";
    }
}

include_once 'dbconfig.php';
if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'header.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="dist/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="dist/assets/demo/chart-area-demo.js"></script>
    <script src="dist/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="dist/assets/demo/datatables-demo.js"></script>

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
                                <label for="Komoditi">Pilih Komoditi</label>
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
                            <button type="submit" name="cari" class="btn btn-primary" style="margin-top: 32px;">Cari</button>
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
                            $row = $pertanian->GetAllLuasTanamKecamatan($jenis, $kecamatan);
                            $row1 = $pertanian->GetAllLuasPanenKecamatan($jenis, $kecamatan);
                            $row2 = $pertanian->GetAllProduksiKecamatan($jenis, $kecamatan);
                        } else if ($_POST['jenis']) {
                            $jenis = $_POST['jenis'];
                            $row = $pertanian->GetAllLuasTanam($jenis);
                            $row1 = $pertanian->GetAllLuasPanen($jenis);
                            $row2 = $pertanian->GetAllProduksi($jenis);
                        }
                    } else {
                        $jenis = '';
                        $kecamatan = '';
                        $row = $pertanian->GetAll();
                        $row1 = $pertanian->GetAll();
                        $row2 = $pertanian->GetAll();
                        echo '<script>
                            document.getElementById("none").className = "d-none";
                            <script>';
                    }
                    ?>

                    <div id="none" class="">
                        <br>
                        <a target="_blank" href="excel.php" class="btn btn-info">EXPORT KE EXCEL</a>
                        <br>
                        <h3>Luas Tanam Menurut Kecamatan (Hektar)</h3>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                    <th>April</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agustus</th>
                                    <th>September</th>
                                    <th>Oktober</th>
                                    <th>November</th>
                                    <th>Desember</th>
                                    <th>Jan-Apr</th>
                                    <th>Mei-Ags</th>
                                    <th>Sep-Des</th>
                                    <th>Jumlah</th>
                                    <th>Komoditas</th>
                                    <?php if (isset($_SESSION['user_session'])) : ?>
                                        <th class="d-none">Action</th>
                                    <?php else : ?>
                                        <th>Action</th>
                                    <?php endif ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($row as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["nama_kecamatan"] ?></td>
                                        <td><?php echo $row["jan"] ?></td>
                                        <td><?php echo $row["feb"] ?></td>
                                        <td><?php echo $row["mar"] ?></td>
                                        <td><?php echo $row["apr"] ?></td>
                                        <td><?php echo $row["mei"] ?></td>
                                        <td><?php echo $row["jun"] ?></td>
                                        <td><?php echo $row["jul"] ?></td>
                                        <td><?php echo $row["agu"] ?></td>
                                        <td><?php echo $row["sep"] ?></td>
                                        <td><?php echo $row["okt"] ?></td>
                                        <td><?php echo $row["nov"] ?></td>
                                        <td><?php echo $row["des"] ?></td>
                                        <td><?php
                                            $janapr = $row["jan"] + $row["feb"] + $row["mar"] + $row["apr"];
                                            echo $janapr;
                                            ?></td>
                                        <td><?php
                                            $meiags = $row["mei"] + $row["jun"] + $row["jul"] + $row["agu"];
                                            echo $meiags;
                                            ?></td>
                                        <td><?php
                                            $sepdes = $row["sep"] + $row["okt"] + $row["nov"] + $row["des"];
                                            echo $sepdes;
                                            ?></td>
                                        <td><?php
                                            $all = $row["jan"] + $row["feb"] + $row["mar"] + $row["apr"] + $row["mei"] + $row["jun"] + $row["jul"] + $row["agu"] + $row["sep"] + $row["okt"] + $row["nov"] + $row["des"];
                                            echo $all;
                                            ?></td>
                                        <td><?php echo $row["jenis"] ?></td>
                                        <td>
                                            <?php if (isset($_SESSION['user_session'])) : ?>
                                                <a href="edit-data-tanam.php?id_tanam=<?= $row['id_tanam'] ?>" class="btn btn-primary d-none">Edit</a>
                                            <?php else : ?>
                                                <a href="edit-data-tanam.php?id_tanam=<?= $row['id_tanam'] ?>" class="btn btn-primary">Edit</a>
                                            <?php endif ?>

                                            <?php if (isset($_SESSION['user_session'])) : ?>
                                                <a href="lihat-data.php?hapus_tanam=<?= $row['id_tanam'] ?>" class="btn btn-danger d-none" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
                                            <?php else : ?>
                                                <a href="lihat-data.php?hapus_tanam=<?= $row['id_tanam'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td>Total</td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(feb) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mar) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(apr) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mei) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jun) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jul) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(agu) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(sep) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(okt) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(nov) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(des) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mei), sum(jun), sum(jul), sum(agu) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(sep), sum(okt), sum(nov), sum(des) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_tanam");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3] + $rowjml[4] + $rowjml[5] + $rowjml[6] + $rowjml[7] + $rowjml[8] + $rowjml[9] + $rowjml[10] + $rowjml[11]);?></td>
                                </tr>
                            </tbody>
                        </table>

                        <h3>Luas Panen Menurut Kecamatan (Hektar)</h3>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                    <th>April</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agustus</th>
                                    <th>September</th>
                                    <th>Oktober</th>
                                    <th>November</th>
                                    <th>Desember</th>
                                    <th>Jan-Apr</th>
                                    <th>Mei-Ags</th>
                                    <th>Sep-Des</th>
                                    <th>Jumlah</th>
                                    <th>Komoditas</th>
                                    <?php if (isset($_SESSION['user_session'])) : ?>
                                        <th class="d-none">Action</th>
                                    <?php else : ?>
                                        <th>Action</th>
                                    <?php endif ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($row1 as $row1) {
                                ?>
                                    <tr>
                                        <td><?php echo $row1["nama_kecamatan"] ?></td>
                                        <td><?php echo $row1["jan"] ?></td>
                                        <td><?php echo $row1["feb"] ?></td>
                                        <td><?php echo $row1["mar"] ?></td>
                                        <td><?php echo $row1["apr"] ?></td>
                                        <td><?php echo $row1["mei"] ?></td>
                                        <td><?php echo $row1["jun"] ?></td>
                                        <td><?php echo $row1["jul"] ?></td>
                                        <td><?php echo $row1["agu"] ?></td>
                                        <td><?php echo $row1["sep"] ?></td>
                                        <td><?php echo $row1["okt"] ?></td>
                                        <td><?php echo $row1["nov"] ?></td>
                                        <td><?php echo $row1["des"] ?></td>
                                        <td><?php
                                            $janapr = $row1["jan"] + $row1["feb"] + $row1["mar"] + $row1["apr"];
                                            echo $janapr;
                                            ?></td>
                                        <td><?php
                                            $meiags = $row1["mei"] + $row1["jun"] + $row1["jul"] + $row1["agu"];
                                            echo $meiags;
                                            ?></td>
                                        <td><?php
                                            $sepdes = $row1["sep"] + $row1["okt"] + $row1["nov"] + $row1["des"];
                                            echo $sepdes;
                                            ?></td>
                                        <td><?php
                                            $all = $row1["jan"] + $row1["feb"] + $row1["mar"] + $row1["apr"] + $row1["mei"] + $row1["jun"] + $row1["jul"] + $row1["agu"] + $row1["sep"] + $row1["okt"] + $row1["nov"] + $row1["des"];
                                            echo $all;
                                            ?></td>
                                        <td><?php echo $row1["jenis"] ?></td>
                                        <td>
                                            <?php if (isset($_SESSION['user_session'])) : ?>
                                                <a href="edit-data-panen.php?id_panen=<?= $row1['id_panen'] ?>" class="btn btn-primary d-none">Edit</a>
                                            <?php else : ?>
                                                <a href="edit-data-panen.php?id_panen=<?= $row1['id_panen'] ?>" class="btn btn-primary">Edit</a>
                                            <?php endif ?>

                                            <?php if (isset($_SESSION['user_session'])) : ?>
                                                <a href="lihat-data.php?hapus_panen=<?= $row1['id_panen'] ?>" class="btn btn-danger d-none" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
                                            <?php else : ?>
                                                <a href="lihat-data.php?hapus_panen=<?= $row1['id_panen'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td>Total</td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(feb) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mar) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(apr) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mei) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jun) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jul) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(agu) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(sep) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(okt) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(nov) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(des) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mei), sum(jun), sum(jul), sum(agu) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(sep), sum(okt), sum(nov), sum(des) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_panen");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3] + $rowjml[4] + $rowjml[5] + $rowjml[6] + $rowjml[7] + $rowjml[8] + $rowjml[9] + $rowjml[10] + $rowjml[11]);?></td>
                                </tr>
                            </tbody>
                        </table>

                        <h3>Produksi (Ton)</h3>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                    <th>April</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agustus</th>
                                    <th>September</th>
                                    <th>Oktober</th>
                                    <th>November</th>
                                    <th>Desember</th>
                                    <th>Jan-Apr</th>
                                    <th>Mei-Ags</th>
                                    <th>Sep-Des</th>
                                    <th>Jumlah</th>
                                    <th>Komoditas</th>
                                    <?php if (isset($_SESSION['user_session'])) : ?>
                                        <th class="d-none">Action</th>
                                    <?php else : ?>
                                        <th>Action</th>
                                    <?php endif ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($row2 as $row2) {
                                ?>
                                    <tr>
                                        <td><?php echo $row2["nama_kecamatan"] ?></td>
                                        <td><?php echo $row2["jan"] ?></td>
                                        <td><?php echo $row2["feb"] ?></td>
                                        <td><?php echo $row2["mar"] ?></td>
                                        <td><?php echo $row2["apr"] ?></td>
                                        <td><?php echo $row2["mei"] ?></td>
                                        <td><?php echo $row2["jun"] ?></td>
                                        <td><?php echo $row2["jul"] ?></td>
                                        <td><?php echo $row2["agu"] ?></td>
                                        <td><?php echo $row2["sep"] ?></td>
                                        <td><?php echo $row2["okt"] ?></td>
                                        <td><?php echo $row2["nov"] ?></td>
                                        <td><?php echo $row2["des"] ?></td>
                                        <td><?php
                                            $janapr = $row2["jan"] + $row2["feb"] + $row2["mar"] + $row2["apr"];
                                            echo $janapr;
                                            ?></td>
                                        <td><?php
                                            $meiags = $row2["mei"] + $row2["jun"] + $row2["jul"] + $row2["agu"];
                                            echo $meiags;
                                            ?></td>
                                        <td><?php
                                            $sepdes = $row2["sep"] + $row2["okt"] + $row2["nov"] + $row2["des"];
                                            echo $sepdes;
                                            ?></td>
                                        <td><?php
                                            $all = $row2["jan"] + $row2["feb"] + $row2["mar"] + $row2["apr"] + $row2["mei"] + $row2["jun"] + $row2["jul"] + $row2["agu"] + $row2["sep"] + $row2["okt"] + $row2["nov"] + $row2["des"];
                                            echo $all;
                                            ?></td>
                                        <td><?php echo $row2["jenis"] ?></td>
                                        <td>
                                            <?php if (isset($_SESSION['user_session'])) : ?>
                                                <a href="edit-data-produksi.php?id_produksi=<?= $row2['id_produksi'] ?>" class="btn btn-primary d-none">Edit</a>
                                            <?php else : ?>
                                                <a href="edit-data-produksi.php?id_produksi=<?= $row2['id_produksi'] ?>" class="btn btn-primary">Edit</a>
                                            <?php endif ?>

                                            <?php if (isset($_SESSION['user_session'])) : ?>
                                                <a href="lihat-data.php?hapus_produksi=<?= $row2['id_produksi'] ?>" class="btn btn-danger d-none" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
                                            <?php else : ?>
                                                <a href="lihat-data.php?hapus_produksi=<?= $row2['id_produksi'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td>Total</td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(feb) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mar) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(apr) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mei) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jun) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jul) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(agu) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(sep) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(okt) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(nov) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(des) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(mei), sum(jun), sum(jul), sum(agu) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(sep), sum(okt), sum(nov), sum(des) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3]);?></td>
                                    <td><?php $jml = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM produksi");
                                    $rowjml = mysqli_fetch_row($jml);
                                    echo round($rowjml[0] + $rowjml[1] + $rowjml[2] + $rowjml[3] + $rowjml[4] + $rowjml[5] + $rowjml[6] + $rowjml[7] + $rowjml[8] + $rowjml[9] + $rowjml[10] + $rowjml[11]);?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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