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
                            <label for="Komoditi">Pilih Komoditi</label>
                            <select id="jenis" name="jenis" class="form-control py-2" required>
                                    <option value="">Pilih</option>
                                    <option value="Jagung">Jagung</option>
                                    <option value="Padi">Padi</option>
                            </select>   
                        </div>
                        <div class="col-md-2">
                            <label for="kecamatan">Pilih Kecamatan</label>
                            <select id="kecamatan" name="kecamatan" class="form-control py-2">
                                    <option value="">Pilih</option>
                                    <option value="Temon">Temon</option>
                                    <option value="Wates">Wates</option>
                            </select>   
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="cari" class="btn btn-primary" style="margin-top: 32px;">Cari</button>
                        </div>
                        </form>
                    </div>
                    <h3>Luas Tanam Menurut Kecamatan (Hektar)</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <th>Komoditi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                include_once "proses.php";
                                $pertanian = new Pertanian;
                                if(isset($_POST["cari"])){
                                    if($_POST['jenis'] && $_POST['kecamatan']){
                                        $jenis = $_POST['jenis'];
                                        $kecamatan = $_POST['kecamatan'];
                                        $row = $pertanian->GetAllLuasTanamKecamatan($jenis, $kecamatan);
                                        echo "Sudah pilih keduanya";
                                    }
                                    else if ($_POST['jenis']){
                                        $jenis = $_POST['jenis'];
                                        $row = $pertanian->GetAllLuasTanam($jenis);
                                        echo "Hanya Jenis";
                                    }
                                }
                                else {
                                    $jenis = '';
                                    $kecamatan = '';
                                    $row = $pertanian->GetAll();
                                    echo "Pilihan Kosong";
                                } 


                                    foreach($row as $row){
                                ?>
                                <tr>
                                        <td><?php echo $row["nama_kecamatan"]?></td>
                                        <td><?php echo $row["jan"]?></td>
                                        <td><?php echo $row["feb"]?></td>
                                        <td><?php echo $row["mar"]?></td>
                                        <td><?php echo $row["apr"]?></td>
                                        <td><?php echo $row["mei"]?></td>
                                        <td><?php echo $row["jun"]?></td>
                                        <td><?php echo $row["jul"]?></td>
                                        <td><?php echo $row["agu"]?></td>
                                        <td><?php echo $row["sep"]?></td>
                                        <td><?php echo $row["okt"]?></td>
                                        <td><?php echo $row["nov"]?></td>
                                        <td><?php echo $row["des"]?></td>
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
                                         <td><?php echo $row["jenis"]?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>    
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
