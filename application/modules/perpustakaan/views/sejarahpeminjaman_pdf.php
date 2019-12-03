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
<b>Sejarah Peminjaman <?= $start_date; ?>, sampai <?= $end_date; ?></b>
<?php if($get_peminjaman_all){?>
  <br>
<table id="tablestd">
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