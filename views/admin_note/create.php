
<?php 

$title = "Страница добавления новой заметки ";

?>

<?php ob_start(); ?>

<p>Добавить новую заметку</p>

<form action="" method="POST">

	<p>
		Введите название заметки <br>
		<input type="text" name="title" id="title"> 
	</p>

	<p>
		Введите краткое описание заметки <br>
		<input type="text" name="meta_d" id="meta_d"> 
	</p>

	<p>
		Введите ключевые слова для заметки <br>
		<input type="text" name="meta_k" id="meta_k"> 
	</p>

	<p>
		Введите дату добавления заметки в формате хх-хх-хххх день-месяц-год <br>
		<input type="date" name="date" id="date" value="<?php $date = date("Y-m-d"); echo $date;?>"> 
	</p>

	<p>
		Введите краткое описание заметки (с тэгами абзацев)<br>
		<textarea name = "description" id="description" rows = "10" cols = "40">  </textarea> 
	</p>

	<p>
		Введите текст заметки (с тэгами абзацев) <br>
		<textarea name = "text" id="text" rows = "15" cols = "70">  </textarea> 
	</p>

	<p>
		Введите автора заметки <br>
		<input type="text" name="author" id="author"> 
	</p>

	<p>
		Введите где лежит миниатюра <br>
		<input type="text" name="img" > 
	</p>

	<p>
		Выберети категорию заметки<br>
		<select name= "cat"> 

            <?php foreach ($categories as $categoryItem): ?>

				<option value="<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['title']; ?>
				</option>
				
			<?php endforeach; ?>

		</select> 

	</p>

	<p>              
		<input type="submit" name="submit" id="submit" value="Занести заметку в базу"> 
	</p>


</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



