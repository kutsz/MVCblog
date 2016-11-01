<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $settings['meta_d']; ?>">
	<meta name="keywords" content="<?php echo $settings['meta_k']; ?>">
	<title><?php echo $settings['title']; ?></title>
	<link rel="stylesheet" type="text/css" href="template/css/style.css">
</head>
<body>


	<?php  include'template/layouts/header.php';?>
	<?php  include'template/layouts/aside.php';?>



	<main>
		<?php echo $settings['text']; ?>
	</main>

	<?php  include'template/layouts/footer.php';?>
</body>
</html>


----------------

 <?php ob_start() ?>
	<h1><?php echo $post['title'] ?></h1>
	<div class="date"><?php echo $post['meta_d'] ?></div>
	<div class="body">
	  <?php echo $post['text'] ?>
	</div>
 <?php $content = ob_get_clean() ?>

 <?php include 'layout.php' ?>