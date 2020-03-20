<style>
a:link, a:visited {
	width:175px;
    color: white;
    padding: 14px 25px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
	border:1px solid white;
}

a:hover, a:active {
    background-color: white;
	color:black;
}
</style>
<main role="main" class="inner cover mt-auto">
	<h1 class="cover-heading"><?= $title; ?></h1>
	<p class="lead">Sistem Informasi Perpustakaan</p>

		<a href="<?= base_url('opac') ?>">Opac</a>
		<a href="<?= base_url('pengunjung') ?>">Pengunjung</a>
		<a href="<?= base_url('loginperpustakaan') ?>">User</a>

</main>
