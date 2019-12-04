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
<a href="<?= base_url('keanggotaan/tipeanggota') ?>" class="btn btn-warning">Daftar Tipe Anggota</a>&nbsp;&nbsp;
<a href="<?= base_url('keanggotaan/tambahtipeanggota') ?>" class="btn btn-primary">Tambah Tipe Anggota</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?= base_url('keanggotaan/hapus_tipeanggota') ?>" method="post">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>Tipe Keanggotaan</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Lama Pinjaman(Hari)</th>
                    <th>Kali Perpanjangan</th>
                    <th>Last Update</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($tipeanggota as $dt) : ?>
                    <tr>
                      <td><?= $dt['nama']; ?></td>
                      <td><?= $dt['loan_limit']; ?></td>
                      <td><?= $dt['loan_periode']; ?></td>
                      <td><?= $dt['reborrow_limit']; ?></td>
                      <td><?= $dt['last_update']; ?></td>
                      <td><a href="<?= base_url('keanggotaan/edit_tipeanggota/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a></td>
                      <td><input name="check[]" type="checkbox" value="<?= $dt['id'] ?>"></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <input type="submit" value="Hapus Data Terpilih" name="submit"class="btn btn-success"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');" >&nbsp;<a href="#" onclick="chunchall(this);return false"class="btn btn-warning">Check all</a>
            </form>
              
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