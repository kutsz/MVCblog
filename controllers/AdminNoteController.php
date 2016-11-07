<?php

/**
 * Контроллер AdminNoteController
 * Управление категориями 
 */
class AdminNoteController extends AdminBase
{


    /**
     * Action для страницы "Добавить категорию"
     */
    public function actionCreate()
    {
         // Проверка доступа
        self::checkAdmin();


        $categories = array();
        $categories = Category::getCategoriesListBy_id_title();


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $title = $_POST['title'];
            $meta_d = $_POST['meta_d'];
            $meta_k = $_POST['meta_k'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            $text = $_POST['text'];
            $author = $_POST['author'];
            $img = $_POST['img'];
            $cat = $_POST['cat'];

            // Флаг ошибок в форме
            $errors = false;

        // При необходимости можно валидировать значения нужным образом
            if ((!isset($title) || empty($title)) || (!isset($meta_d) || empty($meta_d)) 
                || (!isset($meta_k) || empty($meta_k)) || (!isset($text) || empty($text))) 
            {
             $errors[] = 'Заполните поля';
         }


         if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
            Data::createNote($title, $meta_d, $meta_k, $date, $description, $text, $author, $img, $cat);

                // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /MVCBlog/admin/note/create");  
        }
    }

    require_once(ROOT . '/views/admin_note/create.php');
    return true;
}

public function actionView(){
       // Проверка доступа
    self::checkAdmin();

        // Получаем данные о конкретной категории
    $notes = Data::getNotesAdmin();

    require_once(ROOT . '/views/admin_note/view.php');
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
        $note = Data::getNoteById($id);
        // Получаем данные о конкретной категории
        $categories = Category::getCategoriesListBy_id_title();


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $id = $_POST['id'];
            $title = $_POST['title'];
            $meta_d = $_POST['meta_d'];
            $meta_k = $_POST['meta_k'];
            $text = $_POST['text'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            $author = $_POST['author'];
            $cat = $_POST['cat'];
            $img = $_POST['img'];               
            
            // Сохраняем изменения
            Data::updateNote($id, $title, $meta_d, $meta_k, $text, $date, $description,  $author, $cat,  $img);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /MVCBlog/admin/note/view");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_note/update.php');
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
        $notes = Data::getNotesAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            // Если форма отправлена
            // Удаляем категорию
            Data::deleteNoteById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /MVCBlog/admin/note/delete");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_note/delete.php');
        return true;
    }


}