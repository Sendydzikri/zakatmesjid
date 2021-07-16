<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('setoran/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Setoran</legend>
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
						<label for="">Tanggal Setor </label>
						<input type="date" class="form-control" value="<?= $val->tgl_setoran ?>" name="tgl_setoran" placeholder="Input Tanggal Setor">
					</div>
					<div class="form-group">
						<label for="">Solid Susu</label>
							<select name="solid_susu" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="high">High</option>
									  <option value="medium">Medium</option>
									  <option value="low">Low</option>
									</select>
					</div>
					<div class="form-group">
						<label for="">Nominal</label>
						<input type="text" class="form-control" name="nominal" placeholder="Nominal">
					</div>
					<div class="form-group">
						<label for="">jumlah</label>
						<input type="text" class="form-control" value="<?= $val->jumlah ?>" name="jumlah" placeholder="Input jumlah">
					</div>
					<a class="btn btn-default" href="<?= site_url('setoran') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
