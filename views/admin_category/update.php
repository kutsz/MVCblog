
<?php 

$title = "Страница редактирования категорий ";


?>

<?php ob_start(); ?>




<h3>Редактирование категории</h3>

<form action='' method='POST'>

	<p>
		Введите название категории <br>
		<input  value="<?php echo $category['title']; ?>" type="text" name="title" id="title"> 
	</p>

	<p>
		Введите краткое описание категории <br>
		<input value="<?php echo $category['meta_d']; ?>" type="text" name="meta_d" id="meta_d"> 
	</p>

	<p>
		Введите ключевые слова для категории <br>
		<input value="<?php echo $category['meta_k']; ?>" type="text" name="meta_k" id="meta_k"> 
	</p>


	<p>
		Введите текст категории (с тэгами абзацев) <br>
		<textarea  name = "text" id="text" rows = "15" cols = "70"> 
			<?php echo $category['text']; ?> </textarea> 
		</p>
		<p>
			<input value="<?php echo $category['id']; ?>" type="hidden" name="id"> 
		</p>

		<p>
			<input type="submit" name="submit" id="submit" value="Сохранить изменения">  
		</p>



	</form>

	

	<?php $content = ob_get_clean(); ?>

	<?php include ROOT.'/views/layouts/layout_admin.php';?> 



