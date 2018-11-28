<?php if (! empty($messages)) : ?>
	<div class="alert alert-info" role="alert">
		<ul>
		<?php foreach ($messages as $message) : ?>
			<li><?= esc($message) ?></li>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
