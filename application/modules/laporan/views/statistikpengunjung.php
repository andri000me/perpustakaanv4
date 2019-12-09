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
                <input class="form-control" type="number" name="tahun" value="<?= set_value('tahun', isset($tahun) ? $tahun : date('Y')) ?>" />
              </div>            
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a href="<?= base_url('laporan/statistikpengunjung'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <!-- /Filter Laporan -->
          <div class="col-md-12">
<?php if($get_tipeanggota){?>
  <h4>Statistik pengunjung tahun <?= $tahun ?></h4>
<table  class="table" id="examplenosort">
<thead>
<tr>
<td>Tipe Keanggotaan</td>
<td>JAN</td>
<td>FEB</td>
<td>MAR</td>
<td>APR</td>
<td>MEI</td>
<td>JUN</td>
<td>JUL</td>
<td>AGU</td>
<td>SEP</td>
<td>OKT</td>
<td>NOP</td>
<td>DES</td>
</tr>
</thead>
<tbody>
  <?php foreach ($get_tipeanggota as $dt) : ?>
<tr>
<td><?= $dt['nama']; ?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'01')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'02')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'03')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'04')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'05')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'06')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'07')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'08')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'09')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'10')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'11')?></td>
<td><?= get_statistikpengunjung($dt['id'],$tahun,'12')?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</tbody>
</table>
<a href="<?php echo site_url('laporan/statistikpengunjung_pdf/'.$tahun); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
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