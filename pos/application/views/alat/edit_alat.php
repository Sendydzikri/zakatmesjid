<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('alat/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Simpan</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">id_barang</label>
						<input type="text" class="form-control" value="<?= $val->id_barang ?>" name="id_barang" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_barang ?>" name="id_barang" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">nama_barang</label>
						<input type="text" class="form-control" value="<?= $val->nama_barang ?>" name="nama_barang" placeholder="Input nama_barang">
					</div>
					<div class="form-group">
								  	<label>Jenis barang</label>
								  	<select name="jenisbarang" class="form-control" required>
									<option value="<?= $val->jenisbarang ?>"><?= $val->jenisbarang ?></option>
									  <option value="pakan">pakan</option>
									  <option value="alat">alat</option>
									</select>
								</div>
					<div class="form-group">
						<label for="">Satuan Barang</label>
						<input type="text" class="form-control" value="<?= $val->satuanbarang ?>" name="satuanbarang" placeholder="Satuan">
					</div>
					<div class="form-group">
						<label for="">harga beli</label>
						<input type="text" class="form-control" value="<?= $val->harga_beli ?>" name="harga_beli" placeholder="Input harga beli">
					</div>	
					<div class="form-group">
						<label for="">harga jual</label>
						<input type="text" class="form-control" value="<?= $val->harga_jual ?>" name="harga_jual" placeholder="Input harga jual">
					</div>
					<div class="form-group">
						<label for="">stok</label>
						<input type="text" class="form-control" value="<?= $val->stok ?>" name="stok" placeholder="Input stok">
					</div>
					<a class="btn btn-default" href="<?= site_url('barang') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
