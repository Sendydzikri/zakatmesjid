<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('pinjam/tambahpinjam') ?>">
					<i class="fa fa-plus"></i> Tambah Pinjam</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							    <th>Id Anggota</th>
								<th>Nama Anggota</th>
								<th>Tgl Pinjam</th>
								<th>Jenis Alat</th>
								<th>Jml Pinjam</th>
								<th>Total Bayar</th>
								<th>Status</th>								
							</tr>
						</thead>
						<?php foreach ($data_pinjam->result() as $row):?>
					        <tr>
								<td><?= $row->id_anggota ?></td>
								<td><?= $row->nama_anggota ?></td>
								<td><?= $row->tgl_pinjam ?></td>
								<td><?= $row->jenis_alat ?></td>
								<td><?= $row->jml_pinjam ?></td>
								<td><?= to_rupiah($row->total_bayar) ?></td>
								<td><?= $row->status ?></td>								
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