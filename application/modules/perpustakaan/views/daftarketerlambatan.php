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
                <label for="name">Tanggal Pinjam Sejak</label>
                <input class="form-control" type="text" id="tanggalawal" name="start_date" value="<?= set_value('start_date', isset($start_date) ? $start_date : $tanggalawal); ?>" />
              </div>
              <div class="form-group <?php echo form_error('end_date') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Pinjam Hingga</label>
                <input class="form-control" type="text" id="tanggalakhir" name="end_date" value="<?= set_value('end_date', isset($end_date) ? $end_date : $tanggalakhir); ?>" />
              </div>
            
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a href="<?= base_url('perpustakaan/sejarahpeminjaman'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <!-- /Filter Laporan -->
          <div class="col-md-12">
<?php if($get_keterlambatan_all){?>
  <br>
<table  class="table" id="example1">
<thead>
<tr>
<td width="10%">ID Anggota</td>
<td width="15%">Nama Anggota</td>
<td width="15%">Kode Eksemplar</td>
<td>Judul</td>
<td width="15%">Terlambat Hari</td>
<td width="15%">Tanggal Pinjam</td>
<td width="15%">Tanggal Harus Kembali</td>
</tr>
</thead>
<tbody>
  <?php foreach ($get_keterlambatan_all as $dt) : ?>
<?php 
if($dt['is_return']=='0'){
if($dt['due_date']<$tanggalsekarang){
/**************************** */
$due_date    =new DateTime($dt['due_date']);
$today        =new DateTime();
if($today>$due_date){
$interval = $due_date->diff($today);
$terlambathari=$interval->days;
}else{
  $terlambathari='';
}
/****************************** */
?>
<tr>
<td><?= $dt['member_id']; ?></td>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['item_kode']; ?></td>
<td><?= $dt['judul']; ?><br>
<td><?= $terlambathari ?></td>
</td>
<td><?= $dt['loan_date']; ?></td>
<td><?= $dt['due_date']; ?></td>
</tr>
<?php } ?>
<?php } ?>
<?php $i++; ?>
<?php endforeach; ?>
</tbody>
</table>
<a href="<?php echo site_url('perpustakaan/daftarketerlambatan_pdf/'.$start_date.'/'.$end_date.'/'.$member_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('perpustakaan/daftarketerlambatan_excel/'.$start_date.'/'.$end_date.'/'.$member_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
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