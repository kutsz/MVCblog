
<?php



// include_once ROOT.'/models/Category.php';
// include_once ROOT.'/models/Friend.php';
// include_once ROOT.'/models/Data.php';


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
<p> <a href="/MVCBlog/category/<?php echo $categoryItem['id']; ?>"
    class ="<?php if($category_id==$categoryItem['id']) echo 'active';?>"
    >
<?php echo $categoryItem['title']; ?>
</a> </p>    
<?php endforeach; ?>


<!-- 		<?php
 // include'blocks/bd.php'; // Соединяемся с базой
 // $query = "SELECT * FROM categories";
 // $result1 = mysqli_query($db,$query ); 

 // if(!$result1){
 // 	echo "<p>Запрос на выборку данных из базы не прошел.</p>";
 // 	exit(mysqli_error($db));
 	
 	
 // }

 // $count1 = mysqli_num_rows($result1);
 // if($count1 > 0){

 // 	while($myrow1 = mysqli_fetch_array($result1)){

 // 		printf("<p> <a href='view_cat.php?cat=%d'>%s</a> </p>",$myrow1['id'],$myrow1['title']);
 // 	}



 // }
 // else {
 // 	echo "<p>Информация по запросу не может быть извлечена , в таблице нет записей.</p>";
 // 	exit();
 // }

 ?> 
................................................................................ -->
  <p class="titl">Последние заметки</p>

  <?php foreach ($notes as $noteItem): ?>
<p> <a href="/MVCBlog/note/<?php echo $noteItem['id']; ?>"
class ="<?php if($note_id==$noteItem['id']) echo 'active';?>"
>
<?php echo $noteItem['title']; ?>
</a> </p>    
<?php endforeach; ?>

 <!--<?php 

 // $query4 = "SELECT id,title FROM data ORDER BY date DESC,id DESC LIMIT 5";
 // $result4 = mysqli_query($db,$query4 ); 


 // if(!$result4){
 // 	echo "<p>Запрос на выборку данных из базы не прошел.</p>";
 // 	exit(mysqli_error($db));


 // }

 // $count4 = mysqli_num_rows($result4);

 // if($count4 > 0)
 // {

 // 	while($myrow4 = mysqli_fetch_array($result4)){

 // 		printf("<p> <a href='view_post.php?id=%d'>%s</a> </p>",
 // 			$myrow4['id'] ,$myrow4['title']);
 // 	}
 // }
 // else {
 // 	echo "<p>Информация по запросу не может быть извлечена , в таблице нет записей.</p>";
 // 	exit();
 // }

 ?> .............................................................-->

 
 <p class="titl">Архив</p>

   <?php foreach ($archive as $archiveItem): ?>
<p> <a href="/MVCBlog/archive/<?php echo $archiveItem['month']; ?>"
class ="<?php if($dateArchive==$archiveItem['month']) echo 'active';?>"
>
<?php echo $archiveItem['month']; ?>
</a> </p>    
<?php endforeach; ?>

 <!--<?php 

 // $query5 = "SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC";
 // $result5 = mysqli_query($db,$query5 ); 


 // if(!$result5){
 // 	echo "<p>Запрос на выборку данных из базы не прошел.</p>";
 // 	exit(mysqli_error($db));


 // }

 // $count5 = mysqli_num_rows($result5);

 // if($count5 > 0)
 // {

 // 	while($myrow5 = mysqli_fetch_array($result5)){

 // 		printf("<p> <a href='view_date.php?date=%s'>%s</a> </p>",
 // 			$myrow5['month'] ,$myrow5['month']);
 // 	}
 // }
 // else {
 // 	echo "<p>Информация по запросу не может быть извлечена , в таблице нет записей.</p>";
 // 	exit();
 // }

 ?> ............................................................-->
 <p class="titl">Друзья</p>

    <?php foreach ($friend as $friendItem): ?>
<p> <a href="<?php echo $friendItem['link'];?>" target='_blank' class="friend">
<?php echo $friendItem['title']; ?>
</a> </p>    
<?php endforeach; ?>

 <!--<?php 

 // $query6 = "SELECT link,title FROM friends";
 // $result6 = mysqli_query($db,$query6 ); 


 // if(!$result6){
 // 	echo "<p>Запрос на выборку данных из базы не прошел.</p>";
 // 	exit(mysqli_error($db));


 // }

 // $count6 = mysqli_num_rows($result6);

 // if($count6 > 0)
 // {

 // 	while($myrow6 = mysqli_fetch_array($result6)){

 // 		printf("<p> <a href='%s' target='_blank'>%s</a> </p>",
 // 			$myrow6['link'],$myrow6['title']);
 // 	}
 // }
 // else {
 // 	echo "<p>Информация по запросу не может быть извлечена , в таблице нет записей.</p>";
 // 	exit();
 // }

 ?> ........................................-->

 <p class="titl">Поиск</p>
 <form action="search.php" method="POST" name="form_s">
 	<p id="srch">Поисковый запрос должен быть не менее 4-х символов</p>
 	<input name="search" type="text" size="25" maxlength="40">
 	<br>
 	 <input name="submit_s" type="submit" value="Искать">


 </form>



</aside>