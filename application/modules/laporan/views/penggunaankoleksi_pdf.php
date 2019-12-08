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
<b>Penggunaan Koleksi Tahun: <?= $tahun ?></b>
<?php if($get_penggunaankoleksi){?>
  <br>
<table id="tablestd">
<tr>
<td>Kode Eksemplar</td>
<td>Judul</td>
<td>JAN</td>
<td>FEB</td>
<td>MAR</td>
<td>APR</td>
<td>MEI</td>
<td>JUN</td>
<td>JUL</td>
<td>AGU</td>
<td>SEP</td>
<td>OKT</td>
<td>NOP</td>
<td>DES</td>
</tr>
  <?php foreach ($get_penggunaankoleksi as $dt) : ?>
<tr>
<td><?= $dt['item_kode']; ?></td>
<td><?= $dt['judul']; ?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'01')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'02')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'03')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'04')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'05')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'06')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'07')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'08')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'09')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'10')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'11')?></td>
<td><?= get_penggunaankoleksi($dt['item_kode'],$tahun,'12')?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
<?php }?>
