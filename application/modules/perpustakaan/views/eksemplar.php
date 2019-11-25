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
            <form action="<?= base_url('perpustakaan/hapus_eksemplar') ?>" method="post">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Tipe Koleksi</th>
                    <th>Lokasi</th>
                    <th>Klasifikasi</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($listeksemplar as $dt) : ?>
                    <tr>
                      <td><?= $dt['item_kode']; ?></td>
                      <td><?= $dt['judul']; ?></td>
                      <td><?= $dt['tipe_koleksi']; ?></td>
                      <td><?= $dt['lokasi']; ?></td>
                      <td><?= $dt['nopanggil']; ?></td>
                      <td><a href="<?= base_url('perpustakaan/edit_eksemplar/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a></td>
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