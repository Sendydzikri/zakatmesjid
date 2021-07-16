<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('KelolaUser/tambahuser') ?>">
					<i class="fa fa-plus"></i> Tambah User</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>no</th>
							<th>Id User</th>
								<th>nama</th>
								<th>username</th>
								<th>level</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_user->result() as $row): ?>
					   <tr>
											  <td><?= $row->no ?></td>
											  <td><?= $row->id_user ?></td>
									<td><?= $row->nama ?></td>
									<td><?= $row->username ?></td>
									<td><?= $row->level ?></td>
											  <td>
											 <a href="<?= site_url('kelolauser/updateBarang/'.$row->id_user) ?>">Edit</a>
										| 
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