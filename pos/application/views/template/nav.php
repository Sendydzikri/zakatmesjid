<?php
$notif = count($this->myigniter_model->getNotification('barang'));
?>
<nav class="menuku">
    <ul>
        <?php 
        if ($user['level'] == 'admin') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
            <li><a href="<?= base_url('kelolauser') ?>">USER</a></li>
            <li><a href="<?= base_url('login/logout') ?>">LOGOUT</a></li>
        <?php } elseif ($user['level'] == 'user') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
			<li><a href="<?= base_url('anggota') ?>">KELOLA ANGGOTA</a></li>
			<li><a href="<?= base_url('simpan') ?>">KELOLA SIMPANAN</a></li>
            <li><a href="<?= base_url('pengajuan/notif_pengajuan') ?>">PEMBERITAHUAN PENGAJUAN</a></li>
            <li><a href="<?= base_url('pembayaran/notif_pembayaran') ?>">PEMBERITAHUAN PEMBAYARAN</a></li>
            <li><a href="<?= base_url('pembayaran/notif_setoran') ?>">PEMBERITAHUAN SETORAN</a></li>
            <li><a href="<?= base_url('login/logout') ?>">LOGOUT</a></li>
        <?php } elseif ($user['level'] == 'manajer') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
            <li><a href="<?= base_url('laporan') ?>">KELOLA LAPORAN</a></li>
            <li><a href="<?= base_url('login/logout') ?>">LOGOUT</a></li>
		<?php } elseif ($user['level'] == 'pasterisasi') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
            <li><a href="<?= base_url('setoran') ?>">Setor Susu</a></li>
            <li><a href="<?= base_url('login/logout') ?>">LOGOUT</a></li>
		<?php } elseif ($user['level'] == 'mako') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
            <li><a href="<?= base_url('pinjam') ?>">Pinjaman Alat</a></li>
			<li><a href="<?= base_url('alat') ?>">Daftar Alat</a></li>
            <li><a href="<?= base_url('login/logout') ?>">LOGOUT</a></li>
		<?php } elseif ($user['level'] == 'anggota') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
            <li><a href="<?= base_url('pendaftaran_anggota') ?>">PROFILE</a></li>
            <li><a href="<?= base_url('pendaftaran_anggota/pinjam') ?>">PENGAJUAN</a></li>
            <li><a href="<?= base_url('pendaftaran_anggota/bayar') ?>">PEMBAYARAN</a></li>
            <li><a href="<?= base_url('pendaftaran/tambahpendaftaran') ?>">PENDAFTARAN</a></li>
            <li><a href="<?= base_url('login/logout') ?>">LOGOUT</a></li>
        <?php } ?> 
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