<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-file-text-o fa-fw'></i> Laporan Zakat Masuk</h5>
            <hr />

            <form action="<?php echo base_url()?><?php echo $fungsi;?>" method="POST">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-horizontal">
                    
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Dari Tanggal</label>
                            <div class="col-sm-8">
                                <input type='date' name='from' class='form-control' id='tanggal_dari' value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Sampai Tanggal</label>
                            <div class="col-sm-8">
                                <input type='date' name='to' class='form-control' id='tanggal_sampai' value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>	

            <div class='row'>
                <div class="col-sm-5">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-primary" id="tampil" style='margin-left: 0px;'>Tampilkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br />
            <div id='result'></div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#tampil').click(function () {
      $('#result').load(base_url('laporan/getpejakat?')+ 'from='+$('[name="from"]').val()+ '&to='+$('[name="to"]').val());
    });
</script>