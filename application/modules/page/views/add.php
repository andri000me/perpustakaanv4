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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title; ?></h3>
            </div>
            <div class="box-body">

                <?= $this->session->flashdata('message') ?>

                <form action="<?php base_url('page') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="<?= set_value('title'); ?>" class="form-control" placeholder="Title">
                        <span class="help-block">
                            <?php echo form_error('title') ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
                        <label for="name">Content</label>
                        <textarea name="content" id="id_textarea" cols="30" rows="10"><?= set_value('content'); ?></textarea>
                        <span class="help-block">
                            <?php echo form_error('content') ?>
                        </span>
                    </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Publish</button>
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