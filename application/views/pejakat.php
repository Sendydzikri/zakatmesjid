<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('pejakat/tambahpejakat') ?>">
					<i class="fa fa-plus"></i> Tambah Pezakat</a>
				<br>
				<br><table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>no</th>
								<th>nama_pejakat</th>
								<th>tanggal</th>
								<th>alamat</th>
								<th>jenis_zakat</th>
								<th>jum_keluarga</th>
								<th>nominal</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_pejakat->result() as $row):?>
					   <tr>
											<td><?= $row->no ?></td>
									<td><?= $row->nama_pejakat ?></td>
									<td><?= $row->tanggal?></td>
									<td><?= $row->alamat?></td>
									<td><?= $row->jenis_zakat?></td>
									<td><?= $row->jum_keluarga?></td>
									<td><?= $row->nominal?></td>
										<!-- <?php 
                                   		 $nominal = 0 ;
                                    	// foreach ($nominal as $row) {
                                        if ($row->nominal == $raw->nominal) {
                                            // echo "<td>".$raw->nilai_akhir."</td>";
                                            $nominal = ($jum_keluarga) * 30000;
                                      
                                    }
                                ?> -->
									<!-- <td><?= $row->inpaq?></td> -->
									<!-- <td><?= $row->satuanbarang?></td>
									<td><?= to_rupiah($row->harga_beli)?></td>
									<td><?= to_rupiah($row->harga_jual)?></td>
									<td><?= $row->stok?></td> --> -->
											  <td>
											 <a href="<?= site_url('pejakat/updatepejakat/'.$row->nama_pejakat) ?>">Edit</a>
										| 	 <a href="<?= site_url('pejakat/delete/'.$row->nama_pejakat) ?>">Delete</a>
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