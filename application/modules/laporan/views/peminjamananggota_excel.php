<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=peminjamananggota_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<b>Peminjaman Anggota</b>
<br>
<?php if($get_peminjamananggota_all){?>
  <br>
<table id="tablestd">
<tr>
<td width="10%">ID Anggota</td>
<td width="15%">Nama Anggota</td>
<td width="15%">Kode Eksemplar</td>
<td>Judul</td>
<td width="15%">Tanggal Pinjam</td>
<td width="15%">Tanggal Harus Kembali</td>
</tr>
  <?php foreach ($get_peminjamananggota_all as $dt) : ?>

<tr>
<td><?= $dt['member_id']; ?></td>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['item_kode']; ?></td>
<td><?= $dt['judul']; ?></td>
<td><?= $dt['loan_date']; ?></td>
<td><?= $dt['due_date']; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
<?php } ?>