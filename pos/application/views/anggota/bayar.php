<section>
    <div class="container">
        <div class="row">
             <div class="col-md-4">    
              <form action="<?= site_url('pendaftaran_anggota/tambah_pembayaran') ?>" method="POST" role="form">
            <?php foreach ($data_anggota->result() as $row): ?>       
            <div class="form-group">                
                <label class="control-label col-md-5" >Nama</label>
                <div class="col-md-7">
                    <input type="hidden" name="id_anggota" value="<?php echo $row->id_anggota ?>">
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
                <label class="control-label col-md-5">Tgl Bayar</label>
                <div class="col-md-7">
                    <input name="tanggal_bayar" class="form-control" value="<?= date('Y-m-d')?>" type="date" >
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">Jml Bayar</label>
                <div class="col-md-7">
                    <input name="jumlah_bayar" placeholder="Jumlah Pengajuan" value="<?php // echo $user['no_telepon']  ?>" class="form-control" type="text">
                    <span class="help-block"></span>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-md-6"  style="padding: 0px">                   

                </div>
                <div class="col-md-6"  style="padding: 0px">
                    <button class="btn btn-success" id="setting">BATAL</button>
                    <button class="btn btn-success" id="setting">KIRIM</button>
                    <span class="help-block"></span>
                </div>
            </div>
        <?php  endforeach ?>
        </form>
        </div>

        <div class="col-md-8">
                <table class="table table-hover table-bordered table-striped">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped" id="dataTables-example">
                            <thead>
                                <tr>     
                                    <th><center>no </center></th>                                  
                                    <th><center>nama </center></th>                                    
                                    <th><center>tgl bayar</center></th>
                                    <th width="50"><center>Jml angsuran</center></th>
                                    <th width="50"><center>angsuran ke</center></th>
                                    <th width="70"><center>Jml bayar</center></th>
                                    <th width="50"><center>sisa pembayaran</center></th>
                                    <th><center>Ket.</center></th>
                                    <th><center>Status</center></th>
                                   
                                </tr>
                            </thead>
                            <?php 
                             $no = 0;
                               foreach ($data_pembayaran->result() as $row): $no++?>
                                <tr>     
                                   <td><?php echo $no ?></td>                              
                                    <td><?php echo $row->nama_anggota?></td>
                                    <td><?php echo $row->tgl_bayar?></td>
                                    <td><?php echo $row->jumlah_angsuran?></td>
                                    <td><?php echo $row->angsuran_ke ?></td>
                                    <td><?php echo to_rupiah($row->jumlah_bayar)?></td>
                                    <td><?php echo to_rupiah($row->sisa_bayar)?></td>
                                    <td><?php echo $row->keterangan?></td>
                                    <td><?php echo $row->status?></td>
                                </tr>
                            <?php  endforeach ?>
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
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>