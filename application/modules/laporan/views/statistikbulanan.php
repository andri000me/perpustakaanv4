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
              <div class="form-group <?php echo form_error('tahun') ? 'has-error' : '' ?>">
                <label for="judul">Tahun*</label>
                <input class="form-control" type="number" name="tahun" value="<?= set_value('tahun', isset($tahun) ? $tahun : '') ?>" />
              </div> 
<div class="form-group <?php echo form_error('bulan') ? 'has-error' : '' ?>">
<label for="bulan">Bulan*</label>              
<select class="form-control" name="bulan">
<?php foreach ($listbulan as $dt) : ?>
<option value="<?= $dt['urut']; ?>" <?= set_select('bulan', $dt['urut'], FALSE); ?> <?= $dt['urut'] == $bulan ? ' selected="selected"' : ''; ?>><?= $dt['namashort']; ?></option>
<?php endforeach; ?>
</select>     
</div>       
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a href="<?= base_url('laporan/statistikbulanan'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <!-- /Filter Laporan -->
          <div class="col-md-12">

  <h4>Statistik pengunjung Bulan <?= getnamabulanshort($bulan) ?>,Tahun <?= $tahun ?></h4>

<?= draw_calendar_pengunjung($bulan,$tahun); ?> 
<a href="<?php echo site_url('laporan/statistikbulanan_pdf/'.$bulan.'/'.$tahun); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>

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