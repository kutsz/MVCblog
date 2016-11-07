<?php

return array(            
	
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
	 'home'=>'homePage/index'
	 
	);

