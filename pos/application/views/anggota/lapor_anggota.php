<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <br>
        <br><table class="table table-hover table-bordered table-striped">
    <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped" id="dataTables-example">
            <thead>
              <tr>
              <th>id anggota</th>
                <th>nama anggota</th>
                <th>alamat</th>
                <th>no telepon</th>
                <th>persyaratan</th>
              </tr>
            </thead>
            <?php foreach ($datas->result() as $row):?>
             <tr>
                      <td><?= $row->id_anggota ?></td>
                  <td><?= $row->nama_anggota ?></td>
                  <td><?= $row->alamat ?></td>
                  <td><?= $row->no_tlp?></td>
                  <td><?= $row->persyaratan?></td>
                      </tr>
                    <?php endforeach ?>
            </tbody>
          </table>
          <a href="<?php echo base_url()?>index.php/anggota/print_pdf" class="btn btn-danger btn-lg"><span class="fa fa-file-pdf-o"> Export PDF </span></a>
        </div>
      </div>
    </div>
  </div>
</section>