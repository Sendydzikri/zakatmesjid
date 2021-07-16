<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('kelolauser/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit user</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">Id</label>
						<input type="text" class="form-control" value="<?= $val->id_user ?>" name="id_user" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_user ?>" name="id_user"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" value="<?= $val->nama ?>" name="nama" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label for="">username </label>
						<input type="text" class="form-control" value="<?= $val->username ?>" name="username" placeholder="Input username">
					</div>
					<div class="form-group">
								  	<label>Level</label>
								  	<select name="level" class="form-control" required>
									<option value="<?= $val->level ?>"><?= $val->level ?></option>
									  <option value="admin">Admin</option>
									  <option value="user">User</option>
									  <option value="anggota">Anggota</option>
									</select>
								</div>				
					<a class="btn btn-default" href="<?= site_url('user') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
