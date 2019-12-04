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
<a href="<?= base_url('master/buku') ?>" class="btn btn-warning">Daftar Buku</a>&nbsp;&nbsp;
<a href="<?= base_url('master/tambahbuku') ?>" class="btn btn-primary">Tambah Buku</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?= base_url('master/hapus_buku') ?>" method="post">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>ISBN/ISSN</th>
                    <th>JumlahEksemplar</th>
                    <th>Last Update</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($buku as $dt) : ?>
                    <tr>
                      <td><?= $dt['judul']; ?></td>
                      <td><?= $dt['isbn']; ?></td>
                      <td align="center"><b><?= get_eksemplarbuku($dt['id']) ?></b> <a href="<?= base_url('master/tambaheksemplar/' . $dt['id']); ?>" class="btn btn-success btn-xs"><i class="fa fa-fw fa-plus"></i></a></td>
                      <td><?= $dt['last_update']; ?></td>
                      <td><a href="<?= base_url('master/edit_buku/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a></td>
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