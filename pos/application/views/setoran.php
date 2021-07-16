<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('setoran/tambahsetoran') ?>">
					<i class="fa fa-plus"></i> Tambah Setoran</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>Id anggota</th>
								<th>Nama anggota</th>
								<th>Tgl setoran</th>
								<th>Nominal</th>
								<th>Total</th>
								<th width="100px">Status</th>
								<th width="50px">Cetak</th>
							</tr>
						</thead>
						<?php 
						   foreach ($data_setoran->result() as $row): ?>
					       <tr>
							    <td><?= $row->id_anggota ?></td>
								<td><?= $row->nama_anggota ?></td>
								<td><?= $row->tgl_setoran ?></td>
								<td><?= to_rupiah($row->nominal)?></td>
								<td><?= to_rupiah($row->total)?></td>
								<td>
								  <?= $row->status ?>
								</td>
								<td align="center"><a href="#" data-no="<?php echo $row->no ?>" id="print">
									<span class="fa fa-print" style="font-size:20px"></span></a></td>
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
$(document)
           .on('click','#print',function(){
             window.open(base_url('setoran/cetak_struk/') + $(this).data('no'));
           });
</script>