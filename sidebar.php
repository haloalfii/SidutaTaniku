<?php
include_once 'dbconfig.php';
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>

                <a class="nav-link" href="lihat-data.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tampilkan Data
                </a>
                <?php if (isset($_SESSION['user_session'])) : ?>
                    <a class="nav-link d-none" href="input-luas-tanam.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Input Data Luas Tanam
                    </a>
                <?php else : ?>
                    <a class="nav-link" href="input-luas-tanam.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Input Data Luas Tanam
                    </a>
                <?php endif ?>

                <?php if (isset($_SESSION['user_session'])) : ?>
                    <a class="nav-link d-none" href="input-luas-panen.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Input Data Luas Panen
                    </a>
                <?php else : ?>
                    <a class="nav-link" href="input-luas-panen.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Input Data Luas Panen
                    </a>
                <?php endif ?>

                <?php if (isset($_SESSION['user_session'])) : ?>
                    <a class="nav-link d-none" href="input-luas-produksi.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Input Data Produksi
                    </a>
                <?php else : ?>
                    <a class="nav-link" href="input-luas-produksi.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Input Data Produksi
                    </a>
                <?php endif ?>
    </nav>
</div>