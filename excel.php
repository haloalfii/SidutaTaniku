<?php
include_once "proses.php";
include_once "koneksi.php";
$pertanian = new Pertanian;
$row = $pertanian->GetAllLuasTanamExcel();
$row1 = $pertanian->GetAllLuasPanenExcel();
$row2 = $pertanian->GetAllProduksiExcel();

$total = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_tanam 
                                                        INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi");
$total1 = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM luas_panen 
                                                        INNER JOIN kecamatan ON luas_panen.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_panen.id_komoditi");
$total2 = mysqli_query($con, "SELECT sum(jan), sum(feb), sum(mar), sum(apr), sum(mei), sum(jun), sum(jul), sum(agu), sum(sep), sum(okt), sum(nov), sum(des) FROM produksi 
                                                        INNER JOIN kecamatan ON produksi.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = produksi.id_komoditi");
?>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pertanian.xls");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Export Data Ke Excel Dengan PHP</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>
    <center>
        <h3>Data Luas Tanam</h3>
    </center>

    <table border="1">
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
                <td><?php echo $row["jenis"] ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td>Total</td>
            <td><?php $rowTotal = mysqli_fetch_array($total);
                echo round($rowTotal[0]); ?></td>
            <td><?php echo round($rowTotal[1], 1) ?></td>
            <td><?php echo round($rowTotal[2], 1) ?></td>
            <td><?php echo round($rowTotal[3], 1) ?></td>
            <td><?php echo round($rowTotal[4], 1) ?></td>
            <td><?php echo round($rowTotal[5], 1) ?></td>
            <td><?php echo round($rowTotal[6], 1) ?></td>
            <td><?php echo round($rowTotal[7], 1) ?></td>
            <td><?php echo round($rowTotal[8], 1) ?></td>
            <td><?php echo round($rowTotal[9], 1) ?></td>
            <td><?php echo round($rowTotal[10], 1) ?></td>
            <td><?php echo round($rowTotal[11], 1) ?></td>
            <td><?php $totalJanApr = $rowTotal[0] + $rowTotal[1] + $rowTotal[2] + $rowTotal[3];
                echo round($totalJanApr, 1); ?></td>
            <td><?php $totalMeiAgu = $rowTotal[4] + $rowTotal[5] + $rowTotal[6] + $rowTotal[7];
                echo round($totalMeiAgu, 1); ?></td>
            <td><?php $totalSepDes = $rowTotal[8] + $rowTotal[9] + $rowTotal[10] + $rowTotal[11];
                echo round($totalSepDes, 1); ?></td>
            <td><?php $totalAll = $rowTotal[0] + $rowTotal[1] + $rowTotal[2] + $rowTotal[3] + $rowTotal[4] + $rowTotal[5] + $rowTotal[6] + $rowTotal[7] + $rowTotal[8] + $rowTotal[9] + $rowTotal[10] + $rowTotal[11];
                echo round($totalAll, 1); ?></td>
        </tr>
    </table>
    <center>
        <h3>Data Luas Panen</h3>
    </center>
    <table border="1">
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
                <td><?php echo $row1["jenis"] ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td>Total</td>
            <td><?php $rowTotal1 = mysqli_fetch_array($total1);
                echo round($rowTotal1[0]); ?></td>
            <td><?php echo round($rowTotal1[1], 1) ?></td>
            <td><?php echo round($rowTotal1[2], 1) ?></td>
            <td><?php echo round($rowTotal1[3], 1) ?></td>
            <td><?php echo round($rowTotal1[4], 1) ?></td>
            <td><?php echo round($rowTotal1[5], 1) ?></td>
            <td><?php echo round($rowTotal1[6], 1) ?></td>
            <td><?php echo round($rowTotal1[7], 1) ?></td>
            <td><?php echo round($rowTotal1[8], 1) ?></td>
            <td><?php echo round($rowTotal1[9], 1) ?></td>
            <td><?php echo round($rowTotal1[10], 1) ?></td>
            <td><?php echo round($rowTotal1[11], 1) ?></td>
            <td><?php $totalJanApr = $rowTotal1[0] + $rowTotal1[1] + $rowTotal1[2] + $rowTotal1[3];
                echo round($totalJanApr, 1); ?></td>
            <td><?php $totalMeiAgu = $rowTotal1[4] + $rowTotal1[5] + $rowTotal1[6] + $rowTotal1[7];
                echo round($totalMeiAgu, 1); ?></td>
            <td><?php $totalSepDes = $rowTotal1[8] + $rowTotal1[9] + $rowTotal1[10] + $rowTotal1[11];
                echo round($totalSepDes, 1); ?></td>
            <td><?php $totalAll = $rowTotal1[0] + $rowTotal1[1] + $rowTotal1[2] + $rowTotal1[3] + $rowTotal1[4] + $rowTotal1[5] + $rowTotal1[6] + $rowTotal1[7] + $rowTotal1[8] + $rowTotal1[9] + $rowTotal1[10] + $rowTotal1[11];
                echo round($totalAll, 1); ?></td>
        </tr>
    </table>
    <center>
        <h3>Data Produksi</h3>
    </center>
    <table border="1">
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
                <td><?php echo $row2["jenis"] ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td>Total</td>
            <td><?php $rowTotal2 = mysqli_fetch_array($total2);
                echo round($rowTotal2[0]); ?></td>
            <td><?php echo round($rowTotal2[1], 1) ?></td>
            <td><?php echo round($rowTotal2[2], 1) ?></td>
            <td><?php echo round($rowTotal2[3], 1) ?></td>
            <td><?php echo round($rowTotal2[4], 1) ?></td>
            <td><?php echo round($rowTotal2[5], 1) ?></td>
            <td><?php echo round($rowTotal2[6], 1) ?></td>
            <td><?php echo round($rowTotal2[7], 1) ?></td>
            <td><?php echo round($rowTotal2[8], 1) ?></td>
            <td><?php echo round($rowTotal2[9], 1) ?></td>
            <td><?php echo round($rowTotal2[10], 1) ?></td>
            <td><?php echo round($rowTotal2[11], 1) ?></td>
            <td><?php $totalJanApr = $rowTotal2[0] + $rowTotal2[1] + $rowTotal2[2] + $rowTotal2[3];
                echo round($totalJanApr, 1); ?></td>
            <td><?php $totalMeiAgu = $rowTotal2[4] + $rowTotal2[5] + $rowTotal2[6] + $rowTotal2[7];
                echo round($totalMeiAgu, 1); ?></td>
            <td><?php $totalSepDes = $rowTotal2[8] + $rowTotal2[9] + $rowTotal2[10] + $rowTotal2[11];
                echo round($totalSepDes, 1); ?></td>
            <td><?php $totalAll = $rowTotal2[0] + $rowTotal2[1] + $rowTotal2[2] + $rowTotal2[3] + $rowTotal2[4] + $rowTotal2[5] + $rowTotal2[6] + $rowTotal2[7] + $rowTotal2[8] + $rowTotal2[9] + $rowTotal2[10] + $rowTotal2[11];
                echo round($totalAll, 1); ?></td>
        </tr>
</body>

</html>