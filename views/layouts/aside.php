
<?php

$categories = array();
$categories = Category::getCategoriesList();


$notes = array();
$notes = Data::getNotes();

$archive = array();
$archive = Data::getArchive();

$friend = array();
$friend = Friend::getFriend();

?>

<aside>

	<p class="titl">Категории</p>

	<?php foreach ($categories as $categoryItem): ?>
		<p>
		    <a href="/MVCBlog/category/<?php echo $categoryItem['id']; ?>"
			   class ="<?php if($category_id==$categoryItem['id']) echo 'active';?>"
			  ><?php echo $categoryItem['title']; ?>
		    </a> 
		</p>    
	<?php endforeach; ?>



	<p class="titl">Последние заметки</p>

	<?php foreach ($notes as $noteItem): ?>
		<p>  
		    <a href="/MVCBlog/note/<?php echo $noteItem['id']; ?>"
			   class ="<?php if($note_id==$noteItem['id']) echo 'active';?>"
			  ><?php echo $noteItem['title']; ?>
		    </a> 
		</p>    
	<?php endforeach; ?>



	<p class="titl">Архив</p>

	<?php foreach ($archive as $archiveItem): ?>
		<p> 
		    <a href="/MVCBlog/archive/<?php echo $archiveItem['month']; ?>"
			  class ="<?php if($dateArchive==$archiveItem['month']) echo 'active';?>"
			  ><?php echo $archiveItem['month']; ?>
		    </a> 
		 </p>    
	<?php endforeach; ?>


	<p class="titl">Друзья</p>

	<?php foreach ($friend as $friendItem): ?>
		<p> 
		    <a href="<?php echo $friendItem['link'];?>" target='_blank' class="friend">
			   <?php echo $friendItem['title']; ?>
		    </a> 
		</p>    
	<?php endforeach; ?>


	<p class="titl">Поиск</p>

	<form action="search.php" method="POST" name="form_s">
	
		<p id="srch">Поисковый запрос должен быть не менее 4-х символов</p>
		<input name="search" type="text" size="25" maxlength="40">
		<br>
		<input name="submit_s" type="submit" value="Искать">

    </form>

</aside>