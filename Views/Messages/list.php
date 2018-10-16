<?php if (! empty($messages)) : ?>
	<?php foreach ($messages as $message) : ?>
		<p><?= esc($message) ?></p>
	<?php endforeach ?>
<?php endif ?>
