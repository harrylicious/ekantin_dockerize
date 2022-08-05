
<!-- Sidebar chat start -->
<div id="sidebar" class="users p-chat-user showChat">
    <div class="had-container">
        <div class="card card_main p-fixed users-main">
            <div class="user-box">
                <div class="chat-inner-header">
                    <div class="back_chatBox">
                        <div class="right-icon-control">
                            <input type="text" class="form-control  search-text" placeholder="Search Friend"
                                id="search-friends">
                            <div class="form-icon">
                                <i class="icofont icofont-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
<?php

    $level = $this->session->userdata('level'); 

?>
<nav class="pcoded-navbar ">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class=" ">
                <a href="<?= base_url('home'); ?>">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-badge label label-success">NEW</span>
                </a>
            </li>

        </ul>
      
        <div class="pcoded-navigatio-lavel">Menu Pembeli</div>
        <ul class="pcoded-item pcoded-left-item">
            <?php if ($level == "ADMIN") { ?>
            <li class="">
                <a href="<?= base_url("siswa/add"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                    <span class="pcoded-mtext">Tambah Pembeli</span>
                </a>
            </li>
            <?php } ?>
            <li class="">
                <a href="<?= base_url("siswa"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                    <span class="pcoded-mtext">Daftar Pembeli</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("siswa/import"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <span class="pcoded-mtext">Import Pembeli</span>
                </a>
            </li>

        </ul>
        
        <div class="pcoded-navigatio-lavel">Menu Belanja</div>
        <ul class="pcoded-item pcoded-left-item">
            <?php if ($level == "ADMIN") { ?>
            <li class="">
                <a href="<?= base_url("belanja/add"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <span class="pcoded-mtext">Tambah Belanja</span>
                </a>
            </li>
            <?php } ?>
            <li class="">
                <a href="<?= base_url("belanja"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
                    <span class="pcoded-mtext">Riwayat Belanja</span>
                </a>
            </li>

        </ul>
        <div class="pcoded-navigatio-lavel">Menu Top Up</div>
        <ul class="pcoded-item pcoded-left-item">
            <?php if ($level == "ADMIN") { ?>
            <li class="">
                <a href="<?= base_url("topup/add"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <span class="pcoded-mtext">Tambah Top Up</span>
                </a>
            </li>
            <?php } ?>
            <li class="">
                <a href="<?= base_url("topup"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">Riwayat Top Up</span>
                </a>
            </li>

        </ul>
        <?php if ($level == "SUPERADMIN") { ?>
        <div class="pcoded-navigatio-lavel">Menu Pengguna</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="<?= base_url("pengguna/add"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                    <span class="pcoded-mtext">Tambah Pengguna</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("pengguna"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                    <span class="pcoded-mtext">Daftar Pengguna</span>
                </a>
            </li>

        </ul>
        <?php } ?>
        <div class="pcoded-navigatio-lavel">Laporan</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class=" ">
                <a href="<?= base_url("laporan/belanja"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                    <span class="pcoded-mtext">Laporan Belanja</span>
                </a>
            </li>
            <li class=" ">
                <a href="<?= base_url("laporan/topup"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-feather"></i></span>
                    <span class="pcoded-mtext">Laporan Top Up</span>
                </a>
            </li>
            <li class=" ">
                <a href="<?= base_url("laporan/pemasukkan"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
                    <span class="pcoded-mtext">Laporan Pemasukkan</span>
                </a>
            </li>

        </ul>

</nav>