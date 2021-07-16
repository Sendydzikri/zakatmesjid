<div class="main">
 <div class="container"> 
    <div class="row">
    <div id="div1">
<table border="1" class="table table-striped dataTables-example" id="tablepejakat" style="border-collapse: collapse; width:80%; text-align: center;margin-left: 15%;">
    <thead>
    <tr style="background-color: #b8b894;">
        <th>no</th>
        <th>nama pejakat</th>
        <th>tanggal</th>
        <th>alamat</th>
        <th>Jenis zakat</th>
        <th>jumlah keluarga</th>
        <th>nominal</th>
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
          <!-- <td><?php echo $s->"nama_pejakat"?></td> -->
          <td><?php echo $s->'tanggal'?></td>
          <td><?php echo $s->'alamat'?></td>
          <td><?php echo $s->'jeni_zakat'?></td>
          <td><?php echo $s->'jum_keluarga'?></td>
          <td><?php echo $s->'nominal') ?></td>
          </tr>
        <?php
        
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