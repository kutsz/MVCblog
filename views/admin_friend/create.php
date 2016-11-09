
<?php  $title = "Страница добавления новой сайта-друга"; ?>

<?php ob_start(); ?>

<p>Страница добавления сайта-друга</p>

<form action="" method="POST">

	<p>
		Введите название сайта-друга <br>
		<input type="text" name="title" id="title"> 
	</p>

	<p>
		Введите ссылку на сайта-друга <br>
		<input type="text" name="link" id="link"> 
	</p>

	<p>              
		<input type="submit" name="submit" id="submit" value="Занести сайт в базу"> 
	</p>

</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



