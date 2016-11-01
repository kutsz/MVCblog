
<?php $title = "Страница редактирования сайта-друга";?>

<?php ob_start(); ?>

<?php foreach ($friends as $friendItem): ?>
	<p> 
		<a href="/MVCBlog/admin/friend/update/<?php echo $friendItem['id']; ?>">
			<?php echo $friendItem['title']; ?>
		</a>
	</p>    
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout_admin.php';?> 



