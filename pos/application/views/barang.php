<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('alat/tambahalat') ?>">
					<i class="fa fa-plus"></i> Tambah Barang</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>id Barang</th>
								<th>nama barang</th>
								<th>jenis barang</th>
								<th>satuan barang</th>
								<th>harga beli</th>
								<th>harga jual</th>
								<th>stok</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_barang->result() as $row):?>
					   <tr>
									<td><?= $row->id_barang ?></td>
									<td><?= $row->nama_barang ?></td>
									<td><?= $row->jenisbarang ?></td>
									<td><?= $row->satuanbarang?></td>
									<td><?= to_rupiah($row->harga_beli)?></td>
									<td><?= to_rupiah($row->harga_jual)?></td>
									<td><?= $row->stok?></td>
											  <td>
											 <a href="<?= site_url('alat/updateAlat/'.$row->id_barang) ?>">Edit</a>
										| 	 <a href="<?= site_url('alat/delete/'.$row->id_barang) ?>">Delete</a>
											  </td>
											</tr>
										<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- plugins -->
<script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').dataTable();
});
</script>