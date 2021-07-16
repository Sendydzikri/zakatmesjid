<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('penerima_zakat/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Penerima</legend>
					<?php foreach ($update->result() as $val): ?>
					<div class="form-group">
						<label for="">nama_penerima</label>
						<input type="text" class="form-control" value="<?= $val->nama_penerima ?>" name="nama_penerima" placeholder="Input Nama Penerima">
					<div class="form-group">
						<label for="">usia</label>
						<input type="text" class="form-control" value="<?= $val->usia ?>" name="usia" placeholder="Input usia">
					div class="form-group">
						<label for="">alamat</label>
						<input type="text" class="form-control" value="<?= $val->alamat ?>" name="alamat" placeholder="Input alamat">
					<div class="form-group">
								  	<label>status</label>
								  	<select name="status" class="form-control" required>
									<option value="<?= $val->status ?>"><?= $val->status ?></option>
									  <option value="fakir">fakir"</option>
									  <option value="jompo">jompo"</option>
									  <option value="janda">janda"</option>
									  <option values="fisabillah">"fisabillah"</option>
									  <option value="miskin">miskin</option>
									  <!-- <option value="anggota">Anggota</option> -->
									</select>
								</div>
					<a class="btn btn-default" href="<?= site_url('penerima_zakat') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
