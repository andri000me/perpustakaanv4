<style>
    
body{font-size: 12px;color: black;}
table#tablestd{
	border-width: 1px;
	border-style: solid;
	border-color: #D8D8D8;
	border-collapse: collapse;
	margin: 10px 0px;
}
table#tablestd td{
	padding: 0.5em; 	color: #000;
	vertical-align: top;
	border-width: 0px;
	padding: 4px;
	border: 1px solid #000;
	
}

table#tablemodul1{
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	margin: 10px 0px;
}
table#tablemodul1 td{
	padding:1px 6px 2px 6px;
	border: 1px solid #000; 
	
}

table#tablemodul1 th{
	padding:1px 6px 2px 6px;
	border: 1px solid #000; 
	
}

h1{
	font-size:24px;
}
</style>
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