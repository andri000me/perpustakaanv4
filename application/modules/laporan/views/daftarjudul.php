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
      </div>
      <div class="box-body">
        <div class="row">
        <!-- /Filter Laporan -->
          <div class="col-md-4">
            <form action="" method="post">

              <div class="form-group <?php echo form_error('judul') ? 'has-error' : '' ?>">
                <label for="judul">Judul</label>
                <input class="form-control" type="text" name="judul" value="<?= set_value('judul', isset($judul) ? $judul : ''); ?>" />
              </div>
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a href="<?= base_url('laporan/daftarjudul'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <!-- /Filter Laporan -->
          <div class="col-md-12">
<?php if($get_daftarjudul){?>
  <br>
<table  class="table" id="example1">
<thead>
<tr>
<td>Judul</td>
<td>Salin</td>
<td>Tempat Terbit</td>
<td>Penerbit</td>
<td>ISBN/ISNN</td>
<td>No.Panggil</td>
</tr>
</thead>
<tbody>
  <?php foreach ($get_daftarjudul as $dt) : ?>
<tr>
<td><?= $dt['judul']; ?></td>
<td><?= get_eksemplarbuku($dt['id']); ?></td>
<td><?= $dt['tempatterbit']; ?></td>
<td><?= $dt['penerbit']; ?></td>
<td><?= $dt['isbn']; ?></td>
<td><?= $dt['nopanggil']; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</tbody>
</table>
<a href="<?php echo site_url('laporan/daftarjudul_pdf'); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<?php }?>
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