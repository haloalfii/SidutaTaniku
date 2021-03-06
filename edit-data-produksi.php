<?php 
include('proses.php');
include_once 'koneksi.php';

$proses = new Pertanian();

if(isset($_GET['id_produksi']))
{
    $id_produksi = $_GET['id_produksi'];
    $data = $proses->GetProduksi($id_produksi);
}

$DataKec = mysqli_query($con, "SELECT kecamatan.id_kecamatan FROM kecamatan INNER JOIN produksi ON kecamatan.id_kecamatan = produksi.id_kecamatan WHERE id_produksi = '".$id_produksi."'");
$rowx = mysqli_fetch_array($DataKec);

$NamaKec = mysqli_query($con, "SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan = '".$rowx[0]."'");
$rowy = mysqli_fetch_array($NamaKec);

if(isset($_POST['update']))
{
    $id_produksi = $_POST['id_produksi'];
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

    $status_update = $proses->UpdateProduksi($id_produksi, $id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des);
    if($status_update)
    {
        echo "<script>
        alert('Data berhasil diupdate');
        location='lihat-data.php';
        </script>";
    }
}

include_once 'dbconfig.php';
if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

if(!$_SESSION['admin_session'])
{
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
                    <h4>Edit Data Produksi <i class="text-danger"><?php echo $data['jenis'] ?></i> Di Kecamatan <i class="text-danger"><?= $rowy[0] ?></i></h4>
                        <table border="0">
                        <input type="hidden" name="id_produksi" value="<?= $data['id_produksi'] ?>">
                            <tr>
                                <td>
                                    <input class="form-control py-2" id="id_kecamatan" step="any" type="hidden" name="id_kecamatan" value="<?= $rowx[0] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control py-2" id="id_komoditi" step="any" type="hidden" name="id_komoditi" value="<?= $data['id_komoditi'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Januari</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jan" step="any" type="number" name="jan" value="<?= $data['jan'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Februaru</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="feb" step="any" type="number" name="feb" value="<?= $data['feb'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Maret</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="mar" step="any" type="number" name="mar" value="<?= $data['mar'] ?>"></td>
                            </tr>
                            <tr>
                                <td>April</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="apr" step="any" type="number" name="apr" value="<?= $data['apr'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Mei</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="mei" step="any" type="number" name="mei" value="<?= $data['mei'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Juni</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jun" step="any" type="number" name="jun" value="<?= $data['jun'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Juli</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jul" step="any" type="number" name="jul" value="<?= $data['jul'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Agustus</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="agu" step="any" type="number" name="agu" value="<?= $data['agu'] ?>"></td>
                            </tr>
                            <tr>
                                <td>September</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="sep" step="any" type="number" name="sep" value="<?= $data['sep'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Oktober</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="okt" step="any" type="number" name="okt" value="<?= $data['okt'] ?>"></td>
                            </tr>
                            <tr>
                                <td>November</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nov" step="any" type="number" name="nov" value="<?= $data['nov'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Desember</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="des" step="any" type="number" name="des" value="<?= $data['des'] ?>"></td>
                            </tr>
                        </table>
                        <div class="form-group mt-2 mb-0"><input type="submit" value="Update Data" name="update" class="btn btn-primary"></div>
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


