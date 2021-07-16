<div class="main">
<div class="container">
    <div class="row">
    <div id="div1">
<table border="1" class="table table-striped dataTables-example" id="tableSiswa" style="border-collapse: collapse; width:80%; text-align: center;margin-left: 15%;">
    <thead>
    <tr style="background-color: #b8b894;">
        <th>No</th>
        <th>id anggota</th>
        <th>nama anggota</th>
        <th>Tanggal simpan</th>
        <th>Jenis Simpan</th>
        <th>Total simpan</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php
        $i = 1;
        foreach($lap as $s){
        $c = $i++;
        ?>
        <tr style="text-align: left;">
          <td><?php echo $c?></td>
          <td><?php echo $s->id_anggota?></td>
          <td><?php echo $s->nama_anggota?></td>
          <td><?php echo $s->tgl_simpan?></td>
          <td><?php echo $s->jenis_simpan?></td>
          <td><?php echo to_rupiah($s->total_simpan) ?></td>
        <?php
        }
        ?>
      </tr> 
      </tbody> 
</table>
</div>
    <button class="btn btn-info btn-lg" value="Print dan Preview" id="print" data-tgl_mulai="<?php echo $tgl_mulai; ?>" data-tgl_selesai="<?php echo $tgl_selesai; ?>"><span class="fa fa-print"> Print</span></button>
</div>
</div>
</div>
<script type="text/javascript">
  $(document)
              .on('click','#print',function(){
                 window.open(base_url('laporan/print_laporan/')+$(this).data('tgl_mulai')+'/'+$(this).data('tgl_selesai'));
              }) 
  
</script>