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
							<th>id_anggota</th>
								<th>nama_anggota</th>
								<th>umur</th>
								<th>jumlah angsuran</th>
								<th>nominal pinjam
								<th style="width: 100px">status</th>
							</tr>
						</thead>
						<?php foreach ($data_pengajuan->result() as $row): ?>
					   <tr>
											  <td><?= $row->id_anggota ?></td>
									<td><?= $row->nama_anggota ?></td>
									<td><?= $row->umur ?></td>
									<td><?= $row->jumlah_angsuran ?></td>
									<td><?= to_rupiah($row->nominal_pinjam)?></td>
											  <td>
											  <select name="aksi" id="aksi" data-id_pengajuan="<?= $row->id_pengajuan?>" class="form-control">
											  	<option value="requested" <?= ($row->status=="requested") ? 'selected':'' ?>>Requested</option>
											  	<option value="accepted" <?= ($row->status=="accepted") ? 'selected':'' ?>>Accepted</option>
											  </select>
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
$(document)
            .on('change','#aksi',function(){            	
               var params = {      
                'id_pengajuan': $(this).data('id_pengajuan'),          
                'status': $(this).val()
	            }
	            $.ajax({
	                url: base_url('pengajuan/updateStatus'),
	                type: 'POST',
	                data: params,
	                success: function () {

	                }
                })
            })
</script>