<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pejakat/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Pezakat</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<!-- <div class="form-group">
						<label for="">Id</label>
						<input type="text" class="form-control" value="<?= $val->id_user ?>" name="id_user" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_user ?>" name="id_user"  hidden="hidden">
					</div> -->
					<div class="form-group">
						<label for="">nama_pejakat</label>
						<input type="text" class="form-control" value="<?= $val->nama_pejakat ?>" name="nama_pejakat" placeholder="Input Nama Pejakat">
					</div>
					<div class="form-group">
						<label for="">tanggal </label>
						<input type="date" class="form-control" value="<?= $val->tanggal ?>" name="tanggal" placeholder="Input tanggal">
					</div>
					<div class="form-group">
						<label for="">alamat </label>
						<input type="text" class="form-control" value="<?= $val->alamat ?>" name="alamat" placeholder="Input alamat">
					</div>
					<div class="form-group">
								  	<label>jenis_zakat</label>
								  	<select name="jenis_zakat" class="form-control" required>
									<option value="<?= $val->jenis_zakat ?>"><?= $val->jenis_zakat ?></option>
									  <option value="beras">beras</option>
									  <option value="uang">uang</option>
									  <!-- <option value="anggota">Anggota</option> -->
									</select>
								</div>
					<div class="form-group">
						<label for="">jum_keluarga </label>
						<input type="text" class="form-control" value="<?= $val->jum_keluarga ?>" name="jum_keluarga" placeholder="jum_keluarga">
					<div class="form-group">
						<label for="">nominal </label>
						<input type="text" class="form-control" value="<?= $val->nominal ?>" name="nominal" placeholder="Input nominal">				
					<a class="btn btn-default" href="<?= site_url('pejakat') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
