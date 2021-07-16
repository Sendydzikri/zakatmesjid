<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('simpan/tambahsimpan') ?>">
					<i class="fa fa-plus"></i> Tambah Simpan</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>id_anggota</th>
								<th>nama_anggota</th>
								<th>tgl_simpan</th>
								<th>jenis_simpan</th>
								<th>total_simpan</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_simpan->result() as $row):?>
					   <tr>
											<td><?= $row->id_anggota ?></td>
									<td><?= $row->nama_anggota ?></td>
									<td><?= $row->tgl_simpan ?></td>
									<td><?= $row->jenis_simpan?></td>
									<td><?php echo $rupiah ?> <?= $row->total_simpan?></td>
											  <td>
											 <a href="<?= site_url('simpan/updateSimpan/'.$row->id_anggota) ?>">Edit</a>
										| 	 <a href="<?= site_url('simpan/delete/'.$row->id_anggota) ?>">Delete</a>
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