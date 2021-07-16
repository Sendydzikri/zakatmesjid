<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
								<th>no.</th>
								<th>persentasi pinjam</th>
								<th>aksi</th>
							</tr>
						</thead>
						<?php foreach ($data_set_sim->result() as $row):?>
					   <tr>
									<td><?= $row->id_set_pinjam?></td>
									<td><?= $row->nilai ?></td>
											  <td>
											 <a href="<?= site_url('set_pinjam/updatesetting/'.$row->id_set_pinjam) ?>">Edit</a>
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