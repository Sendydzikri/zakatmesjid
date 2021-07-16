<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('anggota/updateSubmit') ?>" method="POST" role="form">
					<legend>edit Anggota</legend>
					<?php foreach ($update->result() as $val): ?>
					<div class="form-group">
						<label for="">id_pendaftaran</label>
						<input type="number" class="form-control" value="<?= $val->id_pendaftaran ?>" name="id_pendaftaran" placeholder="Input Id" disabled="disabled">
					</div>	
					<div class="form-group">
						<label for="">id_anggota</label>
						<input type="text" class="form-control" value="<?= $val->id_anggota ?>" name="id_anggota" placeholder="Input Id">
					</div>
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" value="<?= $val->nama_anggota ?>" name="nama_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" class="form-control" value="<?= $val->alamat ?>" name="alamat" placeholder="alamat">
					</div>
					<div class="form-group">
						<label for="">No Telepon</label>
						<input type="number" class="form-control" value="<?= $val->no_tlp ?>" 	name="no_tlp" placeholder="nomor telepon">
					</div>
					<div class="form-group">
						<label>Persyaratan</label>
								  	<select name="persyaratan" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="KTP">KTP</option>
									  <option value="Kartu Keluarga">Kartu Keluarga</option>
									  
									</select>
					</div>
					
					<a class="btn btn-default" href="<?= site_url('anggota') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<?php endforeach ?>
				</form>
			</div>
		</div>
	</div>
</section>
