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
        <h3 class="box-title">Pages</h3>
        <div class="box-tools">
          <a href="<?= base_url('page/add'); ?>" class="btn btn-primary btn-sm">Add New</a>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover" id="example1">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($pages as $p) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $p['title']; ?></td>
                  <td><?= $p['slug']; ?></td>
                  <td><abbr title="<?= $p['created_at']; ?>"><?= date('d/m/Y', strtotime($p['created_at'])); ?></abbr></td>
                  <td>
                    <a href="<?= base_url('page/edit/' . $p['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="<?= base_url('page/hapusPages/' . $p['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->