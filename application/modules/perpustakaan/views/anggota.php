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
<a href="<?= base_url('perpustakaan/anggota') ?>" class="btn btn-warning">Daftar Anggota</a>&nbsp;&nbsp;
<a href="<?= base_url('perpustakaan/tambahanggota') ?>" class="btn btn-primary">Tambah Anggota</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?= base_url('perpustakaan/hapus_anggota') ?>" method="post">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tipe Keanggotaan</th>
                    <th>HP</th>
                    <th>Last Update</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($anggota as $dt) : ?>
                    <tr>
                      <td><?= $dt['member_id']; ?></td>
                      <td><?= $dt['nama']; ?></td>
                      <td><?= $dt['tipeanggota']; ?></td>
                      <td><?= $dt['member_hp']; ?></td>
                      <td><?= $dt['last_update']; ?></td>
                      <td><a href="<?= base_url('perpustakaan/edit_anggota/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a></td>
                      <td><input name="check[]" type="checkbox" value="<?= $dt['id'] ?>"></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <input type="submit" value="Hapus Data Terpilih" name="submit"class="btn btn-success"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');" >&nbsp;<a href="#" onclick="chunchall(this);return false"class="btn btn-warning">Check all</a>
              &nbsp;&nbsp;
              
              <a href="<?= base_url('perpustakaan/exportanggota_csv'); ?> " class="btn btn-primary">Export CSV</a>
            </form>
          </div>
          <div class="col-md-4">
          <h3 class="box-title">Import Data</h3>
<form method="post" action="<?= base_url('perpustakaan/importanggotacsv'); ?>" enctype ="multipart/form-data"class="form-inline">
<div class="form-group">
<label for="name">Demileter*</label>
<input class="form-control" type="text" name="demileter" value="<?= set_value('demileter', isset($demileter) ? $demileter : ';'); ?>" />
<?= form_error('demileter', '<span class="help-block">', '</small>'); ?>
<input type="file" name="anggotacsv" accept="text/csv" class="form-control"><br>
<input type="submit" name="import" class="btn btn-success" value="Import from CSV" />
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