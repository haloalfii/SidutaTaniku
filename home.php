<?php
include_once 'dbconfig.php';
if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

if(!$_SESSION['admin_session']){
    $user_id = $_SESSION['user_session'];
}
else {
    $user_id = $_SESSION['admin_session'];
}

$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php
include_once 'koneksi.php';

// $result = mysqli_query($con, "SELECT * FROM data_produksi WHERE id_produksi = 1");
// $row = mysqli_fetch_row($result);

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
            <div class="container">
                <main>
                    <div class="container-graph">


                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Data Pertanian

                                </div>
                                <div class="card-body"><canvas id="myChart"></canvas></canvas></div>
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
                                    label: 'Data Pertanian Sleman',

                                    data: [
                                        4, 7, 9, 8
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