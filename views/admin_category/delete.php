
<?php 

$title = "Страница удаления категории ";

?>

<?php ob_start(); ?>

<p><em>Выберите категорию для удаления</em></p>

<form action="" method="POST">

	<?php foreach ($categories as $categoryItem): ?>

		<p> 
			<input type='radio' name='id' value="<?php echo $categoryItem['id']; ?>"> 
			<?php echo $categoryItem['title']; ?> 
		</p>

	<?php endforeach; ?>
	
	<p>
		<input type="submit" name="submit" id="submit" value="Удалить категорию">  
	</p>

</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



