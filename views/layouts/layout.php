
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<title><?php echo $title; ?></title>
	<link href="/MVCBlog/template/css/style.css" rel="stylesheet" type="text/css">
    <script src="/MVCBlog/template/js/jquery-3.0.0.min.js"></script>	
</head>
<body>


	<?php  include ROOT.'/views/layouts/header.php';?>
	<?php  include ROOT.'/views/layouts/aside.php';?>



	<main>
		<?php echo $content; ?>
	</main>

	<?php  include ROOT.'/views/layouts/footer.php';?>
</body>
</html>

<!--/template/css/style.css -->
