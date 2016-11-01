<?php

/**
* 
*/
class Category
{
	
	public static function getCategoriesList()
	{
	$db = Db::getConnection();
	//$categoryList = array();
    $categoryList = [];
	$result = $db->query('SELECT * FROM categories');

	$i = 0;
	while($row = $result->fetch()) {
		$categoryList[$i]['id'] = $row['id'];
		$categoryList[$i]['title'] = $row['title'];
		$categoryList[$i]['meta_d'] = $row['meta_d'];
		$categoryList[$i]['meta_k'] = $row['meta_k'];
		$categoryList[$i]['text'] = $row['text'];

		$i++;
    }

	return $categoryList;
	}

public static function getCategoryItemById($category_id)
{
// Запрос к БД
 $category_id = intval($category_id);
	if($category_id){
// Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM categories WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $category_id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
       //return $result->fetch();
         $categoryItem = $result->fetch(); 

        return $categoryItem;

//--------------------------------------
		//  $db = Db::getConnection();

		// $result = $db->query('SELECT * FROM categories WHERE id=' .$category_id);

  //        // $result->setFetchMode(PDO::FETCH_NUM);
  //       $result->setFetchMode(PDO::FETCH_ASSOC);

		// $categoryItem = $result->fetch(); 

		// return $categoryItem;
	}
}

    /**
     * все id,title из таблицы categories
     * использует AdminNoteController 
     */
    public static function getCategoriesListBy_id_title()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id,title FROM categories');

        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['title'] = $row['title'];
            $i++;
        }
        //Кол-во категорий из таблицы categories, используем в /views/admin_note/update.php
        $GLOBALS["amountCategories"] = $i; 
        return $categoryList;
    }

    public static function createCategory($title, $meta_d, $meta_k, $text)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO categories (title, meta_d, meta_k, text)' 
        .'VALUES (:title, :meta_d, :meta_k, :text)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':meta_d', $meta_d, PDO::PARAM_STR);
        $result->bindParam(':meta_k', $meta_k, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

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
    public static function updateCategory($id, $title, $meta_d, $meta_k,$text)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE categories
            SET 
                title = :title, 
                meta_d = :meta_d, 
                meta_k = :meta_k,
                text = :text
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':meta_d', $meta_d, PDO::PARAM_STR);
        $result->bindParam(':meta_k', $meta_k, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }



    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM categories WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


}

