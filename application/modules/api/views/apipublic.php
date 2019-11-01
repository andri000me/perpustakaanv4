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
        <h3 class="box-title">Manage <?= $title; ?></h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-4">
<table class="table">
  <tr><td>Table</td><td>Aksi</td></tr>
  <tr><td>Tahun Ajaran</td><td><a href="<?= base_url('api/tahunajaran') ?>"target='new'class='btn btn-primary'>Download API</a></td></tr>
  <tr><td>Absensi</td><td>
  <form action="<?= base_url('api/absensisiswa')?>"method="post"target="new">
  <div class="form-group <?= form_error('tahunajaran') ? 'has-error' : '' ?>">
								<input class="form-control" type="text" name="tahunajaran" value="<?= set_value('tahunajaran'); ?>" placeholder="tahunajaran">
								<?= form_error('tahunajaran', '<span class="help-block">', '</small>'); ?>
							</div>
              <div class="form-group <?= form_error('semester') ? 'has-error' : '' ?>">
								<input class="form-control" type="text" name="semester" value="<?= set_value('semester'); ?>" placeholder="semester">
								<?= form_error('semester', '<span class="help-block">', '</small>'); ?>
							</div>
              <div class="form-group <?= form_error('nis') ? 'has-error' : '' ?>">
								<input class="form-control" type="text" name="nis" value="<?= set_value('nis'); ?>" placeholder="nis">
								<?= form_error('nis', '<span class="help-block">', '</small>'); ?>
							</div>
              <button type="submit" class="btn btn-primary">Download</button>
  </form>
  
  
  </td></tr>
</table>
            
      </div>
      <!-- /.box -->
    </div>
    <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->