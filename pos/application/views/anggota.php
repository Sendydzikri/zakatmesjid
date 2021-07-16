<section>
	<div class="container">
		<div class="row">
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>id_anggota</th>
								<th>nama_anggota</th>
								<th>alamat</th>
								<th>no telepon</th>
								<th>persyaratan</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_anggota->result() as $row):?>
					   <tr>
											<td><?= $row->id_anggota ?></td>
									<td><?= $row->nama_anggota ?></td>
									<td><?= $row->alamat ?></td>
									<td><?= $row->no_tlp ?></td>
									<td><?= $row->persyaratan?></td>
											  <td>
											 <a href="<?= site_url('anggota/updateAnggota/'.$row->id_pendaftaran) ?>">Edit</a>
											 <a> | </a>
											 <a href="<?= site_url('anggota/laporAnggota/'.$row->id_pendaftaran) ?>">print</a>
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