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
<b>Daftar rekapitulasi berdasarkan:<?= $groupby ?> </b>
<?php if($get_rekapitulasi){?>
  <br>
<table  id="tablestd">
<tr>
<td width="15%">Klasifikasi</td>
<td width="20%">Judul</td>
<td width="20%">Eksemplar</td>
</tr>
<?php foreach ($get_rekapitulasi as $dt) : ?>
<tr>
<td><?= $dt['nama']; ?></td>
<td><?= $dt['jumlahjudul']; ?></td>
<td><?= get_eksemplarbuku_kla($groupby,$dt['kla_id']) ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table><?php }?>
