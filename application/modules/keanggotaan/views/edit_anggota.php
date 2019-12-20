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
<?php
$member_id=$get_anggota['member_id'];
$nama=$get_anggota['nama'];
$gender=$get_anggota['gender'];
$member_type_id=$get_anggota['member_type_id'];
$member_email=$get_anggota['member_email'];
$member_address=$get_anggota['member_address'];
$member_hp=$get_anggota['member_hp'];
$inst_name=$get_anggota['inst_name'];
$member_image=$get_anggota['member_image'];
$is_active=$get_anggota['is_active'];
?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
<a href="<?= base_url('keanggotaan/anggota') ?>" class="btn btn-warning">Daftar Anggota</a>&nbsp;&nbsp;
<a href="<?= base_url('keanggotaan/tambahanggota') ?>" class="btn btn-primary">Tambah Anggota</a>
                </div>
      </div>
      <div class="box-body">
        <div class="row">
        <div class="col-md-12">
            <form action="" method="post"enctype="multipart/form-data">

<div class="form-group row">
<label for="member_id" class="col-sm-2 control-label">ID Anggota*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="member_id" name="member_id" value="<?= set_value('member_id', isset($member_id) ? $member_id : ''); ?>">
<?= form_error('member_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="nama" class="col-sm-2 control-label">Nama*</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama', isset($nama) ? $nama : ''); ?>">
<?= form_error('nama', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="member_type_id" class="col-sm-2 control-label">Tipe Keanggotaan*</label>
<div class="col-sm-8">
<select class="js-example-basic-single" name="member_type_id" style="width:80%;">
<?php foreach ($list_member_type as $dt) : ?>
<option value="<?= $dt['id']; ?>" <?= set_select('member_type_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $member_type_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
<?php endforeach; ?>
</select>
<?= form_error('member_type_id', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="member_type_id" class="col-sm-2 control-label">Email</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="member_email" name="member_email" value="<?= set_value('member_email', isset($member_email) ? $member_email : ''); ?>">
<?= form_error('member_email', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="lokasirak" class="col-sm-2 control-label">Jenis Kelamin</label>
<div class="col-sm-8">
<input type="radio" name="gender" value="1" <?= set_value('gender', $gender == 1 ? "checked" : ""); 
?> /> Laki-Laki<br>
<input type="radio" name="gender" value="2" <?= set_value('gender', $gender == 2 ? "checked" : ""); 
?>> Perempuan<br>
<?= form_error('gender', '<span class="help-block">', '</small>'); ?>
</div>
</div> 

<div class="form-group row">
<label for="member_type_id" class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="member_address" name="member_address" value="<?= set_value('member_address', isset($member_address) ? $member_address : ''); ?>">
<?= form_error('member_address', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="member_type_id" class="col-sm-2 control-label">HP/WA</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="member_hp" name="member_hp" value="<?= set_value('member_hp', isset($member_hp) ? $member_hp : ''); ?>">
<?= form_error('member_hp', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="member_type_id" class="col-sm-2 control-label">Institusi</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="inst_name" name="inst_name" value="<?= set_value('inst_name', isset($inst_name) ? $inst_name : ''); ?>">
<?= form_error('inst_name', '<span class="help-block">', '</small>'); ?>
</div>
</div>

<div class="form-group row">
<label for="member_type_id" class="col-sm-2 control-label">Kata Sandi</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="mpassword" name="mpassword" value="<?= set_value('mpassword', isset($mpassword) ? $mpassword : ''); ?>">
<?= form_error('mpassword', '<span class="help-block">', '</small>'); ?>
</div>
</div>
<div class="form-group row">
<label for="member_type_id" class="col-sm-2 control-label"></label>
<div class="col-sm-8">
<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?= $is_active == '1' ? 'checked' : ''; ?>> Active?    
            </div>
          </div>
<div class="form-group row">
<label for="abstrak" class="col-sm-2 control-label">Foto Anggota</label>
<div class="col-sm-8">
<?php if($member_image){?>
<a href="<?= base_url('assets/images/member/').$member_image?>"target="new"><?= $member_image?></a>
&nbsp;
<a href="<?= base_url('keanggotaan/hapus_gambarmember/' . $get_anggota['id']); ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">[ 
<i class="fa fa-trash" aria-hidden="true"></i>
Hapus ]</a>
<?php } ?>
<input type="file" class="custom-file-input" id="image" name="image">
</div>
</div>

<div class="form-group row">
<label for="pengarang_id" class="col-sm-2 control-label"> </label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= base_url('keanggotaan/tambahanggota'); ?> " class="btn btn-default">Cancel</a>
</div>
</div>
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