<?php
    // include_once 'proses.php';
    // $pertanian = new Pertanian;
    // if(isset($_POST['submit'])){
    //     $insert = $pertanian->AddData($_POST['id_produksi'], $_POST['jan'], $_POST['feb'], $_POST['mar'], $_POST['apr'], $_POST['mei'], $_POST['jun'],  $_POST['jul'],  $_POST['agu'],  $_POST['sep'],  $_POST['okt'],  $_POST['nov'],  $_POST['des']);
    //     if ($insert){
    //         echo "<script>alert('Data Berhasil Ditambahkan');window.location = 'lihat-data.php';</script>";
    //     }
    // }
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
                    <form action="input-data.php" method="POST">
                    <div class="container">
                    <h4>Input Data Siswa</h4>
                        <table border="0">
                            <tr>
                                <td>kabupaten</td>
                                <td> : </td>
                                <td>
                                <select id="id_produksi" name="id_produksi" class="form-control py-2">
                                    <option value=1>Sleman</option>
                                    <option value=2>Bantul</option>
                                    <option value=3>Gunung Kidul</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Januari</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jan" type="number" name="jan"></td>
                            </tr>
                            <tr>
                                <td>Februaru</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="feb" type="number" name="feb"></td>
                            </tr>
                            <tr>
                                <td>Maret</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="mar" type="number" name="mar"></td>
                            </tr>
                            <tr>
                                <td>April</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="apr" type="number" name="apr"></td>
                            </tr>
                            <tr>
                                <td>Mei</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="mei" type="number" name="mei"></td>
                            </tr>
                            <tr>
                                <td>Juni</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jun" type="number" name="jun"></td>
                            </tr>
                            <tr>
                                <td>Juli</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="jul" type="number" name="jul"></td>
                            </tr>
                            <tr>
                                <td>Agustus</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="agu" type="number" name="agu"></td>
                            </tr>
                            <tr>
                                <td>September</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="sep" type="number" name="sep"></td>
                            </tr>
                            <tr>
                                <td>Oktober</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="okt" type="number" name="okt"></td>
                            </tr>
                            <tr>
                                <td>November</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="nov" type="number" name="nov"></td>
                            </tr>
                            <tr>
                                <td>Desember</td>
                                <td> : </td>
                                <td><input class="form-control py-2" id="des" type="number" name="des"></td>
                            </tr>
                        </table>
                        <div class="form-group mt-2 mb-0"><input type="submit" value="Input Data" name="submit" class="btn btn-primary"></div>
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


