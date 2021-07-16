<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('amilin/tambahamilin') ?>">
					<i class="fa fa-plus"></i> Tambah Amilin</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>no</th>
								<th>nama amilin</th>
								<th>status</th>
								
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_amilin->result() as $row):?>
					   <tr>
											<td><?= $row->no ?></td>
									<td><?= $row->nama_amilin ?></td>
									<td><?= $row->status?></td>
							
											  <td>
											 <a href="<?= site_url('amilin/updateamilin/'.$row->nama_amilin) ?>">Edit</a>
										| 	 <a href="<?= site_url('amilin/delete/'.$row->nama_amilin) ?>">Delete</a>
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