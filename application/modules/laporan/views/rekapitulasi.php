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
            <div class="form-group">
                <label for="name">Rekap Berdasar</label>
<select class="form-control"name="groupby">
<option value="klasifikasi"<?= set_select('groupby', 'klasifikasi'); ?>>Klasifikasi</option>
<option value="gmd"<?= set_select('groupby', 'gmd'); ?>>GMD</option>
<option value="bahasa"<?= set_select('groupby', 'bahasa'); ?>>Bahasa</option>
</select>
              </div>
            
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a href="<?= base_url('laporan/rekapitulasi'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <!-- /Filter Laporan -->
          <div class="col-md-12">

<?php if($get_rekapitulasi){?>
  <br>
<table  class="table" id="example1">
<thead>
<tr>
<td width="15%">Klasifikasi</td>
<td width="20%">Judul</td>
<td width="20%">Eksemplar</td>
</tr>
</thead>
<tbody>
<?php foreach ($get_rekapitulasi as $dt) : ?>
<tr>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['jumlahjudul']; ?></td>
<td><?= get_eksemplarbuku_kla($groupby,$dt['kla_id']) ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</tbody>
</table>
<a href="<?php echo site_url('laporan/rekapitulasi_pdf/'.$groupby); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
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