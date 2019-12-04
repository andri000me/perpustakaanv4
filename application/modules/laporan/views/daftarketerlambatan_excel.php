<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=daftarketerlambatan_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<b>Daftar keterlambatan <?= $start_date; ?>, sampai <?= $end_date; ?></b>
<?php if($get_keterlambatan_all){?>
  <br>
<table  id="tablestd">
<thead>
<tr>
<td width="10%">ID Anggota</td>
<td width="15%">Nama Anggota</td>
<td width="15%">Kode Eksemplar</td>
<td>Judul</td>
<td width="15%">Terlambat Hari</td>
<td width="15%">Tanggal Pinjam</td>
<td width="15%">Tanggal Harus Kembali</td>
</tr>
</thead>
<tbody>
  <?php foreach ($get_keterlambatan_all as $dt) : ?>
<?php 
if($dt['is_return']=='0'){
if($dt['due_date']<$tanggalsekarang){
/**************************** */
$due_date    =new DateTime($dt['due_date']);
$today        =new DateTime();
if($today>$due_date){
$interval = $due_date->diff($today);
$terlambathari=$interval->days;
}else{
  $terlambathari='';
}
/****************************** */
?>
<tr>
<td><?= $dt['member_id']; ?></td>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['item_kode']; ?></td>
<td><?= $dt['judul']; ?><br>
<td><?= $terlambathari ?></td>
</td>
<td><?= $dt['loan_date']; ?></td>
<td><?= $dt['due_date']; ?></td>
</tr>
<?php } ?>
<?php } ?>
<?php $i++; ?>
<?php endforeach; ?>
</tbody>
</table>
<?php }?>