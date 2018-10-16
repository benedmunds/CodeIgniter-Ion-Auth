<?php if (! empty($errors)) : ?>
	<?php foreach ($errors as $error) : ?>
		<p><?= esc($error) ?></p>
	<?php endforeach ?>
<?php endif ?>
