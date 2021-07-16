<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('anggota/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Anggota</legend>

					
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" name="nama_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Tanggal Simpan</label>
						<input type="date" class="form-control" name="tgl_simpan" placeholder="tgl_simpan">
					</div>
					<div class="form-group">
						<label>Persyaratan</label>
								  	<select name="jenis_simpan" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="sukarela">KTP</option>
									  <option value="wajib">Kartu Keluarga</option>
									  
									</select>
					</div>
					
					<a class="btn btn-default" href="<?= site_url('anggota') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
