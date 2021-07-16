<div class="main">
<div class="container">
    <div class="row">
<legend><?php echo $title;?></legend>
<div class="form-horizontal">
<form action="<?php echo base_url()?><?php echo $fungsi;?>" method="POST">
    <div class="form-group">
        <label class="col-lg-3">Tanggal Awal</label>
        <div class="col-lg-5">
            <input type="date" name="tanggal1" id="tgl2" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3">Tanggal Selesai</label>
        <div class="col-lg-5">
            <input type="date" name="tanggal2" id="tgl3" class="form-control">
        </div>
        
        <div class="col-lg-4">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
    </div>
    </form>
</div>
<div id="tampil"></div>
</div>
</div>
</div>