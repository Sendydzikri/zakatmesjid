<?php
$notif = count($this->myigniter_model->getNotification('barang'));
?>
<nav class="menuku">
    <ul>
        <?php 
        if ($user['level'] =='admin') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
            <li><a href="<?= base_url('kelolauser') ?>">USER</a></li>
            <li><a href="<?= base_url('login/logout') ?>">LOGOUT</a></li>
            <li><a href="<?= base_url('amilin') ?>">Kelola Amilin</a></li>
            <li><a href="<?= base_url('pejakat') ?>">Kelola Pezakat</a></li>
            <li><a href="<?= base_url('penerima_zakat') ?>">Penerima Zakat</a></li>
            <li><a href="<?= base_url('laporan') ?>">laporan</a></li>
        <!-- <?php } elseif ($user['level'] =='user') { ?>
            
        <?php } elseif ($user['level'] == 'manajer') { ?>
        
        <?php } ?>  -->
    </ul>
</nav>

<!-- Header -->
<header>
    <i class="fa fa-bars fa-2x pull-left menu"></i>
    <div class="container">
        <div class="col-lg-12 text-center">
            <h1><?= $judule ?></h1>
        </div>
    </div>
</header>