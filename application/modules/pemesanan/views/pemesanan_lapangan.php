
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

        <?php $role_idv = set_value('role_id'); ?>

        <form class="form-horizontal" action="<?php base_url('pemesanan/lapangan') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group <?= form_error('tglmulai') ? 'has-error' : '' ?>">
            <label for="tglmulai" class="col-sm-4 control-label">Tgl Mulai <span class="text-red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="tglmulai"id="tglmulai" value="<?= set_value('tglmulai'); ?>" />
              <?= form_error('tglmulai', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('tglselesai') ? 'has-error' : '' ?>">
            <label for="tglselesai" class="col-sm-4 control-label">Tgl Selesai <span class="text-red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="tglselesai"id="tglselesai" value="<?= set_value('tglselesai'); ?>" />
              <?= form_error('tglselesai', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('pemesan') ? 'has-error' : '' ?>">
            <label for="pemesan" class="col-sm-4 control-label">Pemesan <span class="text-red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="pemesan" value="<?= set_value('pemesan'); ?>" />
              <?= form_error('pemesan', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('keperluan') ? 'has-error' : '' ?>">
            <label for="keperluan" class="col-sm-4 control-label">Keperluan <span class="text-red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="keperluan" value="<?= set_value('keperluan'); ?>" />
              <?= form_error('keperluan', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('asalsekolah') ? 'has-error' : '' ?>">
            <label for="asalsekolah" class="col-sm-4 control-label">asalsekolah <span class="text-red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="asalsekolah" value="<?php echo set_value('asalsekolah','SMA'); ?>" />
              <?= form_error('asalsekolah', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <input class="btn btn-info" type="submit" name="btn" value="Save">
        <a href="<?= base_url('pemesanan/lapangan'); ?> " class="btn btn-default">Cancel</a>
        &nbsp;&nbsp;
        <a href="<?= base_url('pemesanan/lapangancalendar'); ?> " target="new"class="btn btn-success">Calendar</a>
      </div>
      <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List</h3>
      </div>
      <div class="box-body">

        <div class="table-responsive">
          <table class="table table-hover" id="example2">
            <thead>
              <tr>
                <th>#</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Pemesan</th>
                <th>Keperluan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($pemesanan_lapangan as $dt) : ?>
                <tr>
                  <th><?= $i; ?></th>
                  <td><?= $dt['tglmulai']; ?></td>
                  <td><?= $dt['tglselesai']; ?></td>
                  <td><?= $dt['pemesan']; ?></td>
                  <td><?= $dt['keperluan']; ?></td>

                  <td>
                    <a href="<?= base_url('pemesanan/lapanganhapus/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>&nbsp;&nbsp;
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->