
<?php 

$title = "Страница добавления новой заметки ";

?>

<?php ob_start(); ?>

<p>Добавить новую категорию</p>

<form action="" method="POST">

	<p>
		Введите название категории <br>
		<input type="text" name="title" id="title"> 
	</p>

	<p>
		Введите краткое описание категории <br>
		<input type="text" name="meta_d" id="meta_d"> 
	</p>

	<p>
		Введите ключевые слова для категории <br>
		<input type="text" name="meta_k" id="meta_k"> 
	</p>

	<p>
		Введите текст категории (с тэгами абзацев) <br>
		<textarea name = "text" id="text" rows = "15" cols = "70">  </textarea> 
	</p>

	<p>              
		<input type="submit" name="submit" id="submit" value="Занести категорию в базу"> 
	</p>


</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



