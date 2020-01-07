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
<img src="<?= base_url('assets/images/barcode/'.$data[0].'.png') ?>"><br>
<?= $data[0] ?><br>
<?= $data[1] ?><br>
<?= $data[2] ?><br>

<?php endforeach; ?>
 </td></tr></table>
 </div>
 <?php endforeach; ?>