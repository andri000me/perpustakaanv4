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
          <div class="col-sm-3">
<form action="<?= base_url('perpustakaan/selesaitransaksi'); ?>" method="post"enctype="multipart/form-data">          
<button type="submit" class="btn btn-success"><br>Selesai Transaksi<br><br></button>
</form>
</div>          
<div class="col-sm-3">
Nama Anggota<br>
<?= $getanggota['nama'] ?>
</div>
<div class="col-sm-3">
Kode Anggota<br>
<?= $getanggota['member_id'] ?>
</div>
<div class="col-sm-3">
Keanggotaan<br>
<?= $getanggota['tipeanggota'] ?>
</div>
<div class="col-sm-3">
Maksimal Peminjaman<br>
<?= $loan_limit ?>
</div>
<div class="col-sm-3">
Lama Peminjaman<br>
<?= $loan_periode ?>
</div>
<div class="col-sm-3">
Denda per Hari<br>
<?= $fine_each_day ?>
</div>
</div>
</div>
</div>        
<!-- /.box-body -->
</div>
<!-- /.box -->
        <div class="box">
          <div class="row">
          <div class="col-md-12">
<?php
$fines_date=$get_denda['fines_date'];
$description=$get_denda['description'];
$debet=$get_denda['debet'];
$credit=$get_denda['credit'];
?>
          <form action="" method="post"enctype="multipart/form-data">
<table class="table"><tr><td>
<div class="form-group row">
<label for="fines_date" class="col-sm-2 control-label">Tanggal</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="tanggalsaja" name="fines_date" value="<?= set_value('fines_date', isset($fines_date) ? $fines_date : $fines_date); ?>">
<?= form_error('fines_date', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="description" class="col-sm-2 control-label">Deskripsi*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="description" name="description" value="<?= set_value('description', isset($description) ? $description : ''); ?>"required>
<?= form_error('description', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="debet" class="col-sm-2 control-label">Debet*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="debet" name="debet" value="<?= set_value('debet', isset($debet) ? $debet : '0'); ?>"required>
<?= form_error('debet', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="credit" class="col-sm-2 control-label">Credit</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="credit" name="credit" value="<?= set_value('credit', isset($credit) ? $credit : '0'); ?>">
<?= form_error('credit', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label"> </label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= base_url('perpustakaan/transaksi2'); ?> " class="btn btn-default">Cancel</a>
</div>
</div>
</table>
</form>

 </div> 
 </div> 
 </div>         


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->   