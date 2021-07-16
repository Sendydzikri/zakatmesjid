<?php if (count($penjualan) > 0) { ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped" id="dataTables-example">
            <thead>
                <tr>
                    <td style="width: 20px"><b>#</b></td>
                    <td><b>Tanggal </b></td>
                    <td><b>Total Penjualan</b></td>                
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($penjualan as $data_penjualan) {
                    $total+= $data_penjualan['total_harga'];
                    ?>
                    <tr>
                        <td><?php echo $data_penjualan['id'] ?></td>
                        <td><?php echo $data_penjualan['tgl'] ?></td>
                        <td><?php echo $data_penjualan['total_harga'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr><td colspan="2"><b>Total Keseluruhan</b></td><td><?php echo $total; ?></td></tr>
            </tfoot>
        </table>
        <p>
            <a href="<?php echo site_url('laporan/pdf/'.$from.'/'.$to);    ?>" target='blank' class='btn btn-default'><img src="<?php echo base_url('assets/img'); ?>/pdf.png"> Export ke PDF</a>
        </p>
    <?php } ?>
    <?php if (count($penjualan) == 0) { ?>
        <div class='alert alert-info'>
            Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
        </div>
        <br />
    <?php } ?>
</div>