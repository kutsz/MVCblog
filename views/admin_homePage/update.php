
<?php 

$title = "Страница изменения текстов";

?>

<?php ob_start(); ?>

<h3>Страница изменения текстов</h3>

<form action="" method="POST">

	<p>
		Введите название страницы (тэг title)<br>
		<input  value="<?= $homePage['title'] ?>" type="text" name="title" id="title"> 
	</p>

	<p>
		Введите краткое описание страницы <br>
		<input value="<?= $homePage['meta_d'] ?>" type="text" name="meta_d" id="meta_d"> 
	</p>

	<p>
		Введите ключевые слова для страницы <br>
		<input value="<?= $homePage['meta_k'] ?>" type="text" name="meta_k" id="meta_k"> 
	</p>
	
	<p>
		Введите полный текст страницы (с тэгами ) <br>
		<textarea  name = "text" id="text" rows = "15" cols = "70"> 
			<?= $homePage['text'] ?></textarea> 
	</p>

	<p>
		<input value="<?= $homePage['id'] ?>" type="hidden" name="id"> 
	</p>

	<p>
		<input type="submit" name="submit" id="submit" value="Сохранить изменения">  
	</p>

</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



