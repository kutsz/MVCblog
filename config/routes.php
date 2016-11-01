<?php

return array(            // возвращаем массив
//1.
	//  'news/77' => 'news/view',  // адрес для просмотра одной новости
	// 'news/15' => 'news/view', // Располагаем выше
//2. 
		// 'news/([0-9]+)' => 'news/view', //  в строке любое число(от 1го символа и больше)
//3.	
 // ''=>'blog/index',	
	
	'category/([0-9]+)' => 'category/view/$1',
	'note/([0-9]+)' => 'note/view/$1',	
	'note/(comment.php)' => 'note/comment',
	'archive/([0-9]{4}-[0-9]{2})' => 'archive/view/$1',
	'([a-z]+)/(search.php)' =>'search/seek',
	// Управление категориями:
	'admin/category/create' => 'adminCategory/create',
	 'admin/category/view'=>'adminCategory/view',
	'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete' => 'adminCategory/delete',
	//Управление заметками:
	 'admin/note/create' => 'adminNote/create',
	 'admin/note/view'=>'adminNote/view',
	'admin/note/update/([0-9]+)' => 'adminNote/update/$1',
    'admin/note/delete' => 'adminNote/delete',
   //Управление сайтами-друзьями:
	 'admin/friend/create' => 'adminFriend/create',
	 'admin/friend/view'=>'adminFriend/view',
	'admin/friend/update/([0-9]+)' => 'adminFriend/update/$1',
    'admin/friend/delete' => 'adminFriend/delete',
   //Управление главной страницей:
	 'admin/homePage/view'=>'adminHomePage/view',
	'admin/homePage/update/([0-9]+)' => 'adminHomePage/update/$1',

	 //
	 'admin'=>'admin/index',
	 'home'=>'homePage/index',
	 ////
	 
'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', 
'news/([0-9]+)' => 'news/view/$1',
  // получим параметры $1/$2 и передадим методу класса action -> выполним в class Router 
 //Пример:  news/sport/114   -  варезать  sport/114  и подставить на места  $1/$2
'news' => 'news/index', // actionIndex в NewsController  (пара в массиве -    
	//'news'- запрос(в адресной строке))
// 'news/index' - строка где обрабатывается запрос  
	'products' => 'product/list' ,// actionList в ProductController
'news/archive' => 'news/archive'
	);

/*
Передача параметров при использовании ЧПУ

не ЧПУ
http://mvc/news/?id=1235&category=sport   ->  на сервере попадали в суперглоб.массив $_GET

$_GET['id']          
$_GET['category']

ЧПУ
http://mvc/news/sport/1235      // не попадают в массмв $_GET , но решение есть
Пример: (см.выше)
'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2'  // ([a-z]+) - category ,([0-9]+) - id
 */