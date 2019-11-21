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
<a href="<?= base_url('perpustakaan/buku') ?>" class="btn btn-warning">Daftar Buku</a>&nbsp;&nbsp;
<a href="<?= base_url('perpustakaan/tambahbuku') ?>" class="btn btn-primary">Tambah Buku</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
        <div class="col-md-12">
            <form action="" method="post"enctype="multipart/form-data">
<?php
$judul = $get_buku['judul'];
$pengarang_id = $get_buku['pengarang_id'];
$penanggungjawab = $get_buku['penanggungjawab'];
$edisi = $get_buku['edisi'];
$gmd_id = $get_buku['gmd_id'];
$tipeisi_id = $get_buku['tipeisi_id'];
$tipemedia_id = $get_buku['tipemedia_id'];
$kalaterbit_id = $get_buku['kalaterbit_id'];
$isbn = $get_buku['isbn'];
$penerbit_id = $get_buku['penerbit_id'];
$tahunterbit = $get_buku['tahunterbit'];
$tempatterbit_id = $get_buku['tempatterbit_id'];
$deskripsifisik = $get_buku['deskripsifisik'];
$judulseri = $get_buku['judulseri'];
$klasifikasi = $get_buku['klasifikasi'];
$nopanggil = $get_buku['nopanggil'];
$topik_id = $get_buku['topik_id'];
$abstrak = $get_buku['abstrak'];
$gambarsampul = $get_buku['gambarsampul'];
$disableopac = $get_buku['disableopac'];
$promoberanda = $get_buku['promoberanda'];
$url = $get_buku['url'];
$urlmultimedia = $get_buku['urlmultimedia'];
?>
<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Judul*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul', isset($judul) ? $judul : ''); ?>">
<?= form_error('judul', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label">Pengarang</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="pengarang_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listpengarang as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('pengarang_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $pengarang_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('pengarang_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="penanggungjawab" class="col-sm-2 control-label">Penganggung Jawab</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab"style="width:80%;" value="<?= set_value('penanggungjawab', isset($penanggungjawab) ? $penanggungjawab : ''); ?>">
<?= form_error('penanggungjawab', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="edisi" class="col-sm-2 control-label">Edisi</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="edisi" name="edisi" style="width:80%;" value="<?= set_value('edisi', isset($edisi) ? $edisi : ''); ?>">
<?= form_error('edisi', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="gmd_id" class="col-sm-2 control-label">Format Fisik Dokumen / GMD</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="gmd_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listgmd as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('gmd_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $gmd_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('gmd_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="tipeisi_id" class="col-sm-2 control-label">Tipe Isi</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="tipeisi_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listtipeisi as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('tipeisi_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $tipeisi_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('tipeisi_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="tipemedia_id" class="col-sm-2 control-label">Tipe Media</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="tipemedia_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listtipemedia as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('tipemedia_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $tipemedia_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('tipemedia_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="kalaterbit_id" class="col-sm-2 control-label">Kala Terbit</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="kalaterbit_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listkalaterbit as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('kalaterbit_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $kalaterbit_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('kalaterbit_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">ISBN/ISSN</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="isbn" name="isbn" value="<?= set_value('isbn', isset($isbn) ? $isbn : ''); ?>">
<?= form_error('isbn', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="penerbit_id" class="col-sm-2 control-label">Penerbit</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="penerbit_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listpenerbit as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('penerbit_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $penerbit_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('penerbit_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Tahun Terbit</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="tahunterbit" name="tahunterbit" value="<?= set_value('tahunterbit', isset($tahunterbit) ? $tahunterbit : ''); ?>">
<?= form_error('tahunterbit', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="tempatterbit_id" class="col-sm-2 control-label">Tempat Terbit</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="tempatterbit_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listtempatterbit as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('tempatterbit_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $tempatterbit_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('tempatterbit_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Deskripsi Fisik</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="deskripsifisik" name="deskripsifisik" value="<?= set_value('deskripsifisik', isset($deskripsifisik) ? $deskripsifisik : ''); ?>">
<?= form_error('deskripsifisik', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Klasifikasi</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="<?= set_value('klasifikasi', isset($klasifikasi) ? $klasifikasi : ''); ?>">
<?= form_error('klasifikasi', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">No Panggil</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="nopanggil" name="nopanggil" value="<?= set_value('nopanggil', isset($nopanggil) ? $nopanggil : ''); ?>">
<?= form_error('nopanggil', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="judul" class="col-sm-2 control-label">Judul Seri</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="judulseri" name="judulseri" value="<?= set_value('judulseri', isset($judulseri) ? $judulseri : ''); ?>">
<?= form_error('judulseri', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="topik_id" class="col-sm-2 control-label">Topik</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="topik_id" style="width:80%;">
<option value=""> Belum ditentukan </option>
<?php foreach ($listtopik as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('tempatterbit_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $topik_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('topik_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="abstrak" class="col-sm-2 control-label">Abstrak</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="abstrak" name="abstrak" value="<?= set_value('abstrak', isset($abstrak) ? $abstrak : ''); ?>">
<?= form_error('abstrak', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="abstrak" class="col-sm-2 control-label">Gambar Sampul</label>
<div class="col-sm-8">
<?php if($gambarsampul){?>
<a href="<?= base_url('assets/images/buku/').$gambarsampul?>"target="new"><?= $gambarsampul?></a>
<?php } ?>
<input type="file" class="custom-file-input" id="image" name="image">
</div>
</div>

<div class="form-group row">
<label for="abstrak" class="col-sm-2 control-label">Sembunyikan di OPAC</label>
<div class="col-sm-8">
<div class="checkbox">
<label>
<input class="form-check-input" type="checkbox" value="1" name="disableopac" id="disableopac" <?= $disableopac == '1' ? 'checked' : ''; ?>> Tampilkan ?
</label>
</div>
</div>
</div>

<div class="form-group row">
<label for="abstrak" class="col-sm-2 control-label">Promosikan Ke Beranda</label>
<div class="col-sm-8">
<div class="checkbox">
<label>
<input class="form-check-input" type="checkbox" value="1" name="promoberanda" id="promoberanda" <?= $promoberanda == '1' ? 'checked' : ''; ?>> Tampilkan ?
</label>
</div>
</div>
</div>

<div class="form-group row">
<label for="url" class="col-sm-2 control-label">URL</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="url" name="url" value="<?= set_value('url', isset($url) ? $url : ''); ?>">
<?= form_error('url', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="urlmultimedia" class="col-sm-2 control-label">URL Multimedia</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="urlmultimedia" name="urlmultimedia" value="<?= set_value('urlmultimedia', isset($urlmultimedia) ? $urlmultimedia : ''); ?>">
<?= form_error('urlmultimedia', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label"> </label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= base_url('perpustakaan/tambahbuku'); ?> " class="btn btn-default">Cancel</a>
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