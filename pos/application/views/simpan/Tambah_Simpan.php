<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('simpan/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Simpan</legend>

					<div class="form-group">
						<label for="">id anggota</label>
						<input type="text" class="form-control" name="id_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" name="nama_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Tanggal Simpan</label>
						<input type="date" class="form-control" name="tgl_simpan" placeholder="tgl_simpan">
					</div>
					<div class="form-group">
						<label>Jenis Simpan</label>
								  	<select name="jenis_simpan" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="sukarela">sukarela</option>
									  <option value="wajib">wajib</option>
									  <option value="pokok">pokok</option>
									</select>
					</div>
					<div class="form-group">
						<label for="">Total Simpan</label>
						<input type="text" class="form-control" name="total_simpan" placeholder="total_simpan">
					</div>
					<a class="btn btn-default" href="<?= site_url('simpan') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
