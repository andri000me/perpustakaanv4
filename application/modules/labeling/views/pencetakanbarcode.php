<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>
        <?php foreach ($this->cart->contents() as $items): ?>
            <?php 
            $totalitemcart++;
            ?>
            <?php endforeach; ?>
            <div class="alert alert-warning" role"alert"> Saat ini terdapat <?= $totalitemcart ?> dalam antrian menunggu untuk dicetak</div>
        <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
        <a href="<?= base_url('labeling/batalkan_antrianbarcode') ?>" class="btn btn-danger"onclick="return confirm('Anda yakin ?');"><i class="fa fa-fw fa-trash"></i>BATALKAN ANTRIAN PENCETAKAN</a>&nbsp;&nbsp;<a href="<?= base_url('labeling/cetak_barcode') ?>" class="btn btn-info"target="new"><i class="fa fa-fw fa-print"></i>CETAK</a></div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?= base_url('labeling/tambah_eksemplarbarcode') ?>" method="post">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                      <th>Tambah</th>
                      <th>Kode</th>
                      <th>Judul</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($listeksemplar as $dt) : ?>
                    <tr>
                        <td><input name="check[]" type="checkbox" value="<?= $dt['id'] ?>"></td>
                      <td><?= $dt['item_kode']; ?></td>
                      <td><?= $dt['judul']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <input type="submit" value="Tambah Data Terpilih" name="submit"class="btn btn-success"onclick="return confirm('Anda yakin ?.');" >&nbsp;<a href="#" onclick="chunchall(this);return false"class="btn btn-warning">Check all</a>
            </form>
              
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->