<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('set_pinjam/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit setting pinjam </legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">no</label>
						<input type="text" class="form-control" value="<?= $val->id_set_pinjam?>" name="id_set_pinjam" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_set_pinjam ?>" name="id_set_pinjam"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">Presentasi pinjam</label>
						<input type="text" class="form-control" value="<?= $val->nilai ?>" name="nilai" placeholder="Input presentasi">
					</div>			
					<a class="btn btn-default" href="<?= site_url('set_pinjam') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
