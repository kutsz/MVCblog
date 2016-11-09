
<?php  $title = "Страница редактирования заметки ";?>

<?php ob_start(); ?>

<h3>Редактирование заметки</h3>

<form action='' method='POST'>

	<p>Выберети категорию для заметки<br>

		<select name='cat' size="<?php echo $GLOBALS["amountCategories"]; ?>" >

            <?php foreach ($categories as $categoryItem): ?>

				<option value="<?php echo $categoryItem['id']; ?>"
					class ="<?php if($note['cat']==$categoryItem['id']) echo 'active';?>">
					<?php echo $categoryItem['title']; ?>
				</option>

            <?php endforeach; ?>

		</select>

	 </p>

    <p>
		Введите название заметки <br>
		<input  value="<?php echo $note['title']; ?>" type="text" name="title" id="title"> 
	</p>

	<p>
		Введите краткое описание заметки <br>
		<input value="<?php echo $note['meta_d']; ?>" type="text" name="meta_d" id="meta_d"> 
	</p>

	<p>
		Введите ключевые слова для заметки <br>
		<input value="<?php echo $note['meta_k']; ?>" type="text" name="meta_k" id="meta_k"> 
	</p>

	<p>
		Введите дату добавления заметки в формате хх-хх-хххх день-месяц-год <br>
		<input value="<?php echo $note['date']; ?>" type="date" name="date" id="date"> 
	</p>

	<p>
		Введите краткое описание заметки (с тэгами абзацев)<br>
		<textarea name = "description" id="description" rows = "10" cols = "40">
		<?php echo $note['description']; ?> </textarea> 
	</p>

	<p>
		Введите текст заметки (с тэгами абзацев) <br>
		<textarea  name = "text" id="text" rows = "15" cols = "70"> 
		<?php echo $note['text']; ?> </textarea> 
	</p>

	<p>
		Введите автора заметки <br>
		<input value="<?php echo $note['author']; ?>" type="text" name="author" id="author"> 
	</p>

	<p>
		Введите где лежит миниатюра <br>
		<input value="<?php echo $note['mini_img']; ?>" type="text" name="img" id="img"> 
	</p>

	<p>
		<input value="<?php echo $note['id']; ?>" type="hidden" name="id"> 
	</p>

	<p>
		<input type="submit" name="submit" id="submit" value="Сохранить изменения">  
	</p>

</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



