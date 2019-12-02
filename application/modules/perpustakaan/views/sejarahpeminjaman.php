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
              <div class="form-group <?php echo form_error('judul') ? 'has-error' : '' ?>">
                <label for="judul">Judul</label>
                <input class="form-control" type="text" name="judul" value="<?= set_value('judul', isset($judul) ? $judul : ''); ?>" />
              </div>
              <div class="form-group <?php echo form_error('item_kode') ? 'has-error' : '' ?>">
                <label for="name">Kode Eksemplar</label>
                <input class="form-control" type="text" name="item_kode" value="<?= set_value('item_kode', isset($item_kode) ? $item_kode : ''); ?>" />
              </div>      
              <div class="form-group <?php echo form_error('start_date') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Pinjam Sejak</label>
                <input class="form-control" type="text" id="tanggalawal" name="start_date" value="<?= set_value('start_date', isset($start_date) ? $start_date : $tanggalawal); ?>" />
              </div>
              <div class="form-group <?php echo form_error('end_date') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Pinjam Hingga</label>
                <input class="form-control" type="text" id="tanggalakhir" name="end_date" value="<?= set_value('end_date', isset($end_date) ? $end_date : $tanggalakhir); ?>" />
              </div>
              <div class="form-group <?php echo form_error('status_peminjaman') ? 'has-error' : '' ?>">
                <label for="name">Status Peminjaman</label>
<select class="form-control">
<option value="">Semua</option>
<option value="0">Sedang dipinjam</option>
<option value="1">Telah Kembali</option>
</select>
              </div>
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a href="<?= base_url('perpustakaan/sejarahpeminjaman'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <!-- /Filter Laporan -->



        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->