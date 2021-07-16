<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('amilin/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Amilin</legend>
					<?php foreach ($update->result() as $val): ?>
					<div class="form-group">
						<label for="">nama_amilin</label>
						<input type="text" class="form-control" value="<?= $val->nama_amilin ?>" name="nama_amilin" placeholder="Input Nama amilin">
				
					<div class="form-group">
								  	<label>status</label>
								  	<select name="status" class="form-control" required>
									<option value="<?= $val->status ?>"><?= $val->status ?></option>
									  <option value="aktif">aktif</option>
									  <option value="non aktif">non aktif</option>
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
