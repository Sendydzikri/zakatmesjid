<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('penerima_zakat/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Amilin</legend>

					<!-- <div class="form-group">
						<label for="">no</label>
						<input type="text" class="form-control" name="no" placeholder="no">
					</div> -->
					<div class="form-group">
						<label for="">nama_penerima</label>
						<input type="text" class="form-control" name="nama_penerima" placeholder="nama_penerima" required="true"></div>
                            <?php echo form_error('nama_penerima'); ?>
                    </div>
					</div>
					<div class="form-group">
						<label for="">usia</label>
						<input type="text" class="form-control" name="usia" placeholder="usia" required="true"></div>
                            <?php echo form_error('usia'); ?>
                    </div>
					</div>
					<div class="form-group">
						<label for="">alamat</label>
						<input type="text" class="form-control" name="alamat" placeholder="alamat" required="true"></div>
                            <?php echo form_error('alamat'); ?>
                    </div>
					</div>
					<div class="form-group">
						<label>status</label>
								  	<select name="status" class="form-control" required="true">
								  	  <option value="">Pilih...</option>
									  <option value="fakir">fakir</option>
									  <option value="miskin">miskin</option>
									  <option value="jompo">jompo</option>
									  <option value="janda">janda</option>
									  <option value="fisabilillah">fisabillah</option>
									</select>
									<?php echo form_error('status'); ?>
					</div>
					<!-- <div class="form-group">
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
					</div> -->
					<a class="btn btn-default" href="<?= site_url('penerima_zakat') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
