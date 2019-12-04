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
    <div class="alert alert-warning" role"alert"> Saat ini terdapat <?= $totalitemcart ?> dalam antrian menunggu untuk dicetak</div>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
                </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?= base_url('labeling/tambah_eksemplar') ?>" method="post">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                      <th>Tambah</th>
                      <th>Judul</th>
                      <th>No.Panggil</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($listeksemplar as $dt) : ?>
                    <tr>
                        <td><input name="check[]" type="checkbox" value="<?= $dt['id'] ?>"></td>
                      <td><?= $dt['judul']; ?></td>
                      <td><?= $dt['nopanggil']; ?></td>
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