<main role="main" class="inner cover mt-auto">
	<h1 class="cover-heading"><?= $title; ?></h1>
	<p class="lead">Sistem Informasi Perpustakaan</p>
	<p class="lead">
	<div class="col-md-6">
	<?= $this->session->flashdata('message') ?>
	<form method="POST" action="">
	<input class="form-control" type="text" name="member_id" value="<?= set_value('member_id', isset($member_id) ? $member_id : ''); ?>"placeholder="Member ID" autofocus="true"/>
	<?= form_error('member_id', '<span class="help-block">', '</small>'); ?>
	<input type="submit" value="Submit Form" id="submit">
	</form>
	</div>
</main>