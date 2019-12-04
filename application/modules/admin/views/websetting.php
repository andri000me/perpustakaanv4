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

        <form class="form-horizontal" method="post" action="<?= base_url('admin/websetting'); ?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Site Title</label>
              <div class="col-sm-10">
                <input type="text" name="option[site_title]" value="<?= options('site_title') == '' ? set_value('site_title') : options('site_title'); ?>" class="form-control" placeholder="From Email Address">
                <?= form_error('site_title', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group <?= form_error('site_description') ? 'has-error' : '' ?>">
              <label for="varchar" class="col-sm-2 control-label">Site Description</label>
              <div class="col-sm-10">
                <textarea name="option[site_description]" cols="30" rows="3" class="form-control" placeholder="Site Description"><?= options('site_description') == '' ? set_value('site_description') : options('site_description'); ?></textarea>
                <?= form_error('site_description', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group <?= form_error('site_keyword') ? 'has-error' : '' ?>">
              <label for="varchar" class="col-sm-2 control-label">Site Keyword</label>
              <div class="col-sm-10">
                <textarea name="option[site_keyword]" cols="30" rows="3" class="form-control" placeholder="Site Keyword"><?= options('site_keyword') == '' ? set_value('site_keyword') : options('site_keyword'); ?></textarea>
                <?= form_error('site_keyword', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
          </div>
        </form>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->