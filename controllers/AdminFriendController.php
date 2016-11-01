<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями 
 */
class AdminFriendController extends AdminBase
{


    /**
     * Action для страницы "Добавить категорию"
     */
    public function actionCreate()
    {
         // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $title = $_POST['title'];
            $link = $_POST['link'];
       
            
            // Флаг ошибок в форме
            $errors = false;

        // При необходимости можно валидировать значения нужным образом
            if ((!isset($title) || empty($title)) || (!isset($link) || empty($link))) 
            {
               $errors[] = 'Заполните поля';
            }


           if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
            Friend::createFriend($title, $link);

                // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /MVCBlog/admin/friend/create");   //??  TODO
        }
    }

        require_once(ROOT . '/views/admin_friend/create.php');
        return true;
    }

    public function actionView(){
       // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $friends = Friend::getFriend();

        require_once(ROOT . '/views/admin_friend/view.php');
          return true;


}
    /**
     * Action для страницы "Редактировать категорию"///////////////////
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $friend = Friend::getFriendById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $title = $_POST['title'];
            $link = $_POST['link'];             
            $id = $_POST['id'];
            
            // Сохраняем изменения
            Friend::updateFriend($id, $link, $title);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /MVCBlog/admin/friend/view");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_friend/update.php');
        return true;
    }



    /**
     * Action для страницы "Удалить категорию"
     */
    public function actionDelete()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $friends = Friend::getFriend();

        // Обработка формы
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            // Если форма отправлена
            // Удаляем категорию
            Friend::deleteFriendById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /MVCBlog/admin/friend/delete");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_friend/delete.php');
        return true;
    }


}