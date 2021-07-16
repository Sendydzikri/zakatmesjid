<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('pendaftaran/tambahpendaftaran') ?>">
					<i class="fa fa-plus"></i> Pendaftaran</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>nama</th>
								<th>alamat</th>
								<th>no tlp</th>
								<th>tanggal masuk</th>
								<th>persyaratan</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_pendaftaran->result() as $row):?>
					   <tr>
											<td><?= $row->nama ?></td>
									<td><?= $row->alamat ?></td>
									<td><?= $row->no_tlp ?></td>
									<td><?= $row->persyaratan?></td>
											  <td>
											 <a href="<?= site_url('kelolauser/updateBarang/'.$row->id_anggota) ?>">Status</a>
										| 	 
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