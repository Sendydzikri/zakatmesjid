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
								<th>Tgl setoran</th>
								<th>Nominal</th>
								<th>Total</th>
								<th width="170px">Status</th>
								<th width="50px">Cetak</th>
							</tr>
						</thead>
						<?php 
						   foreach ($data_setoran->result() as $row): ?>
					       <tr>
					       	    <td><?= $row->no ?></td>
							    <td><?= $row->id_anggota ?></td>
								<td><?= $row->nama_anggota ?></td>
								<td><?= $row->tgl_setoran ?></td>
								<td><?= to_rupiah($row->nominal)?></td>
								<td><?= to_rupiah($row->total)?></td>
								<td>
								  <select name="status_setoran" id="status_setoran" data-no="<?= $row->no ?>" class="form-control">
								  	<option value="belum diterima" <?= ($row->status =='belum diterima')? 'selected' : ''; ?>>Belum diterima</option>
								  	<option value="diterima" <?=($row->status =='diterima')? 'selected' : ''; ?>>Diterima</option>
								  </select>
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
           })
           .on('change','#status_setoran',function(){
             var params = {      
                'no': $(this).data('no'),          
                'status': $(this).val()
	            }
	            $.ajax({
	                url: base_url('pembayaran/updateStatusSetoran'),
	                type: 'POST',
	                data: params,
	                success: function () {
	                  alert('Transaksi Berhasil');
                      location.reload();
	                }
                })
	        });
</script>