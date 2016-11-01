<?php

/**
* 
*/
class Friend
{
	
	//
	public static function getFriend()
	{
	$db = Db::getConnection();
	$friend = array();

	$result = $db->query('SELECT * FROM friends');


	$i = 0;
	while($row = $result->fetch()) {
		$friend[$i]['id'] = $row['id'];
        $friend[$i]['link'] = $row['link'];
		$friend[$i]['title'] = $row['title'];

        $i++;
    }

	
	return $friend;
	}

    /**
     * integer $id <p>id категории</p>
     * 
     * 
     */
     
	public static function getFriendById($id)
	{

		$id = intval($id);
		if($id){

        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM friends WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
       return $result->fetch();

		}
	}

	/**
	 * 
	 */
	
	public static function createFriend($title, $link)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO friends (title, link)' 
        .'VALUES (:title, :link)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':link', $link, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Редактирование категории с заданным id
     * @param integer $id <p>id категории</p>
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateFriend($id, $link, $title)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE friends
            SET 
                link = :link,
                title = :title
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':link', $link, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);

        return $result->execute();
    }



    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteFriendById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM friends WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}
