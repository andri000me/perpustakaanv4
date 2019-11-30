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
</div>
          </div>
        </div>
      </div>


      <div class="row">
          <div class="col-md-12">
          <div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"class="active">
        <a href="#peminjaman" aria-controls="home" role="tab" data-toggle="tab">Peminjaman</a></li>
    <li role="presentation">
        <a href="#pinjamansaatini" aria-controls="profile" role="tab" data-toggle="tab">Pinjaman Saat Ini</a>
    </li>
  </ul>

  <!-- Tab panes -->
<div class="tab-content">
  <!-- Tab panes 1-->
<div role="tabpanel" class="tab-pane active" id="peminjaman">
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
    <div role="tabpanel" class="tab-pane" id="pinjamansaatini">
    <div class="box">
    <?php if($getloan){?>
          <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>Kembali</th>
                    <th>Perpanjang</th>
                    <th>Kode Eksemplar</th>
                    <th>Judul</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($getloan as $dt) : ?>
                    <tr>
                      <td><?= $dt['item_kode']; ?></td>
                      <td><?= $dt['item_kode']; ?></td>
                      <td><?= $dt['item_kode']; ?></td>
                      <td><?= $dt['judul']; ?></td>
                      <td><?= $dt['loan_date']; ?></td>
                      <td><?= $dt['due_date']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
                  <?php }?>          

    </div>
    
    </div>
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