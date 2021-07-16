<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('set_simpan/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Simpan</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">no</label>
						<input type="text" class="form-control" value="<?= $val->id_set_simpan?>" name="id_set_simpan" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_set_simpan ?>" name="id_set_simpan"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">Presentasi simpan</label>
						<input type="text" class="form-control" value="<?= $val->nilai ?>" name="nilai" placeholder="Input presentasi">
					</div>			
					<a class="btn btn-default" href="<?= site_url('set_simpan') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
