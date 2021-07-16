<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pejakat/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Pejakat</legend>

					<div class="form-group">
						<label for="">nama_pejakat</label>
						<input type="text" class="form-control" name="nama_pejakat" placeholder="nama_pejakat" required="true"></div>
                            <?php echo form_error('nama_pejakat'); ?>
                    </div>
					</div>
					<div class="form-group">
						<label for="">tanggal</label>
						<input type="date" class="form-control" name="tanggal" placeholder="tanggal" required="true"></div>
                            <?php echo form_error('tanggal'); ?>
                    </div>
					</div>
					<div class="form-group">
						<labe for="">alamat</labe>
						<input type="text" class="form-control" name="alamat" placeholder="alamat" required="true"></div>
                            <?php echo form_error('alamat'); ?>
                    </div>
					</div>
					<div class="form-group">
						<label>jenis_zakat</label>
								  	<select name="jenis_zakat" class="form-control" required="true">
								  	  <option value="">Pilih...</option>
									  <option value="beras">beras</option>
									  <option value="uang">uang</option>
									</select>
						        <?php echo form_error('jenis_zakat'); ?>
					</div>
					<div class="form-group">
						<labe for="">jum_keluarga</labe>
						<input type="text" class="form-control" name="jum_keluarga" placeholder="jum_keluarga" required="true"></div>
                            <?php echo form_error('jum_keluarga'); ?>
                    </div>
					</div>
					<div class="form-group">
						<labe for="">nominal</labe>
						<input type="text" class="form-control" name="nominal" placeholder="nominal" required="true"></div>
                            <?php echo form_error('nominal'); ?>
                    </div>
					</div>
					
					<a class="btn btn-default" href="<?= site_url('pejakat') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
