
<?php 

$title = "Страница редактирования текстов ";


?>

<?php ob_start(); ?>

<?php foreach ($homePages as $homePageItem): ?>
	<p> 
		<a href="/MVCBlog/admin/homePage/update/<?php echo $homePageItem['id']; ?>">
			<?php echo $homePageItem['title']; ?>
		</a>
	</p>    
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



