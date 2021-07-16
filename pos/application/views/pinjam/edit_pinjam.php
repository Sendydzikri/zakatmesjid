<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pinjam/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Pinjam</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">id_anggota</label>
						<input type="text" class="form-control" value="<?= $val->id_anggota ?>" name="id_anggota" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_anggota ?>" name="id_anggota"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">nama_anggota</label>
						<input type="text" class="form-control" value="<?= $val->nama_anggota ?>" name="nama_anggota" placeholder="Input nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Tanggal Pinjam </label>
						<input type="date" class="form-control" value="<?= $val->tgl_pinjam ?>" name="tgl_pinjam" placeholder="Input Tanggal pinjam">
					</div>
					<div class="form-group">
						<label for="">Jumlah Pinjam </label>
						<input type="date" class="form-control" value="<?= $val->jml_pinjam ?>" name="jml_pinjam" placeholder="Input Jumlah Pinjam">
					</div>

					<a class="btn btn-default" href="<?= site_url('pinjam') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
