<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">	
			<?php echo validation_errors(); ?>
					<!-- <?php echo form_open('Form_input'); ?>	 -->	
				<form action="<?= site_url('amilin/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Amilin</legend>
					
					<!-- <div class="form-group">
						<label for="">no</label>
						<input type="text" class="form-control" name="no" placeholder="no">
					</div> -->

					<div class="form-group">
						<label form="nama_amilin" ></label>
						<input type="text" class="form-control" name="nama_amilin" placeholder="nama_amilin" required="true"></div>
                            <?php echo form_error('nama_siswa'); ?>
                    </div>
				</div>
					<div class="form-group">
						<label>status</label>
								  	<select name="status" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="aktif">aktif</option>
									  <option value="non aktif">non aktif</option>
									</select>
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
					<a class="btn btn-default" href="<?= site_url('amilin') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
