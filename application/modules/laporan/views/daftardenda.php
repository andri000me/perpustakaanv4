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
              <div class="form-group <?php echo form_error('member_id') ? 'has-error' : '' ?>">
                <label for="name">ID Anggota</label>
                <input class="form-control" type="text" name="member_id" value="<?= set_value('member_id', isset($member_id) ? $member_id : ''); ?>" />
              </div>      
              <div class="form-group <?php echo form_error('start_date') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Denda Sejak</label>
                <input class="form-control" type="text" id="tanggalawal" name="start_date" value="<?= set_value('start_date', isset($start_date) ? $start_date : $tanggalawal); ?>" />
              </div>
              <div class="form-group <?php echo form_error('end_date') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Denda Hingga</label>
                <input class="form-control" type="text" id="tanggalakhir" name="end_date" value="<?= set_value('end_date', isset($end_date) ? $end_date : $tanggalakhir); ?>" />
              </div>
            
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a href="<?= base_url('laporan/daftardenda'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <!-- /Filter Laporan -->
          <div class="col-md-12">
<?php if($get_denda_all){?>
  <br>
<table  class="table" id="example1">
<thead>
<tr>
<td width="10%">ID Anggota</td>
<td width="15%">Nama Anggota</td>
<td>Deskripsi</td>
<td width="10%">Debet/Denda</td>
<td width="10%">Kredit/Bayar</td>
<td width="10%">Kewajiban</td>
<td width="10%">Tanggal Denda</td>
</tr>
</thead>
<tbody>
  <?php foreach ($get_denda_all as $dt) : ?>
  <?php
  $kewajiban = $dt['debet']-$dt['credit'] ?>
<tr>
<td><?= $dt['member_id']; ?></td>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['description']; ?></td>
<td><?= $dt['debet']; ?><br>
<td><?= $dt['credit']; ?></td>
<td><?= $kewajiban; ?></td>
<td><?= $dt['fines_date']; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</tbody>
</table>
<a href="<?php echo site_url('laporan/daftardenda_pdf/'.$start_date.'/'.$end_date.'/'.$member_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('laporan/daftardenda_excel/'.$start_date.'/'.$end_date.'/'.$member_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
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