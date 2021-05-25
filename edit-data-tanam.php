<?php 
include('proses.php');

$proses = new Pertanian();

if(isset($_GET['id_tanam']))
{
    $id_tanam = $_GET['id_tanam'];
    $data = $proses->GetLuasTanamKecamatan($id_tanam);
}

if(isset($_POST['update']))
{
    $id_tanam = $_POST['id_tanam'];
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

    $status_update = $proses->UpdateLuasTanamKecamatan($id_tanam, $id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des);
    if($status_update)
    {
        echo "<script>
        alert('Data berhasil diupdate');
        location='lihat-data.php';
        </script>";
    }
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
                    <h4>Input Data Luas Tanam</h4>
                        <table border="0">
                        <input type="hidden" name="id_tanam" value="<?= $data['id_tanam'] ?>">
                            <tr>
                                <td>Kecamatan</td>
                                <td> : </td>
                                <td>
                                    <select id="id_kecamatan" name="id_kecamatan" class="form-control py-2">
                                        <option value="<?= $data['id_kecamatan'] ?>"><?= $data['nama_kecamatan'] ?></option>
                                        <option value=010>Temon</option>
                                        <option value=020>Wates</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Komoditi</td>
                                <td> : </td>
                                <td>
                                    <select id="id_komoditi" name="id_komoditi" class="form-control py-2">
                                        <option value="<?= $data['id_komoditi'] ?>"><?= $data['jenis'] ?></option>
                                        <option value=001>Jagung</option>
                                        <option value=002>Padi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Januari</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jan" type="number" name="jan" value="<?= $data['jan'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Februaru</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="feb" type="number" name="feb" value="<?= $data['feb'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Maret</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="mar" type="number" name="mar" value="<?= $data['mar'] ?>"></td>
                            </tr>
                            <tr>
                                <td>April</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="apr" type="number" name="apr" value="<?= $data['apr'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Mei</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="mei" type="number" name="mei" value="<?= $data['mei'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Juni</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jun" type="number" name="jun" value="<?= $data['jun'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Juli</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jul" type="number" name="jul" value="<?= $data['jul'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Agustus</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="agu" type="number" name="agu" value="<?= $data['agu'] ?>"></td>
                            </tr>
                            <tr>
                                <td>September</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="sep" type="number" name="sep" value="<?= $data['sep'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Oktober</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="okt" type="number" name="okt" value="<?= $data['okt'] ?>"></td>
                            </tr>
                            <tr>
                                <td>November</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nov" type="number" name="nov" value="<?= $data['nov'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Desember</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="des" type="number" name="des" value="<?= $data['des'] ?>"></td>
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


