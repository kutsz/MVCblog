<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями 
 */
class AdminHomePageController extends AdminBase
{


    

    public function actionView(){
       // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $homePages = HomePage::getAdminSettings();

        require_once(ROOT . '/views/admin_homePage/view.php');
        return true;


    }
    /**
     * Action для страницы "Редактировать категорию"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $homePage = HomePage::getHomePageById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['meta_d'] = $_POST['meta_d'];
            $options['meta_k'] = $_POST['meta_k'];
            $options['text'] = $_POST['text'];

            // Сохраняем изменения
            HomePage::updateHomePage($id, $options);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /MVCBlog/admin/homePage/view");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_homePage/update.php');
        return true;
    }




}