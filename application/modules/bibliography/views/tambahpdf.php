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
<?php $buku_id = $get_buku['id'];  ?>
<?php $judul = $get_buku['judul'];  ?>
<?php $nopanggil = $get_buku['nopanggil'];  ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
<a href="<?= base_url('bibliography/buku') ?>" class="btn btn-warning">Daftar Buku</a>&nbsp;&nbsp;
<a href="<?= base_url('bibliography/tambahpdf') ?>" class="btn btn-primary">Tambah PDF</a>
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
<label for="judul" class="col-sm-2 control-label">File*</label>
<div class="col-sm-8">
<input type="file" class="custom-file-input" id="userfile" name="userfile"required>
<input type="hidden" name="buku_id"value="<?= $buku_id ?>">
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label"> </label>
<div class="col-sm-10">
<a href="<?= base_url('bibliography/hapus_pdf/'.$buku_id); ?> " class="btn btn-danger"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= base_url('bibliography/buku'); ?> " class="btn btn-default">Kembali</a>
<a href="<?= base_url('assets/images/pdf/'.$buku_id.".pdf"); ?> " class="btn btn-success"target="new">Lihat</a>
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