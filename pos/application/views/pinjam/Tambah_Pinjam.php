<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pinjam/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Pinjam</legend>

					<div class="form-group">
						<label for="">id anggota</label>
						<input type="text" class="form-control" name="id_anggota" placeholder="id anggota">
					</div>
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" name="nama_anggota" placeholder="nama anggota">
					</div>
					<div class="form-group">
						<label for="">Tanggal Pinjam</label>
						<input type="date" class="form-control" name="tgl_pinjam" value="<?php echo date('Y-m-d')?>">
					</div>
					<div class="form-group">
						<label>Jenis Alat</label>
						    <select name="jenis_alat" id="jenis_alat" class="form-control" required>
								<option value="pakan">pakan</option>
								<option value="perawatan">perawatan</option>
							</select>
					</div>
					<div class="form-group">
						<label>Jumlah Pinjam</label>
						<input type="text" id="jml_pinjam" class="form-control" name="jml_pinjam" placeholder="Jumlah Pinjam">
					</div>
					<div class="form-group">
						<label>Total Bayar</label>
						<input type="text" class="form-control" name="total_bayar" placeholder="Total Bayar">
					</div>
					<div class="form-group">
						<label>Pembayaran</label>
						<select name="status" class="form-control" required>
							<option value="cash">cash</option>
						    <option value="credit">credit</option>
						</select>
					</div>
					<a class="btn btn-default" href="<?= site_url('pinjam') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
	    $("#jml_pinjam").keyup(function() { 
            var params = {
            	'jumlah' : $(this).val(),
            	'jenis' : $('#jenis_alat').val()
            }

            $.ajax({
                    url: base_url('pinjam/cekStok'),
                    type: "POST",
                    data: params,
                    dataType: 'json',
                    success: function (data) {
                        
                    }
            });
        });
    })
</script>