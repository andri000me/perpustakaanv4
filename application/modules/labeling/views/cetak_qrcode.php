<style>
.div1 {
    float: left;
  width: <?= $width_label ?>cm;
  height: <?= $height_label ?>cm;
  border: 1px solid;
  text-align:center;
  margin: <?= $item_margin ?>cm;
}
 </style>
 <?php foreach ($this->cart->contents() as $items): ?>
 <div class="div1">
    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
 <table width="100%"><tr bgcolor="#d6e5fa"><td align="center" colspan="2">    
 <?= $site_title ?></td></tr>
 <tr><td align="center">
<?php
$data = explode(" " , $option_value);?>
<?php $item_kode=(stripslashes($data[0])); ?>
<img src="<?= base_url('assets/images/qrcode/'.$item_kode.'.png') ?>"height="100px">
 </td>
 <td>
<?= $item_kode ?>
 </td>
 </tr></table>
<?php endforeach; ?>
 </div>
 <?php endforeach; ?>