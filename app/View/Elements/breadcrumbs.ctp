<nav class="breadcrumbs">
<?php foreach ($breadcrumbs as $key => $value): ?>
	<?php if($key == 0): ?>
		<?= $value['name'] ?> <span> > </span>
	<?php else: ?>
		<a href="<?= Configure::read('host') ?><?= $value['link'] ?>" ><?= $value['name'] ?></a> <span> > </span>
		
	<?php endif; ?>
<?php endforeach; ?>
</nav>

