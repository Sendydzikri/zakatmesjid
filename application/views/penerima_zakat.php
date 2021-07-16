<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('penerima_zakat/tambahpenerima') ?>">
					<i class="fa fa-plus"></i> Tambah Penerima</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>no</th>
								<th>nama Penerima</th>
								<th>usia</th>
								<th>alamat</th>
								<th>status</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_penerima_zakat->result() as $row):?>
					   <tr>
											<td><?= $row->no ?></td>
									<td><?= $row->nama_penerima ?></td>
									<td><?= $row->usia ?></td>
									<td><?= $row->alamat ?></td>
									<td><?= $row->status?></td>
							
											  <td>
											 <a href="<?= site_url('penerima_zakat/updatepenerima/'.$row->nama_penerima) ?>">Edit</a>
										| 	 <a href="<?= site_url('penerima_zakat/delete/'.$row->nama_penerima) ?>">Delete</a>
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