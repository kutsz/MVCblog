<?php

/**
 * Контроллер AdminController
 * Главная страница в админпанели
 */
class AdminController extends AdminBase
{
    /**
     * Action для стартовой страницы "Панель администратора"
     */
    

    private function actionLogin()
    {


        // Переменные для формы
        $login = false;
        $password = false;
        
        // Обработка формы
        if (isset($_POST['submiT'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $login = $_POST['logiN'];
            $password = $_POST['passworD'];

            // Флаг ошибок
            $errors = false;

            // Проверяем существует ли пользователь
            $AdminId = Lock::checkAdminData($login, $password);

            if ($AdminId == false) {
                // Если данные неправильные - показываем ошибку
               $errors[] = 'Неправильные данные для входа на сайт';
                //  die('Access denied');
           } else {
                // Если данные правильные, запоминаем пользователя (сессия)
            Lock::auth($AdminId);

                //Перенаправляем пользователя в закрытую часть  
        //     header("Location: /MVCBlog/admin;");
        // }
            require_once(ROOT . '/views/admin/index.php');
            return true;
        }
    }

            // Подключаем вид
    require_once(ROOT . '/views/admin/admin_form.php');
    return true;
}


public function actionIndex()
{
    
    $this->actionLogin();
    return true;
}


}