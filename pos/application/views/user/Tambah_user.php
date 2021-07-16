<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('kelolauser/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah User</legend>

					<div class="form-group">
						<label for="">nama</label>
						<input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
						<input type="text" class="form-control" name="nama" placeholder="nama">
					</div>
					<div class="form-group">
						<label for="">username</label>
						<input type="text" class="form-control" name="username" placeholder="username">
					</div>
					<div class="form-group">
						<label for="">password</label>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					<div class="form-group">
								  	<label>Level</label>
								  	<select name="level" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="admin">Admin</option>
									  <option value="user">User</option>
									  <option value="anggota">Anggota</option>
									  <option value="manajer">Manajer</option>
									  <option value="mako">Mako</option>
									  <option value="pasterisasi">Pasterisasi</option>
									</select>
								</div>
					<a class="btn btn-default" href="<?= site_url('KelolaUser') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
