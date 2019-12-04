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
<a href="<?= base_url('master/eksemplar') ?>" class="btn btn-warning">Daftar Eksemplar</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
        <div class="col-md-12">
 <?php
 $buku_id= $get_eksemplar['buku_id'];
 $judul= $get_eksemplar['judul'];
 $nopanggil= $get_eksemplar['nopanggil'];
 $item_kode= $get_eksemplar['item_kode'];
 $tipekoleksi_id= $get_eksemplar['tipekoleksi_id'];
 $lokasi_id= $get_eksemplar['lokasi_id'];
 $lokasi_rak= $get_eksemplar['lokasi_rak'];
 $item_status_id= $get_eksemplar['item_status_id'];
 $supplier_id= $get_eksemplar['supplier_id'];
 $source_id= $get_eksemplar['source_id'];
 $invoice= $get_eksemplar['invoice'];
 $invoice_tanggal= $get_eksemplar['invoice_tanggal'];
 $harga= $get_eksemplar['harga'];
 ?>       
<form action="" method="post"enctype="multipart/form-data">
<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Judul*</label>
<div class="col-sm-8">
<input type="hidden" class="form-control" id="buku_id" name="buku_id" value="<?= set_value('buku_id', isset($buku_id) ? $buku_id : ''); ?>" readonly>
<input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul', isset($judul) ? $judul : ''); ?>" readonly>
<?= form_error('judul', '<span class="help-block">', '</small>'); ?>
</div>
</div>
<div class="form-group row">
<label for="nopanggil" class="col-sm-2 control-label">No Panggil</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="nopanggil" name="nopanggil" value="<?= set_value('nopanggil', isset($nopanggil) ? $nopanggil : ''); ?>">
<?= form_error('nopanggil', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="item_kode" class="col-sm-2 control-label">Item Kode</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="item_kode" name="item_kode" value="<?= set_value('item_kode', isset($item_kode) ? $item_kode : ''); ?>">
<?= form_error('item_kode', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Tipe Koleksi</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="tipekoleksi_id" style="width:50%;">
<?php foreach ($get_tipekoleksi as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('tipekoleksi_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $tipekoleksi_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>


<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Lokasi</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="lokasi_id" style="width:50%;">
<?php foreach ($get_lokasi as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('lokasi_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $lokasi_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="form-group row">
<label for="lokasi_rak" class="col-sm-2 control-label">Lokasi Rak</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="lokasi_rak" name="lokasi_rak" value="<?= set_value('lokasi_rak', isset($lokasi_rak) ? $lokasi_rak : ''); ?>">
<?= form_error('lokasi_rak', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Status Eksemplar</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="item_status_id" style="width:50%;">
<option value="0">Tersedia</option>
<?php foreach ($get_statusitem as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('item_status_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $item_status_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Agen/Supplier</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="supplier_id" style="width:50%;">
<option value="">Tidak digunakan</option>
<?php foreach ($get_supplier as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('supplier_id', $dt['id'], FALSE); ?> 
<?= $dt['id'] == $supplier_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="form-group row">
<label for="lokasirak" class="col-sm-2 control-label">Sumber Perolehan</label>
<div class="col-sm-8">
<input type="radio" name="source_id" value="1" <?= set_value('source_id', $source_id == 1 ? "checked" : ""); 
?> /> Beli<br>
<input type="radio" name="source_id" value="2" <?= set_value('source_id', $source_id == 2 ? "checked" : ""); 
?>> Hadiah/Hibah<br>
</div>
</div>

<div class="form-group row">
<label for="invoice" class="col-sm-2 control-label">Faktur</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="invoice" name="invoice" value="<?= set_value('invoice', isset($invoice) ? $invoice : ''); ?>">
<?= form_error('faktur', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="faktur" class="col-sm-2 control-label">Tanggal Faktur</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="invoice_tanggal" name="invoice_tanggal" value="<?= set_value('invoice_tanggal', isset($invoice_tanggal) ? $invoice_tanggal : ''); ?>">
<?= form_error('invoice_tanggal', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="faktur" class="col-sm-2 control-label">Harga</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga', isset($harga) ? $harga : '0'); ?>">
<?= form_error('harga', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label"> </label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= base_url('master/eksemplar'); ?> " class="btn btn-default">Kembali</a>
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