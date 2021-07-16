<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pendaftaran/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Anggota</legend>

					
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" name="nama_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" class="form-control" name="alamat" placeholder="alamat">
					</div>
					<div class="form-group">
						<label for="">No Telepon</label>
						<input type="number" class="form-control" name="no_tlp" placeholder="nomor telepon">
					</div>
					<div class="form-group">
						<label>Persyaratan</label>
								  	<select name="persyaratan" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="KTP">KTP</option>
									  <option value="Kartu Keluarga">Kartu Keluarga</option>
									  
									</select>
					</div>
					
					<a class="btn btn-default" href="<?= site_url('pendaftaran') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
