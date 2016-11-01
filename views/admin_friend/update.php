
<?php 

$title = "Страница редактирования сайта-друга ";


?>

<?php ob_start(); ?>




<h3>Редактирование сайта-друга</h3>

<form action='' method='POST'>

	<p>
		Введите название сайта-друга <br>
		<input  value="<?php echo $friend['title']; ?>" type="text" name="title" id="title"> 
	</p>

	<p>
		Введите ссылку на сайт друга <br>
		<input value="<?= $friend['link'] ?>" type="text" name="link" id="link"> 
	</p>

	<p>
		<input value="<?php echo $friend['id']; ?>" type="hidden" name="id"> 
	</p>

	<p>
		<input type="submit" name="submit" id="submit" value="Сохранить изменения">  
	</p>



</form>



<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



