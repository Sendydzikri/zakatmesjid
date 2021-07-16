<script>
function displayResult(solid_susu){ 
 document.getElementById("nominal").value=solid_susu; 
}
</script>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('setoran/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Setoran</legend>

					<div class="form-group">
						<label for="">id anggota</label>
						<input type="text" class="form-control" name="id_anggota" placeholder="id_anggota">
					</div>
					<div class="form-group">
						<label for="">nama anggota</label>
						<input type="text" class="form-control" name="nama_anggota" placeholder="nama_anggota">
					</div>
					<div class="form-group">
						<label for="">Tanggal Setor</label>
						<input type="date" id="tgl_setor" class="form-control" name="tgl_setoran" value="<?= date('Y-m-d')?>">
					</div>
					<div class="required">
				<label for="solid_susu">Tingkat Kesolidan Susu :</label>
				<input type="radio" name="solid_susu" onclick="displayResult(this.value)" value="4700" class="required" title="Tingkat Kesolidan Susu harus diisi"/> High
				<input type="radio" name="solid_susu" onclick="displayResult(this.value)" value="4000" class="required" title="Tingkat Kesolidan Susu harus diisi"/> medium
				<input type="radio" name="solid_susu" onclick="displayResult(this.value)" value="3500" class="required" title="Tingkat Kesolidan Susu harus diisi"/> low
					</div>
					<div class="required">				
					<label for="nominal">Nominal Rp:</label>
					<input type="text" name="nominal" id="nominal"  readonly="readonly" size="54" class="required" title="Nama harus diisi"/>
					</div>
				<div class="form-group">
						<label for="">total Rp.</label>
						<input type="text" class="form-control" name="total" placeholder="total">
					</div>	
					<a class="btn btn-default" href="<?= site_url('setoran') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(function(){
       $('#tgl_setor').datepicker();
	})
	
</script>
