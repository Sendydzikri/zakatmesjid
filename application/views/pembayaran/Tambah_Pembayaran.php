<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pembayaran/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Pembayaran</legend>

					<div class="form-group">
						<label for="">id anggota</label>
						<input type="text" class="form-control" name="id_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" name="nama_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Tanggal Bayar</label>
						<input type="date" class="form-control" name="tgl_bayar" placeholder="tgl_bayar">
					</div>
					<div class="form-group">
						<label>Angsuran Ke</label>
								  	<select name="angsuran_ke" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									  <option value="5">5</option>
									  <option value="6">6</option>
									  <option value="7">7</option>
									  <option value="8">8</option>
									  <option value="9">9</option>
									  <option value="10">10</option>
									  <option value="11">11</option>
									  <option value="12">12</option>
									  <option value="13">13</option>
									  <option value="14">14</option>
									  <option value="15">15</option>
									  <option value="16">16</option>
									  <option value="17">17</option>
									  <option value="18">18</option>
									  <option value="19">19</option>
									  <option value="20">20</option>
									</select>
					</div>
					<div class="form-group">
						<label for="">Jumlah Bayar</label>
						<input type="text" class="form-control" name="jumlah_bayar" placeholder="jumlah_bayar">
					</div>
					<a class="btn btn-default" href="<?= site_url('pembayaran') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
