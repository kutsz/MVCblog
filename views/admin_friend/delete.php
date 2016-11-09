
<?php 

$title = "Страница удаления сайта-друга";

?>

<?php ob_start(); ?>

<p><em>Выберите сайт-друг для удаления</em></p>

<form action="" method="POST">

	<?php foreach ($friends as $friendItem): ?>

		<p> 
			<input type='radio' name='id' value="<?php echo $friendItem['id']; ?>"> 
			<?php echo $friendItem['title']; ?> 
		</p>

	<?php endforeach; ?>
	
	<p>
		<input type="submit" name="submit" id="submit" value="Удалить категорию">  
	</p>

</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



