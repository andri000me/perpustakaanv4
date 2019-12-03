<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=sejarahpeminjaman_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<b>Sejarah Peminjaman <?= $start_date; ?>, sampai <?= $end_date; ?></b>
<?php if($get_peminjaman_all){?>
  <br>
<table>
<tr>
<td>ID Anggota</td>
<td>Nama Anggota</td>
<td>Kode Eksemplar</td>
<td>Judul</td>
<td>Tanggal Pinjam</td>
<td>Tanggal Harus Kembali</td>
<td>Status Peminjaman</td>
</tr>
  <?php foreach ($get_peminjaman_all as $dt) : ?>
<?php 

if($dt['is_return']=='0'){
$statuspinjam='Sedang dipinjam';
}else{
$statuspinjam='Telah Kembali';
}
?>
<tr>
<td><?= $dt['member_id']; ?></td>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['item_kode']; ?></td>
<td><?= $dt['judul']; ?></td>
<td><?= $dt['loan_date']; ?></td>
<td><?= $dt['due_date']; ?></td>
<td><?= $statuspinjam; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
<?php }?>