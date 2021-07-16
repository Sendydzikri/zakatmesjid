<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('Pengajuan/tambahpengajuan') ?>">
					<i class="fa fa-plus"></i> Tambah Pengajuan</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>id_anggota</th>
								<th>nama_anggota</th>
								<th>umur</th>
								<th>jumlah angsuran</th>
								<th>nominal pinjam
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_pengajuan->result() as $row): ?>
					   <tr>
											  <td><?= $row->id_anggota ?></td>
									<td><?= $row->nama_anggota ?></td>
									<td><?= $row->umur ?></td>
									<td><?= $row->jumlah_angsuran ?></td>
									<td><?= $row->nominal_pinjam?></td>
											  <td>
											 <a href="<?= site_url('pengajuan/updatePengajuan/'.$row->id_anggota) ?>">Edit</a>
										| 	 <a href="<?= site_url('setoran/delete/'.$row->id_anggota) ?>">Delete</a>
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