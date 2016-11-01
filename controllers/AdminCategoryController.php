<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями 
 */
class AdminCategoryController extends AdminBase
{

    // public function actionIndex()
    // {

    //     require_once(ROOT . '/views/admin_category/index.php');
    //     return true;
    // }


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
            $meta_d = $_POST['meta_d'];
            $meta_k = $_POST['meta_k'];
            $text = $_POST['text'];
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
            Category::createCategory($title, $meta_d, $meta_k, $text);

                // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /MVCBlog/admin/category/create");   //??  TODO
        }
    }

    require_once(ROOT . '/views/admin_category/create.php');
    return true;
}

public function actionView(){
       // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $categories = Category::getCategoriesListBy_id_title();

        require_once(ROOT . '/views/admin_category/view.php');
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
        $category = Category::getCategoryItemById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $id = $_POST['id'];
            $title = $_POST['title'];
            $meta_d = $_POST['meta_d'];
            $meta_k = $_POST['meta_k'];
            $text = $_POST['text'];

            // Сохраняем изменения
            Category::updateCategory($id, $title, $meta_d, $meta_k,$text);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /MVCBlog/admin/category/view");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }
// public function actionCategoriesDelete(){
//        // Проверка доступа
//         self::checkAdmin();

//         // Получаем данные о конкретной категории
//         $categories = Category::getCategoriesListBy_id_title();

//         require_once(ROOT . '/views/admin_category/delete.php');
//           return true;


// }

    /**
     * Action для страницы "Удалить категорию"
     */
    public function actionDelete()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $categories = Category::getCategoriesListBy_id_title();

        // Обработка формы
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            // Если форма отправлена
            // Удаляем категорию
            Category::deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /MVCBlog/admin/category/delete");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }

}