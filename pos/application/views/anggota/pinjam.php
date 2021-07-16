<div class="container">   
    <div class="row">
        <div class="col-md-4">       
        <form action="<?= site_url('pendaftaran_anggota/tambah_pengajuan') ?>" method="POST" id="pengajuan" role="form">
            <?php foreach ($data_anggota->result() as $row): ?>  
            <div class="form-group">
                <input type="hidden" id="id_anggota" name="id_anggota" value="<?php echo $row->id_anggota ?>">
                <label class="control-label col-md-5" >Nama</label>
                <div class="col-md-7">
                    <input name="nama_anggota" class="form-control" placeholder="Nama" value="<?php echo $row->nama_anggota ?>" class="form-control" type="text" readonly="">
                    <span class="help-block"></span>
                </div>
            </div>  
            <div class="form-group">
                <label class="control-label col-md-5">Alamat</span></label>
                <div class="col-md-7">
                    <textarea name="alamat" class="form-control" placeholder="Alamat" class="form-control" readonly=""><?php echo $row->alamat ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div> 
            <div class="form-group">
                <label class="control-label col-md-5">No Telepon</label>
                <div class="col-md-7">
                    <input name="no_telepon" placeholder="Telepon" value="<?php echo $row->no_tlp ?>" class="form-control" type="text" readonly="">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">Usia</label>
                <div class="col-md-7">
                    <input name="usia" id="usia" placeholder="Usia" value="<?php echo $usia  ?>" class="form-control" type="text" readonly="">
                    <span class="help-block"></span>
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-md-5">Tgl Pengajuan</label>
                <div class="col-md-7">
                    <input name="tanggal_pinjam" class="form-control" type="date" value="<?php echo date('Y-m-d') ?>">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">Jml Pengajuan</label>
                <div class="col-md-7">
                    <input name="jumlah_pengajuan" id="nominal" placeholder="Jumlah Pengajuan" value="<?php // echo $user['no_telepon']  ?>" class="form-control" type="text">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5" >Jml Angsuran</label>
                <div class="col-md-7">
                    <select name="jumlah_angsuran" class="form-control">
                        <option value="5">5 Kali</option>
                        <option value="15">15 Kali</option>
                        <option value="20">20 Kali</option>
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>            
        <?php  endforeach ?>
        </form>
         <div class="form-group">
                <div class="col-md-6"  style="padding: 0px">  
                </div>
                <div class="col-md-6"  style="padding: 0px">
                    <button class="btn btn-success" type="reset">BATAL</button>
                    <button class="btn btn-success" id="save">KIRIM</button>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-hover table-bordered table-striped" id="dataTables-example">
                <thead>
                    <tr>
                        <th>id_anggota</th>
                        <th>nama_anggota</th>
                        <th>tgl_pengajuan</th>
                        <th>jml_pinjam</th>
                        <th>Angsuran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php foreach ($data_pengajuan->result() as $row): ?>
                    <tr>
                        <td><?php echo $row->id_anggota ?></td>
                        <td><?php echo $row->nama_anggota?></td>
                        <td><?php echo $row->tanggal_pengajuan ?></td>                     
                        <td><?php echo $row->nominal_pinjam ?></td>
                        <td><?php echo $row->jumlah_angsuran ?></td>
                        <td><?php echo $row->status ?></td>                        
                    </tr>
                <?php  endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').dataTable();
});
$(document)
          .on('click','#save', function(){
             var usia = $('#usia').val();
             var nominal = $('#nominal').val();
             if(usia >= 65){
                alert('Maaf usia anda lebih dari 65 tahun.!');
             }
             if(nominal == ''){
                alert('Jumlah pengajuan harus diisi.!');
             }
             else{
               $('#pengajuan').submit(); 
             }
          })
</script>