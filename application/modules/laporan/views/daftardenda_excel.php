<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=daftardenda_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<b>Daftar denda <?= $start_date; ?>, sampai <?= $end_date; ?></b>
<?php if($get_denda_all){?>
  <br>
<table  id="tablestd">
<thead>
<tr><td width="10%">ID Anggota</td>
<td width="15%">Nama Anggota</td>
<td>Deskripsi</td>
<td width="10%">Debet/Denda</td>
<td width="10%">Kredit/Bayar</td>
<td width="10%">Kewajiban</td>
<td width="10%">Tanggal Denda</td>
</tr>
</thead>
<tbody>
  <?php foreach ($get_denda_all as $dt) : ?>
    <?php
  $kewajiban = $dt['debet']-$dt['credit']; 
  $totdebet += $dt['debet'];	
  $totcredit += $dt['credit'];	
  $totkewajiban += $kewajiban;	
  ?>
<tr>
<td><?= $dt['member_id']; ?></td>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['description']; ?></td>
<td><?= nominal($dt['debet']); ?><br>
<td><?= nominal($dt['credit']); ?></td>
<td><?= nominal($kewajiban); ?></td>
<td><?= $dt['fines_date']; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
<tr>
<td></td>
<td></td>
<td>Total</td>
<td><?= nominal($totdebet) ?></td>
<td><?= nominal($totcredit) ?></td>
<td><?= nominal($totkewajiban) ?></td>
<td></td>
</tr>
</tbody>
</table>
<?php }?>