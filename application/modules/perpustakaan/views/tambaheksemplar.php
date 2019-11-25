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
<?php $judul = $get_buku['judul'];  ?>
<?php $nopanggil = $get_buku['nopanggil'];  ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
<a href="<?= base_url('perpustakaan/buku') ?>" class="btn btn-warning">Daftar Buku</a>&nbsp;&nbsp;
<a href="<?= base_url('perpustakaan/tambahbuku') ?>" class="btn btn-primary">Tambah Buku</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
        <div class="col-md-12">
            <form action="" method="post"enctype="multipart/form-data">

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Judul*</label>
<div class="col-sm-8">
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
<label for="total" class="col-sm-2 control-label">Pemroses nomor eksemplar</label>
<div class="col-sm-3"><label for="total">Pattern:</label>
<select class="js-example-basic-single" name="pattern" style="width:50%;">
<?php foreach ($get_pattern as $dt) : ?>
<option value="<?= $dt['id']; ?>"><?= $dt['itemcodepattern']; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="col-sm-3"><label for="total">TotalItem:</label>
<input type="text" id="total" name="total" value="<?= set_value('total', isset($total) ? $total : '0'); ?>">
<?= form_error('total', '<span class="help-block">', '</small>'); ?>
</div>
<div class="col-sm-3"><label for="total">TipeKoleksi:</label>
<select class="js-example-basic-single" name="tipekoleksi" style="width:50%;">
<?php foreach ($get_tipekoleksi as $dt) : ?>
<option value="<?= $dt['id']; ?>"><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>


<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Lokasi*</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="lokasi" style="width:50%;">
<?php foreach ($get_lokasi as $dt) : ?>
<option value="<?= $dt['id']; ?>"><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="form-group row">
<label for="lokasirak" class="col-sm-2 control-label">Lokasi Rak</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="lokasirak" name="lokasirak" value="<?= set_value('lokasirak', isset($lokasirak) ? $lokasirak : ''); ?>">
<?= form_error('lokasirak', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="lokasirak" class="col-sm-2 control-label">Sumber Perolehan</label>
<div class="col-sm-8">
<input type="radio" name="sumber" value="1" checked> Beli<br>
<input type="radio" name="sumber" value="2"> Hadiah/Hibah<br>
</div>
</div>

<div class="form-group row">
<label for="faktur" class="col-sm-2 control-label">Faktur</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="faktur" name="faktur" value="<?= set_value('faktur', isset($faktur) ? $faktur : ''); ?>">
<?= form_error('faktur', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="faktur" class="col-sm-2 control-label">Tanggal Faktur</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="tanggalfaktur" name="tanggalfaktur" value="<?= set_value('tanggalfaktur', isset($tanggalfaktur) ? $tanggalfaktur : ''); ?>">
<?= form_error('tanggalfaktur', '<span class="help-block">', '</small>'); ?>
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
<a href="<?= base_url('perpustakaan/buku'); ?> " class="btn btn-default">Kembali</a>
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