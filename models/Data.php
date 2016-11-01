
<?php

/**
* TODO
*/
class Data
{
	
	public static function getDataList()
	{
		$db = Db::getConnection();

		$data = [];
		$result = $db->query('SELECT * FROM data');

		$i = 0;
		while($row = $result->fetch()) {
			$data[$i]['id'] = $row['id'];
			$data[$i]['cat'] = $row['cat'];
			$data[$i]['meta_d'] = $row['meta_d'];
			$data[$i]['meta_k'] = $row['meta_k'];
			$data[$i]['description'] = $row['description'];
			$data[$i]['text'] = $row['text'];
			$data[$i]['view'] = $row['view'];
			$data[$i]['author'] = $row['author'];
			$data[$i]['date'] = $row['date'];
			$data[$i]['mini_img'] = $row['mini_img'];
			$data[$i]['title'] = $row['title'];

			$i++;

		}
		return $data;

	}


	public static function getDataItemById($id)
	{
		$id = intval($id);

		if($id){
			$db = Db::getConnection();

			$dataItem = [];
			$result = $db->query('SELECT * FROM data WHERE cat='.$id);

			$i = 0;
			while($row = $result->fetch()) {
				$dataItem[$i]['id'] = $row['id'];
				$dataItem[$i]['cat'] = $row['cat'];
				$dataItem[$i]['meta_d'] = $row['meta_d'];
				$dataItem[$i]['meta_k'] = $row['meta_k'];
				$dataItem[$i]['description'] = $row['description'];
				$dataItem[$i]['text'] = $row['text'];
				$dataItem[$i]['view'] = $row['view'];
				$dataItem[$i]['author'] = $row['author'];
				$dataItem[$i]['date'] = $row['date'];
				$dataItem[$i]['mini_img'] = $row['mini_img'];
				$dataItem[$i]['title'] = $row['title'];

				$i++;

			}

              //$dataItem = $result->fetch(); 

			return $dataItem;

		}
	}



	public static function getNotes()
	{
		$db = Db::getConnection();
		$notes = array();

		$result = $db->query('SELECT id,title FROM data ORDER BY date DESC,id DESC LIMIT 5');


		$i = 0;
		while($row = $result->fetch()) {
			$notes[$i]['id'] = $row['id'];
			$notes[$i]['title'] = $row['title'];
			$i++;
		}


		return $notes;
	}
// получаем все заметки, используем в AdminNoteController в ф-ции actionView()
	public static function getNotesAdmin()
	{
		$db = Db::getConnection();
		$notes = array();

		$result = $db->query('SELECT id,title FROM data');


		$i = 0;
		while($row = $result->fetch()) {
			$notes[$i]['id'] = $row['id'];
			$notes[$i]['title'] = $row['title'];
			$i++;
		}


		return $notes;
	}

	public static function getNoteById($id)
	{

		$id = intval($id);
		if($id){


			$db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM data WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
       //return $result->fetch();
			$note = $result->fetch(); 

			return $note;
			//_________________________

			// $result = $db->query('SELECT * FROM data WHERE id=' .$id);

   //       // $result->setFetchMode(PDO::FETCH_NUM);
   //      //$result->setFetchMode(PDO::FETCH_ASSOC);

			// $note = $result->fetch(); 

			// return $note;
		}
	}

//Список последних дат из таблицы data, использ. в aside.php

	public static function getArchive()
	{
		$db = Db::getConnection();
		$archive = array();

		$result = $db->query('SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC');


		$i = 0;
		while($row = $result->fetch()) {
			$archive[$i]['month'] = $row['month'];
			$i++;
		}


		return $archive;
	}

		public static function updateView($id) //??
		{

			$id = intval($id);
			if($id){


				$db = Db::getConnection();

				$result = $db->query('SELECT view FROM data WHERE id=' .$id);
				$result_view=$result->fetch(); 
				$new_view = $result_view['view'] + 1;
			//echo $new_view;
				$update = $db->query("UPDATE data SET view = $new_view WHERE id = $id");


			}
		}


	//
		public static function getLastDates($date)
		{
			$db = Db::getConnection();


			$date_begin = $date;
			$date++;
			$date_end = $date;

			$date_begin = $date_begin."-01";
			$date_end = $date_end."-01";

			$result = $db->query("SELECT id,title,description,date,author,mini_img,view 
				FROM data WHERE date > '$date_begin' AND date < '$date_end'");

			$date_temp = array();

			$i = 0;
			while($row = $result->fetch()) {
				$date_temp[$i]['id'] = $row['id'];
				$date_temp[$i]['title'] = $row['title'];
				$date_temp[$i]['description'] = $row['description'];
				$date_temp[$i]['date'] = $row['date'];
				$date_temp[$i]['author'] = $row['author'];
				$date_temp[$i]['mini_img'] = $row['mini_img'];
				$date_temp[$i]['view'] = $row['view'];

				$i++;
			}


			return $date_temp;
		}


    public static function searchData($search)
    {
    	$db = Db::getConnection();
    	$result = $db->query("SELECT id,title,description,date,author,mini_img,view FROM data 
		WHERE text LIKE '%$search%'");
		$data_temp = array();
		$i = 0;
			while($row = $result->fetch()) {
				$data_temp[$i]['id'] = $row['id'];
				$data_temp[$i]['title'] = $row['title'];
				$data_temp[$i]['description'] = $row['description'];
				$data_temp[$i]['date'] = $row['date'];
				$data_temp[$i]['author'] = $row['author'];
				$data_temp[$i]['mini_img'] = $row['mini_img'];
				$data_temp[$i]['view'] = $row['view'];

				$i++;
			}


			return $data_temp;
    }

public static function createNote($title, $meta_d, $meta_k, $date, $description, $text, $author, $img, $cat)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO data (title,meta_d,meta_k,date,description,text,author,mini_img,cat)' 
        .'VALUES (:title, :meta_d, :meta_k, :date, :description, :text, :author, :img, :cat)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':meta_d', $meta_d, PDO::PARAM_STR);
        $result->bindParam(':meta_k', $meta_k, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
        $result->bindParam(':cat', $cat, PDO::PARAM_INT);

        return $result->execute();
        //___________________________________
  //       //
  //       if(isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) 
		// 	&& isset($text) && isset($author) && isset($img) && isset($cat)){
		// 	$query = "INSERT INTO  data 
		// (title,meta_d,meta_k,date,description,text,author,mini_img,cat) 
		// VALUES ('$title','$meta_d','$meta_k','$date','$description','$text','$author','$img','$cat')";
		// $result = mysqli_query($db,$query ); 

    }

public static function updateNote($id, $title, $meta_d, $meta_k, $text, $date, $description,  $author, $cat,  $img)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE data
            SET 
                title = :title, 
                meta_d = :meta_d, 
                meta_k = :meta_k,
                text = :text,
                date = :date, 
                description = :description,  
                author = :author, 
                cat = :cat,  
                mini_img = :img
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':meta_d', $meta_d, PDO::PARAM_STR);
        $result->bindParam(':meta_k', $meta_k, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':cat', $cat, PDO::PARAM_INT);
        $result->bindParam(':img', $img, PDO::PARAM_STR);

        return $result->execute();
    }

public static function deleteNoteById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM data WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

	}
