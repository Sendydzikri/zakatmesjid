<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('pembayaran/tambahpembayaran') ?>">
					<i class="fa fa-plus"></i> Tambah Pembayaran</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>id_anggota</th>
								<th>nama_anggota</th>
								<th>tgl_bayar</th>
								<th>angsuran ke</th>
								<th>jumlah bayar</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_pembayaran->result() as $row): ?>
					   <tr>
											  <td><?= $row->id_anggota ?></td>
									<td><?= $row->nama_anggota ?></td>
									<td><?= $row->tgl_bayar ?></td>
									<td><?= $row->angsuran_ke ?></td>
									<td><?php echo $rupiah ?> <?= $row->jumlah_bayar?></td>
											  <td>
											 <a href="<?= site_url('pembayaran/updatePembayaran/'.$row->id_anggota) ?>">Edit</a>
										| 	 <a href="<?= site_url('pembayaran/delete/'.$row->id_anggota) ?>">Delete</a>
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