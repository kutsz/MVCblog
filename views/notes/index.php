<?php 

$description = $note['meta_d'];
$keywords = $note['meta_k'];
$title = $note['title']; 

?>

<?php ob_start(); ?>


<p class = 'post_title'><?php echo $note['title']; ?></p>
<p>Автор:<?php echo $note['author']; ?></p>
<p>Дата:<?php echo $note['date']; ?></p>
<?php echo $note['text']; ?>
<p>Просмотров:<?php echo $note['view']; ?></p>


<p class='post_comment'>Комментарии к этой заметке:</p>
<button id="buttonComment">Toggle between hiding and showing the comments</button>

<div id="commentDiv">
	<?php foreach ($comments as $commentsItem): ?>
		<p>Комментарий добавил(а): <?php echo  $commentsItem['author']; ?><br> 
			Дата:<?php echo  $commentsItem['date']; ?>
		</p>
		<p><?php echo  $commentsItem['text']; ?></p>
	<?php endforeach; ?>
</div>
	
<p class="post_add_comment">Добавить Ваш комментарий:</p>

<form action="comment.php" method="POST" name="form_com">

	<p>Ваше имя:  <input type="text" name="author"></p>
	<p>Текст комментария: <br> 
		<textarea name="text" rows = "4" cols = "35"> 
		</textarea>
	</p>
	<p>Введите сумму с картинки</p>
	<p><img src = "<?php echo $commentSet["img"];?>"><br>
		<input type="text" name="pr" value="">
	</p>
	<input type="hidden" name ="id" value="<?php echo $note_id;?>">
	<p>
		<input type="submit" name="sub_com" value="Комментировать">
	</p>

</form>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout.php';?> 



