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
          <?= $title; ?> - Masukkan Nomor anggota untuk mulai transaksi dengan papan kunci atau pemindai
</div>
<div class="form-group inline">
<label for="member_id" class="col-sm-2 control-label">ID Member</label>
<div class="col-sm-6">
<select class="js-example-basic-single form-control" name="member_id">
<option value="">Belum di Pilih</option>
<?php foreach ($selectanggota as $dt) : ?>
<option value="<?= $dt['member_id']; ?>" <?= $dt['member_id'] == $member_id ? ' selected="selected"' : ''; ?>><?= $dt['member_id']; ?> (<?= $dt['nama']; ?>)</option>
<?php endforeach; ?>
                </select>
<?= form_error('member_id', '<span class="help-block">', '</small>'); ?>
</div>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Mulai Transaksi</button>
</div>
</div>

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