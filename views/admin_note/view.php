
<?php 

$title = "Страница редактирования категорий ";


?>

<?php ob_start(); ?>

<?php foreach ($notes as $noteItem): ?>
	<p> 
		<a href="/MVCBlog/admin/note/update/<?php echo $noteItem['id']; ?>">
			<?php echo $noteItem['title']; ?>
		</a>
	</p>    
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



