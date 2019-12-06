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
<b>Daftar denda <?= $start_date; ?>, sampai <?= $end_date; ?></b>
<?php if($get_denda_all){?>
  <br>
<table  id="tablestd">
<thead>
<tr>
<td width="10%">ID Anggota</td>
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