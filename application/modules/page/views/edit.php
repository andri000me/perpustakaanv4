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
      <li><a href="<?php base_url('page') ?>">Pages</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>

        <form action="<?php base_url('page/editPages') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Title</label>
            <input class="form-control <?php echo form_error('title') ? 'is-invalid' : '' ?>" type="text" name="title" value="<?= $getpages['title']; ?>" />
            <input type="hidden" name="id" value="<?= $getpages['id']; ?>" />
            <div class="invalid-feedback">
              <?php echo form_error('title') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Content</label>
            <textarea name="content" id="id_textarea" cols="30" rows="10"><?= $getpages['content']; ?></textarea>
            <div class="invalid-feedback">
              <?php echo form_error('content') ?>
            </div>
          </div>

      </div> <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('page'); ?> " class="btn btn-default">Cancel</a>
      </div>
      <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->