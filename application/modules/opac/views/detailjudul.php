<div class="col-md-12">
<div class="col-md-3">
<div class="c-media c-content-overlay">
<?php if($get_detailbuku['gambarsampul']){ ?>
<img class="c-overlay-object img-responsive" src="<?= base_url('assets/images/buku/'.$get_detailbuku['gambarsampul'])?>" alt="">
<?php }else{ ?>
<img class="c-overlay-object img-responsive" src="<?= base_url('assets/images/buku/tanpasampul.jpg')?>"alt=""> 
<?php } ?>
</div>
</div>
<div class="col-md-9">
<div class="c-body">
<div class="c-title c-font-bold c-font-uppercase">
<a href="#"><?= $get_detailbuku['judul']?></a>
</div>
<div class="c-author">By <span class="c-font-uppercase"><?= $get_detailbuku['pengarang']?></span>				
</div>
</div>
<br>
<i><?= $get_detailbuku['abstrak']?></i>
</div>

<div class="col-md-3">
<div class="c-media c-content-overlay">
</div>
</div>
<!--ketersediaan -->
<div class="col-md-9">
<br>
<div class="c-title c-font-bold c-font-uppercase">
<i class="fa fa-fw fa-check-circle"></i>Ketersediaan
<?php if($get_eksemplar){?>

<?php foreach ($get_eksemplar as $dt) : ?>
<div class="c-panel c-margin-b-30">
    <div class="c-author">
    <div class="col-md-5"><?= $dt['item_kode'] ?></div><div class="col-md-4">
    <?php 
    $statuseksemplar = cek_statuseksemplar($dt['item_kode']); 
    if($statuseksemplar=='0'){
        $status_eksemplar="<font color='red'>DIPINJAM</font>";
    }else{
        $status_eksemplar="<font color='green'>TERSEDIA</font>";
    }    
    $cek_tglkembalieksemplar = cek_tglkembalieksemplar($dt['item_kode']);
    if($cek_tglkembalieksemplar){
    $tanggalindo = gettanggalindo(cek_tglkembalieksemplar($dt['item_kode']));
    }else{
    $tanggalindo ='';   
    }
    ?>
    <?= $status_eksemplar ?>        <?= $tanggalindo ?>
    </div>
    </div>
    </div>
<?php endforeach; ?>
<?php } ?>
</div>
</div>
<div class="col-md-3">
<div class="c-media c-content-overlay">
</div>
</div>
<!--infodetail -->

<div class="col-md-9">
<br>
<div class="c-title c-font-bold c-font-uppercase">
<i class="fa fa-fw fa-check-circle"></i>Informasi Detil
<?php if($get_detailbuku){?>
<div class="c-panel c-margin-b-30">
<div class="c-author">
<div class="col-md-12">
<table class="table">
<tr>
<td>JUDUL</td><td colspan="3"><?= $get_detailbuku['judul']?></td>
</tr>
<tr>
<td>NO.PANGGIL</td><td><?= $get_detailbuku['nopanggil']?></td>
<td>TIPE MEDIA</td><td><?= $get_detailbuku['tipemedia']?></td>
</tr>
<tr>
<td>PENERBIT</td><td><?= $get_detailbuku['penerbit']?></td>
<td>EDISI</td><td><?= $get_detailbuku['edisi']?></td>
</tr>
<tr>
<td>BAHASA</td><td><?= $get_detailbuku['bahasa']?></td>
<td>TOPIK</td><td><?= $get_detailbuku['topik']?></td>
</tr>
<tr>
<td>ISBN/ISNN</td><td><?= $get_detailbuku['isbn']?></td>
<td>PENANGGUNG JAWAB</td><td><?= $get_detailbuku['penanggungjawab']?></td>
</tr>
<tr>
<td>KLASIFIKASI</td><td><?= $get_detailbuku['klasifikasi']?></td>
</tr>
<tr>
<td>TIPE ISI</td><td><?= $get_detailbuku['tipeisi']?></td>
</tr>
<tr>
<td>PDF</td><td><?php if(get_pdfbuku($get_detailbuku['id'])=='1'){?>
<a href="<?= base_url('assets/images/pdf/'.$get_detailbuku['id'].".pdf"); ?> " class="btn btn-success"target="new">Lihat</a>
<?php } ?></td>
</tr>
</table>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>



					