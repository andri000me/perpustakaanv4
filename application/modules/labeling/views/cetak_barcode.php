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
 <table width="100%"><tr bgcolor="#d6e5fa"><td align="center">    
 <?= $site_title ?></td></tr>
 <tr><td align="center">
 <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
<?php
$data = explode(" " , $option_value);?>
<?= bar128(stripslashes($data[0])); ?>
<?php endforeach; ?>
 </td></tr></table>
 </div>
 <?php endforeach; ?>