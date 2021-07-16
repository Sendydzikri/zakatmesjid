<script>
function displayResult(solid_susu){ 
 document.getElementById("nominal").value=solid_susu; 
}
</script>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pengajuan/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Pengajuan</legend>

					<div class="form-group">
						<label for="">id anggota</label>
						<input type="text" class="form-control" name="id_anggota" placeholder="id_anggota">
					</div>
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" name="nama_anggota" placeholder="nama_anggota">
					</div>
					<div class="umur">
						<label for="">umur</label>
						<input type=umur class="form-control" name="umur" placeholder="umur">
					</div>
					<div class="required">
				<label for="solid_susu">jumlah_angsuran :</label>
				<input type="radio" name="5" class="required" title="5"/> 5
				<input type="radio" name="15" class="required" title="10"/> 15
				<input type="radio" name="20" class="required" title="20"/> 20
					</div>
					<div class="required">				
					<label for="">Nominal Pinjam :</label>
					<input type="text" class="form-control" name="nominal_pinjam" placeholder="nominal_pinjam">
					</div>
					<a class="btn btn-default" href="<?= site_url('pengajuan') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
