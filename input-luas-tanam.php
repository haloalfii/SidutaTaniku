<?php
include('proses.php');
$proses = new Pertanian();
if (isset($_POST['submit'])) {
    $id_kecamatan = $_POST['id_kecamatan'];
    $id_komoditi = $_POST['id_komoditi'];
    $jan = $_POST['jan'];
    $feb = $_POST['feb'];
    $mar = $_POST['mar'];
    $apr = $_POST['apr'];
    $mei = $_POST['mei'];
    $jun = $_POST['jun'];
    $jul = $_POST['jul'];
    $agu = $_POST['agu'];
    $sep = $_POST['sep'];
    $okt = $_POST['okt'];
    $nov = $_POST['nov'];
    $des = $_POST['des'];

    $add_status = $proses->AddDataLuasTanam($id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des);
    if ($add_status) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        location='lihat-data.php';
    </script>";
    }
}

include_once 'dbconfig.php';
if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

if (!$_SESSION['admin_session']) {
    $user->redirect('lihat-data.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'header.php';
    ?>
    </br>
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
            <main>
                <form action="" method="POST">
                    <div class="container">
                        <div class="card border-0">
                            <h4>Input Data Luas Tanam</h4>
                            <table border="0">
                                <tr>
                                    <td>Kecamatan</td>
                                    <td> : </td>
                                    <td>
                                        <select id="id_kecamatan" name="id_kecamatan" class="form-control py-2">
                                            <option value=010>Temon</option>
                                            <option value=020>Wates</option>
                                            <option value=030>Panjatan</option>
                                            <option value=040>Galur</option>
                                            <option value=050>Lendah</option>
                                            <option value=060>Sentolo</option>
                                            <option value=070>Pengasih</option>
                                            <option value=080>Kokap</option>
                                            <option value=090>Girimulyo</option>
                                            <option value=100>Nanggulan</option>
                                            <option value=110>Kalibawang</option>
                                            <option value=120>Samigaluh</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Komoditi</td>
                                    <td> : </td>
                                    <td>
                                        <select id="id_komoditi" name="id_komoditi" class="form-control py-2">
                                            <option value=001>Jagung</option>
                                            <option value=002>Padi</option>
                                            <option value=001>Kedelai</option>
                                            <option value=002>Ubi Kayu</option>
                                            <option value=001>Ubi Jalar</option>
                                            <option value=002>Kacang Tanah</option>
                                            <option value=001>Kacang Hijau</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Januari</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="jan" type="number" name="jan" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Februaru</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="feb" type="number" name="feb" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Maret</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="mar" type="number" name="mar" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>April</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="apr" type="number" name="apr" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Mei</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="mei" type="number" name="mei" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Juni</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="jun" type="number" name="jun" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Juli</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="jul" type="number" name="jul" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Agustus</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="agu" type="number" name="agu" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>September</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="sep" type="number" name="sep" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Oktober</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="okt" type="number" name="okt" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>November</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="nov" type="number" name="nov" value="0" step="any"></td>
                                </tr>
                                <tr>
                                    <td>Desember</td>
                                    <td> : </td>
                                    <td><input class="form-control py-2" id="des" type="number" name="des" value="0" step="any"></td>
                                </tr>
                            </table>
                            <div class="form-group mt-2 mb-0"><input type="submit" value="Input Data" name="submit" class="btn btn-primary"></div>
                        </div>

                    </div>
                </form>
            </main>
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