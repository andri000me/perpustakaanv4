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
        <a href="#pinjamansaatini" aria-controls="pinjamansaatini" role="tab" data-toggle="tab">PINJAMAN SAAT INI</a>
    </li>
    <li role="presentation">
        <a href="#sejarahpeminjaman" aria-controls="sejarahpeminjaman" role="tab" data-toggle="tab">SEJARAH PEMINJAMAN</a>
    </li>
    <li role="presentation">
        <a href="#denda" aria-controls="denda" role="tab" data-toggle="tab">DENDA AKTIF</a>
    </li>
    <li role="presentation">
        <a href="#dendalunas" aria-controls="dendalunas" role="tab" data-toggle="tab">DENDA LUNAS</a>
    </li>
    <li role="presentation">
        <a href="#tambahdenda" aria-controls="tambahdenda" role="tab" data-toggle="tab">TAMBAH DENDA</a>
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
<div role="tabpanel" class="tab-pane" id="denda">
<div class="box">
<?php if($getdenda){?>
  <form action="<?= base_url('perpustakaan/hapusdenda') ?>" method="post">
          <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">Edit</th>
                    <th width="10%">Hapus</th>
                    <th>Deskripsi/Nama</th>
                    <th width="10%">Tanggal Denda</th>
                    <th width="10%">Debet</th>
                    <th width="10%">Kredit</th>
                    <th width="10%">Kewajiban</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($getdenda as $dt) : ?>
                    <?php if($dt['sisa']>'0'){?>
                    <tr>
                    <td><a href="<?= base_url('perpustakaan/edit_denda/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a></td>
                      <td><input name="check[]" type="checkbox" value="<?= $dt['id'] ?>"></td>
                      <td><?= $dt['description']; ?></td>
                      <td><?= $dt['fines_date']; ?></td>
                      <td><?= $dt['debet']; ?></td>
                      <td><?= $dt['credit']; ?></td>
                      <td><?= $dt['sisa']; ?></td>
                    </tr>
                    <?php 
                  $totalsisa += $dt['sisa'];
                  }?> 
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  <tr>
                    <td colspan="6"align="right">
                    <font color="red"><b>TOTAL denda yang harus dibayar</b></font></td><td>
                    <font color="red"><b><?= nominal($totalsisa) ?></b></font></td>
                    </td>
                  </tr>                 
                  </tbody>
              </table>
              <input type="submit" value="Hapus Data Terpilih" name="submithapusfines"class="btn btn-success"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');" >&nbsp;<a href="#" onclick="chunchall(this);return false"class="btn btn-warning">Check all</a>
            </form>
                  <?php }?> 
</div>
</div>
  <!-- Tab panes 5-->
  <div role="tabpanel" class="tab-pane" id="dendalunas">
<div class="box">
<?php if($getdenda){?>
  <form action="<?= base_url('perpustakaan/hapusdenda') ?>" method="post">
          <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">Edit</th>
                    <th width="10%">Hapus</th>
                    <th>Deskripsi/Nama</th>
                    <th width="10%">Tanggal Denda</th>
                    <th width="10%">Debet</th>
                    <th width="10%">Kredit</th>
                    <th width="10%">Kewajiban</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($getdenda as $dt) : ?>
                    <?php if($dt['sisa']=='0'){?>
                    <tr>
                    <td><a href="<?= base_url('perpustakaan/edit_denda/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a></td>
                      <td><input name="check[]" type="checkbox" value="<?= $dt['id'] ?>"></td>
                      <td><?= $dt['description']; ?></td>
                      <td><?= $dt['fines_date']; ?></td>
                      <td><?= $dt['debet']; ?></td>
                      <td><?= $dt['credit']; ?></td>
                      <td><?= $dt['sisa']; ?></td>
                    </tr>
                    <?php }?> 
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  </tbody>
              </table>
              <input type="submit" value="Hapus Data Terpilih" name="submithapusfines"class="btn btn-success"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');" >&nbsp;<a href="#" onclick="chunchall(this);return false"class="btn btn-warning">Check all</a>
            </form>
                  <?php }?> 
</div>
</div>

  <!-- Tab panes 6-->
  <div role="tabpanel" class="tab-pane" id="tambahdenda">
<div class="box">
<form action="<?= base_url('perpustakaan/tambahdenda') ?>" method="post"enctype="multipart/form-data">
<table class="table"><tr><td>

<div class="form-group row">
<label for="fines_date" class="col-sm-2 control-label">Tanggal</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="tanggalsaja" name="fines_date" value="<?= set_value('fines_date', isset($fines_date) ? $fines_date : $tanggalskrg); ?>">
<?= form_error('fines_date', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="description" class="col-sm-2 control-label">Deskripsi*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="description" name="description" value="<?= set_value('description', isset($description) ? $description : ''); ?>"required>
<?= form_error('description', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="debet" class="col-sm-2 control-label">Debet*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="debet" name="debet" value="<?= set_value('debet', isset($debet) ? $debet : '0'); ?>"required>
<?= form_error('debet', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="credit" class="col-sm-2 control-label">Credit</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="credit" name="credit" value="<?= set_value('credit', isset($credit) ? $credit : '0'); ?>">
<?= form_error('credit', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label"> </label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= base_url('perpustakaan/transaksi2'); ?> " class="btn btn-default">Cancel</a>
</div>
</div>
</table>
</form>

</div>
</div>

  <!-- Tab panes 6-->
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