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
        <div class="box-tools">

                </div>
      </div>

      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
          <div class="col-sm-3">
<form action="<?= base_url('perpustakaan/selesaitransaksi'); ?>" method="post"enctype="multipart/form-data">          
<button type="submit" class="btn btn-success"><br>Selesai Transaksi<br><br></button>
</form>
</div>          
<div class="col-sm-3">
Nama Anggota<br>
<?= $getanggota['nama'] ?>
</div>
<div class="col-sm-3">
Kode Anggota<br>
<?= $getanggota['member_id'] ?>
</div>
<div class="col-sm-3">
Keanggotaan<br>
<?= $getanggota['tipeanggota'] ?>
</div>
<div class="col-sm-3">
Maksimal Peminjaman<br>
<?= $loan_limit ?>
</div>
<div class="col-sm-3">
Lama Peminjaman<br>
<?= $loan_periode ?>
</div>
<div class="col-sm-3">
Denda per Hari<br>
<?= $fine_each_day ?>
</div>
</div>
          </div>
        </div>
      </div>


      <div class="row">
          <div class="col-md-12">
          <div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
        <a href="#peminjaman" aria-controls="home" role="tab" data-toggle="tab">PEMINJAMAN</a></li>
    <li role="presentation"class="active">
        <a href="#pinjamansaatini" aria-controls="profile" role="tab" data-toggle="tab">PINJAMAN SAAT INI</a>
    </li>
    <li role="presentation">
        <a href="#sejarahpeminjaman" aria-controls="profile" role="tab" data-toggle="tab">SEJARAH PEMINJAMAN</a>
    </li>
    <li role="presentation">
        <a href="#denda" aria-controls="profile" role="tab" data-toggle="tab">DENDA</a>
    </li>
  </ul>

  <!-- Tab panes -->
<div class="tab-content">
  <!-- Tab panes 1-->
<div role="tabpanel" class="tab-pane" id="peminjaman">
<div class="box">
<form action="<?= base_url('perpustakaan/tambahitem'); ?>" method="post"enctype="multipart/form-data">    
<table class="table table-striped"><tr><td>
Masukkan Kode Eksemplar/Barkod :</td><td>
<input type="text" class="form-control" id="item_kode" name="item_kode" value="<?= set_value('item_kode', isset($item_kode) ? $item_kode : ''); ?>">
<?= form_error('item_kode', '<span class="help-block">', '</small>'); ?>
</td><td>
<button type="submit" class="btn btn-warning">Pinjam</button>
</td></tr></table>
</form>
<!-- Cart -->
<?php if($jumlahitemcart){?>
<table class="table" border="0">
<tr>
        <th>HAPUS</th>
        <th>KODE</th>
        <th>JUDUL</th>
        <th>TANGGAL PINJAM</th>
        <th>TANGGAL KEMBALI</th>
</tr>
<?php $i = 1; ?>
<?php foreach ($this->cart->contents() as $items): ?>
<?= form_hidden($i.'[rowid]', $items['rowid']); ?>
<tr>
<td align="center">
<a href="<?= base_url('perpustakaan/hapusitem/'.$items['rowid']); ?>">
<i class="fa fa-trash-o"></i>
</a>
</td>
<td>
<?= $items['id']; ?>
</td>
<td>
<?= $items['name']; ?>
</td>
<td>
<?= $items['options']['loan_date']; ?>
</td>
<td>
<?= $items['options']['due_date']; ?>
</td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
<?php }?>
<!-- end cart -->
</div>
</div>

  <!-- Tab panes 2-->
    <div role="tabpanel" class="tab-pane active" id="pinjamansaatini">
    <div class="box">
    <?php if($getloan){?>
          <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">Kembali</th>
                    <th width="10%">Perpanjang</th>
                    <th width="10%">Kode Eksemplar</th>
                    <th>Judul</th>
                    <th width="10%">Tanggal Pinjam</th>
                    <th width="10%">Tanggal Kembali</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($getloan as $dt) : ?>
<?php 
$due_date    =new DateTime($dt['due_date']);
$today        =new DateTime();
if($today>$due_date){
$interval = $due_date->diff($today);
$terlambathari=$interval->days;
$dendaperitem= $terlambathari*$fine_each_day;
}else{
  $terlambathari='';
}
?>                    
<tr>
<td align="center">
<a href="<?= base_url('perpustakaan/kembaliitem/'.$dt['id'].'/'.$dendaperitem); ?>"onclick="return confirm('Anda yakin, akan mengembalikan eksemplar ini <?= $dt['item_kode']; ?>');">
<i class="fa fa-arrow-circle-right"></i>
</a>
</td>
<td align="center">
<?php if($dt['renewed']==$reborrow_limit){?>
<a href="<?= base_url('perpustakaan/perpanjangitem/'.$dt['id'].'/'.$dendaperitem); ?>"onclick="return confirm('Anda yakin, akan memperpanjang peminjaman untuk <?= $dt['item_kode']; ?>');">
<i class="fa fa-plus-circle"></i>
</a>
<?php }?>
</td>
<td><?= $dt['item_kode']; ?></td>
<td><?= $dt['judul']; ?><br>
<?php if($terlambathari){ ?>
<font color="red">TERLAMBAT selama <?= $terlambathari ?> hari dengan jumlah denda <?= $dendaperitem ?></font>
<?php $totaldenda += $dendaperitem; ?>
<?php }?>
                    
                    
                    </td>
                      <td><?= $dt['loan_date']; ?></td>
                      <td><?= $dt['due_date']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
<?php if($totaldenda>'0'){ ?>                  
<tr><td colspan="6">
Kirim Pesan mengenai Informasi Keterlambatan dan Denda | 
<font color="red"><b>Total denda <?= $totaldenda ?></b></font> </td></tr>                   
<?php }?>  
                </tbody>
              </table>
                  <?php }?>            
    </div>    
    </div>
  <!-- Tab panes 3-->
  <div role="tabpanel" class="tab-pane" id="sejarahpeminjaman">
  <div class="box">
    <?php if($getloanhistory){?>
          <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">Kode Eksemplar</th>
                    <th>Judul</th>
                    <th width="15%">Tanggal Pinjam</th>
                    <th width="15%">Tanggal diKembalikan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($getloanhistory as $dt) : ?>
                    <tr>
                      <td><?= $dt['item_kode']; ?></td>
                      <td><?= $dt['judul']; ?></td>
                      <td><?= $dt['loan_date']; ?></td>
                      <td>
<?php if($dt['return_date']){?>                        
<?= $dt['return_date']; ?>
<?php }else{?>
<i>Belum ada yang dikembalikan</i>
<?php }?> 
</td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  </tbody>
              </table>
                  <?php }?>   
  </div>
  </div>
  <!-- Tab panes 4-->
<div role="tabpanel" class="tab-pane active" id="denda">
<div class="box">
<?php if($getdenda){?>
          <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">Hapus</th>
                    <th width="10%">Edit</th>
                    <th>Deskripsi/Nama</th>
                    <th width="10%">Tanggal Denda</th>
                    <th width="10%">Debet</th>
                    <th width="10%">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($getdenda as $dt) : ?>
                    <?php if($dt['debet']>$dt['credit']){?>
                    <tr>
                      <td><?= $dt['id']; ?></td>
                      <td><?= $dt['id']; ?></td>
                      <td><?= $dt['description']; ?></td>
                      <td><?= $dt['fines_date']; ?></td>
                      <td><?= $dt['debet']; ?></td>
                      <td><?= $dt['credit']; ?></td>
                    </tr>
                    <?php }?> 
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  </tbody>
              </table>
                  <?php }?> 
</div>
</div>

  <!-- Tab panes 5-->

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