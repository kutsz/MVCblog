<?php 
include_once ROOT.'/models/Category.php'; 
		$categories = array();
		$categories = Category::getCategoriesList();
?>
<?php foreach ($categorise as $categoryItem): ?>
<p> <a href="/category/<?php echo $categoryItem['id']; ?>">
<?php echo $categoryItem['title']; ?>
</a> </p>    
<?php endforeach; ?>

