<?php

class Comment
{

	public static function getCommentsById($id)
	{
		$id = intval($id);
		if($id){
			$db = Db::getConnection();

			$comment = [];
			$result = $db->query('SELECT * FROM comments WHERE post = '.$id);

			$i = 0;
			while($row = $result->fetch()) {
				$comment[$i]['id'] = $row['id'];
				$comment[$i]['post'] = $row['post'];
				$comment[$i]['author'] = $row['author'];
				$comment[$i]['text'] = $row['text'];
				$comment[$i]['date'] = $row['date'];

				$i++;

			}
			return $comment;
		}
	}

	public static function getCommentsSetting()
	{

		$db = Db::getConnection();

		$result = $db->query("SELECT img,sum FROM comments_setting WHERE id=2");//todo

         // $result->setFetchMode(PDO::FETCH_NUM);
        $result->setFetchMode(PDO::FETCH_ASSOC);

		$commentSet = $result->fetch(); 

		return $commentSet;

	}


	public static function addComment($id,$author,$text,$date)
	{
        // Соединение с БД
		$db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO comments(post,author,text,date) '
                . 'VALUES (:id, :author, :text, :date)';
		// $result = $db->query("INSERT INTO comments(post,author,text,date) VALUES ('$id','$author','$text','$date')");

         // $result->setFetchMode(PDO::FETCH_NUM);
        //$result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        return $result->execute();


	}

	
}