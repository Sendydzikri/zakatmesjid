<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('alat/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah barang</legend>

					<div class="form-group">
						<label for="">id barang</label>
						<input type="text" class="form-control" name="id_barang" placeholder="id_barang">
					</div>
					<div class="form-group">
						<label for="">nama barang</label>
						<input type="text" class="form-control" name="nama_barang" placeholder="nama_barang">
					</div>
					<div class="form-group">
						<label>Jenis Barang</label>
								  	<select name="jenisbarang" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="pakan">pakan</option>
									  <option value="alat">alat</option>
									</select>
					</div>
					<div class="form-group">
						<label for="">satuan barang</label>
						<input type="text" class="form-control" name="satuanbarang" placeholder="satuanbarang">
					</div>
					<div class="form-group">
						<label for="">harga beli</label>
						<input type="text" class="form-control" name="harga_beli" placeholder="harga_beli">
					</div>
					<div class="form-group">
						<label for="">harga jual</label>
						<input type="text" class="form-control" name="harga_jual" placeholder="harga_jual">
					</div>
					<div class="form-group">
						<label for="">stok</label>
						<input type="text" class="form-control" name="stok" placeholder="stok">
					</div>
					<a class="btn btn-default" href="<?= site_url('barang') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
