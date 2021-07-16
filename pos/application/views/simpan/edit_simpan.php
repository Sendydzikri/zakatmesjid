<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('simpan/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Simpan</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">id_anggota</label>
						<input type="text" class="form-control" value="<?= $val->id_anggota ?>" name="id_anggota" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_anggota ?>" name="id_anggota" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">nama_anggota</label>
						<input type="text" class="form-control" value="<?= $val->nama_anggota ?>" name="nama_anggota" placeholder="Input nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Tanggal Simpan </label>
						<input type="date" class="form-control" value="<?= $val->tgl_simpan ?>" name="tgl_simpan" placeholder="Input Tanggal Simpan">
					</div>
					<div class="form-group">
								  	<label>Jenis Simpan</label>
								  	<select name="jenis_simpan" class="form-control" required>
									<option value="<?= $val->jenis_simpan ?>"><?= $val->jenis_simpan ?></option>
									  <option value="wajib">wajib</option>
									  <option value="sukarela">sukarela</option>
									  <option value="pokok">pokok</option>
									</select>
								</div>		
					<div class="form-group">
						<label for="">total simpan</label>
						<input type="text" class="form-control" value="<?= $val->total_simpan ?>" name="total_simpan" placeholder="Input nama_anggota">
					</div>
					<a class="btn btn-default" href="<?= site_url('simpan') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
