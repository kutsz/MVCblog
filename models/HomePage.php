<?php

/**
* 
*/
class HomePage
{
	
	public static function getSettings()
	{
       $db = Db::getConnection();
       $settings = array();

       $result = $db->query("SELECT title,meta_d,meta_k,text,id FROM settings WHERE page='index'");

       $settings = $result->fetch();
       return $settings;
   }
//
//
   public static function getAdminSettings()
   {
    $db = Db::getConnection();
    $settings = array();

    $result = $db->query("SELECT title,meta_d,meta_k,text,id FROM settings WHERE page='index'");

    //$settings = $result->fetch();
    $i = 0;
    while($row = $result->fetch()) {
        $settings[$i]['id'] = $row['id'];
        $settings[$i]['title'] = $row['title'];
        $settings[$i]['meta_d'] = $row['meta_d'];
        $settings[$i]['meta_k'] = $row['meta_k'];
        $settings[$i]['text'] = $row['text'];

        $i++;
    }

    
    return $settings;
}
public static function getHomePageById($id)
{
        // Соединение с БД
    $db = Db::getConnection();

        // Текст запроса к БД
    $sql = 'SELECT * FROM settings WHERE id = :id';

        // Используется подготовленный запрос
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
    $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
    $result->execute();

        // Получение и возврат результатов
    return $result->fetch();
}

    //

public static function updateHomePage($id, $options)
{
        // Соединение с БД
    $db = Db::getConnection();

        // Текст запроса к БД
    $sql = "UPDATE settings
    SET 
    title = :title, 
    meta_d = :meta_d, 
    meta_k = :meta_k,
    text = :text
    WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
    $result->bindParam(':meta_d', $options['meta_d'], PDO::PARAM_STR);
    $result->bindParam(':meta_k', $options['meta_k'], PDO::PARAM_STR);
    $result->bindParam(':text', $options['text'], PDO::PARAM_STR);

    return $result->execute();
}

}
