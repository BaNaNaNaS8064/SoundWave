<?php
	require_once __DIR__ . '/../Template.php';
	require_once __DIR__ . '/../Xss.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= e($titre) ?></title>
</head>
<body>
	<?php require __DIR__ . '/entete.php'; ?>
	<main>
		<?= $contenu ?>
	</main>
	<?php require __DIR__ . '/pied.php'; ?>
</body>
</html>