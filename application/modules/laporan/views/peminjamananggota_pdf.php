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