<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('kelolaamilin/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Amilin</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<!-- <div class="form-group">
						<label for="">Id</label>
						<input type="text" class="form-control" value="<?= $val->id_user ?>" name="id_user" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_user ?>" name="id_user"  hidden="hidden">
					</div> -->
					<div class="form-group">
						<label for="">Nama Amilin</label>
						<input type="text" class="form-control" value="<?= $val->nama_amilin ?>" name="nama_amilin" placeholder="Input Nama">
					</div>
					<!-- <div class="form-group">
						<label for="">username </label>
						<input type="text" class="form-control" value="<?= $val->username ?>" name="username" placeholder="Input username">
					</div> -->
					<div class="form-group">
								  	<label>Status</label>
								  	<select name="level" class="form-control" required>
									<option value="<?= $val->level ?>"><?= $val->level ?></option>
									  <option value="admin">Aktif</option>
									  <option value="user">Non Aktif</option>
									  <!-- <option value="anggota">Anggota</option> -->
									</select>
								</div>				
					<a class="btn btn-default" href="<?= site_url('amilin') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
