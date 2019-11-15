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
          <div class="col-md-4">
            <form action="" method="post">
              <div class="form-group <?php echo form_error('nama') ? 'has-error' : '' ?>">
                <label for="name">Nama*</label>
                <input class="form-control" type="text" name="nama" value="<?= $get_tipekoleksi['nama']; ?>" />
                <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
              </div>     
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('perpustakaan/tipekoleksi'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($tipekoleksi as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['nama']; ?></td>
                      <td>
                        <a href="<?= base_url('perpustakaan/edit_tipekoleksi/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('perpustakaan/hapus_tipekoleksi/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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