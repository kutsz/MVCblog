
<?php 

$title = "Страница редактирования категорий ";


?>

<?php ob_start(); ?>

<?php foreach ($categories as $categoryItem): ?>
	<p> 
		<a href="/MVCBlog/admin/category/update/<?php echo $categoryItem['id']; ?>">
			<?php echo $categoryItem['title']; ?>
		</a>
	</p>    
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



