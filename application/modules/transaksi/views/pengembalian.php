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
          <form action="" method="post"enctype="multipart/form-data">
          <div class="alert alert-success" role="alert">
          <?= $title; ?> - Masukan kode eksemplar dengan menggunakan papan kunci atau pemindai barkod
</div>
<div class="form-group inline">
<label for="item_kode" class="col-sm-2 control-label">ID Eksemplar :</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="item_kode" name="item_kode"required>
</div>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Kembali</button>
</div>
</div>

          </form>             
          </div>
        </div>
<!-- data pengembalian -->
      </div>
<?= $this->session->flashdata('message2') ?>
<?= $this->session->flashdata('message3') ?>


      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->