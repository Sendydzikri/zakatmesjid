<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-hover table-bordered table-striped">
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
                                <th>No</th>
							    <th>Id anggota</th>
								<th>Nama anggota</th>
								<th>Tgl bayar</th>
								<th>Angsuran ke</th>
								<th>Jumlah bayar</th>
								<th>Keterangan</th>
								<th style="width: 100px">Status</th>
								
							</tr>
						</thead>
						<?php $no= 1;
						 foreach ($data_pembayaran->result() as $row): ?>
					           <tr>
					           	   <td><?= $no++ ?></td>
								    <td><?= $row->id_anggota ?></td>
									<td><?= $row->nama_anggota ?></td>
									<td><?= $row->tgl_bayar ?></td>
									<td><?= $row->angsuran_ke ?></td>
									<td><?= to_rupiah($row->jumlah_bayar) ?></td>
									<td><?= $row->keterangan ?></td>
											  <td>
											  <select name="aksi" id="aksi" data-id_pembayaran="<?= $row->id_pembayaran?>" class="form-control">
											  	<option value="waiting" selected >Waiting</option>
											  	<option value="confirm">Confirm</option>
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
                'id_pembayaran': $(this).data('id_pembayaran'),          
                'status': $(this).val()
	            }
	            $.ajax({
	                url: base_url('pembayaran/updateStatusPembayaran'),
	                type: 'POST',
	                data: params,
	                success: function () {
	                  alert('pembayaran telah di konfirmasi');
                      location.reload();
	                }
                })
            })
</script>