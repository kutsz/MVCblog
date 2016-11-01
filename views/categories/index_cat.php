<?php 

$description = $category['meta_d'];
$keywords = $category['meta_k'];
$title = $category['title']; 


?>

 <?php ob_start(); ?>

<?php foreach ($data as $dataItem): ?>
	<?php echo $dataItem['text']; ?>
 <table>
		<tr>
			<th> <img src="<?php echo $dataItem['mini_img'];?>">
                 <center>
                 <a href = "/MVCBlog/note/<?php echo $dataItem['id'];?>"> <?php echo $dataItem['title'];?> </a>
                 </center>  
                 <p> Дата добавления: <?php echo $dataItem['date'];?> </p> 
                 <p>Автор урока: <?php echo $dataItem['author'];?></p>
             </th>
		</tr>

		<tr>
			<td> <?php echo $dataItem['description'];?>
			     <br> Просмотров: <?php echo $dataItem['view'];?>
			</td>
		</tr>

</table> <br> <br>   
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php include ROOT.'/views/layouts/layout.php';?> 


<!--/template/css/style.css -->
