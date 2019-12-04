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
<?php
$nama = $get_tipeanggota['nama'];
$loan_limit = $get_tipeanggota['loan_limit'];
$loan_periode = $get_tipeanggota['loan_periode'];
$reborrow_limit = $get_tipeanggota['reborrow_limit'];
$fine_each_day = $get_tipeanggota['fine_each_day'];
?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
<a href="<?= base_url('keanggotaan/tipeanggota') ?>" class="btn btn-warning">Daftar Tipe Anggota</a>&nbsp;&nbsp;
<a href="<?= base_url('keanggotaan/tambahtipeanggota') ?>" class="btn btn-primary">Tambah Tipe Anggota</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
        <div class="col-md-12">
            <form action="" method="post"enctype="multipart/form-data">

<div class="form-group row">
<label for="nama" class="col-sm-2 control-label">Nama*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama', isset($nama) ? $nama : ''); ?>">
<?= form_error('nama', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="loan_limit" class="col-sm-2 control-label">Jumlah Pinjaman</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="loan_limit" name="loan_limit" value="<?= set_value('loan_limit', isset($loan_limit) ? $loan_limit : ''); ?>">
<?= form_error('loan_limit', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="loan_periode" class="col-sm-2 control-label">Lama Pinjaman (dalam hari)</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="loan_periode" name="loan_periode" value="<?= set_value('loan_periode', isset($loan_periode) ? $loan_periode : ''); ?>">
<?= form_error('loan_periode', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="reborrow_limit" class="col-sm-2 control-label">Kali Perpanjangan</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="reborrow_limit" name="reborrow_limit" value="<?= set_value('reborrow_limit', isset($reborrow_limit) ? $reborrow_limit : ''); ?>">
<?= form_error('reborrow_limit', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="fine_each_day" class="col-sm-2 control-label">Denda perhari</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="fine_each_day" name="fine_each_day" value="<?= set_value('fine_each_day', isset($fine_each_day) ? $fine_each_day : ''); ?>">
<?= form_error('fine_each_day', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label"> </label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= base_url('keanggotaan/tambahtipeanggota'); ?> " class="btn btn-default">Cancel</a>
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