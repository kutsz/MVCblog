
<?php 
$title = "Страница удаления заметки";
?>

<?php ob_start(); ?>

<p><em>Выберите заметку для удаления</em></p>

<form action="" method="POST">

	<?php foreach ($notes as $noteItem): ?>
		<p> 
			<input type='radio' name='id' value="<?php echo $noteItem['id']; ?>"> 
			<?php echo $noteItem['title']; ?> 
		</p>    
	<?php endforeach; ?>
	<p>
		<input type="submit" name="submit" id="submit" value="Удалить категорию">  
	</p>
	
</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



