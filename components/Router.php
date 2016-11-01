<?php

/**
* 
*/
class Router	
{
	private $routes;  // массив в котором хранятся маршруты (папка config (файлы с настройками системы))

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this ->routes = include($routesPath);   // return array  в routes.php
	}
	
	 /**
	  * Return request string
	  * @return string(type)
	  */
	  
	  
	private function getURI()    // инкапсуляция
	{
		if(!empty($_SERVER['REQUEST_URI'])){     //empty — Проверяет, пуста ли переменная
			return trim($_SERVER['REQUEST_URI'], '/'); //trim — Удаляет пробелы (или другие символы) из начала и конца строки
		}

	}
	public function run()  // принимат управление от front controller
	{     //0 Тест
		 // print_r($this->routes); // выводит информацию о переменной в удобочитаемом виде.
		 // echo "Class Router, method run";
		 
//1 Получить строку запроса
		$uri = $this->getURI();
	      //echo '$uri: '.$uri.'<br>';//??
	      
//2 Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {  //  Foreach работает только с массивами и объектами, и будет генерировать ошибку при попытке использования с переменными других типов или неинициализированными переменными.
			 //echo "<br> $uriPattern -> $path" ;  //$uriPattern-строка запроса,$path-путь обработчика
			// Сравниваем $uriPattern и $uri  (строка запроса и данные в роутах)
			if(preg_match("~$uriPattern~",$uri)){
				 //echo '$path: '.$path.'<br>';
				 
				 // echo '<br>Где ищем (запрос,который набрал пользователь): '.$uri;
				 // echo '<br>Что ищем (совпадение из правила): '.$uriPattern;
				 // echo '<br>Кто обрабатывает: '.$path;
				 
				 // Получаем внутренний путь из внешнего согласно правилу
				$internalRoute = preg_replace("~$uriPattern~",$path,$uri);
				   //echo '<br><br>Нужно сформировать($internalRoute): '.$internalRoute.'<br><br>';//??

/*
Пример:

Где ищем (запрос,который набрал пользователь): news/sport/114
Что ищем (совпадение из правила): news/([a-z]+)/([0-9]+)
Кто обрабатывает: news/view/$1/$2

Нужно сформировать: news/view/sport/114

 */
//3 Если есть совпадение, Определить какой контроллер и action обрабатавают запрос, параметры
				$segments = explode('/', /*$path*/$internalRoute);//explode — Разбивает строку с помощью разделителя,возвр. массив
				array_shift($segments); // удалить mvc
				// echo '<pre>';
				// print_r($segments);
				// echo '</pre>';
			

				$controllerName = array_shift($segments).'Controller';//array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент.
				// echo $controllerName;
				$controllerName = ucfirst($controllerName);//ucfirst — Преобразует первый символ строки в верхний регистр
				  //echo $controllerName;//??
				$actionName = 'action'.ucfirst(array_shift($segments));

			   // echo '<br>Класс(controller name): '.$controllerName ;//??
      //          echo '<br>Метод(action name): '.$actionName ;//??
      //Параметры
                    $parameters = $segments;

				 // echo '<pre>';
				 // print_r($parameters);
				 // echo '</pre>';

               //4 Подключить файл класса-контроллера

				$controllerFile = ROOT.'/controllers/'. $controllerName.'.php';
				if(file_exists($controllerFile)){ // file_exists — Проверяет наличие указанного файла или каталога
					include_once ($controllerFile);  // Выражение include_once включает и выполняет указанный файл во время выполнения скрипта. 

				}
               //5 Создать объект, вызвать метод(т.е. action)

				$controllerObject = new $controllerName;
				//1..   $result = $controllerObject -> $actionName();
				//2..   $result = $controllerObject -> $actionName($parameters); // передаем массив как параметр
				$result = call_user_func_array(array($controllerObject,$actionName),$parameters);
				/*
				
				 http://php.net/manual/ru/language.types.callable.php
                http://php.net/manual/ru/function.call-user-func-array.php
                
		call_user_func_array — Вызывает пользовательскую функцию с массивом параметров
		mixed call_user_func_array ( callable $callback , array $param_arr )
callback
Вызываемая функция типа callable.

param_arr
Передаваемые в функцию параметры в виде индексированного массива.


				*/
				if($result != null){  // обрываем цикл ,который ищет совпадения в маршрутах
					break;
				}
			}

		}

		



	}


////..Yii, Symfony .  .  . .............................................................

}

/*
Передача параметров при использовании ЧПУ

не ЧПУ
http://mvc/news/?id=1235&category=sport   ->  на сервере попадали в суперглоб.массив $_GET

$_GET['id']          
$_GET['category']

ЧПУ
http://mvc/news/sport/1235      // не попадают в массмв $_GET , но решение есть

 */