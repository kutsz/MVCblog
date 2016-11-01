<?php 

$title = "Заметки по запросу ";


?>

<?php ob_start(); ?>

<?php foreach ($date as $dateItem): ?>

	<table>
		<tr>
			<th> <img src="<?php echo $dateItem['mini_img'];?>">
				<center>
					<a href = "/MVCBlog/note/<?php echo $dateItem['id'];?>"> <?php echo $dateItem['title'];?> </a>
				</center>  
				<p> Дата добавления: <?php echo $dateItem['date'];?> </p> 
				<p>Автор урока: <?php echo $dateItem['author'];?></p>
			</th>
		</tr>

		<tr>
			<td> <?php echo $dateItem['description'];?>
				<br> Просмотров: <?php echo $dateItem['view'];?>
			</td>
		</tr>

	</table> <br> <br>   
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout.php';?> 


<!--/template/css/style.css -->
