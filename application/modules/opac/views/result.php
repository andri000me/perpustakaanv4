<?php if($get_numbukuall>'0') {?>
<?php foreach ($get_bukuall as $dt) : ?>
<div class="col-md-4">
<div class="c-content-blog-post-card-1 c-option-2 c-bordered">
<div class="c-media c-content-overlay">

<img class="c-overlay-object img-responsive" src="<?= base_url('assets/images/buku/'.$dt['gambarsampul'])?>" alt="">
</div>
<div class="c-body">
<div class="c-title c-font-bold c-font-uppercase">
<a href="#"><?= $dt['judul']?></a>
</div>
<div class="c-author">By <span class="c-font-uppercase"><?= $dt['pengarang']?></span>									
</div>
<div class="c-panel">
<ul class="c-tags c-theme-ul-bg">
<li><a href="<?= base_url('opac/detailjudul/'.$dt['id']) ?>"class="btn c-theme-btn">Detail</a>
</li>
</ul>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
<?php } ?>

					