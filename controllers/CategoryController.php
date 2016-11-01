<?php


// include ROOT.'/models/Data.php';
// include_once ROOT.'/models/Category.php';
class CategoryController
{

	public function actionView($category_id)
	{
		if($category_id){
			
		// $categories = array();
		// $categories = Category::getCategoriesList();

		// $settings = array();
		// $settings = HomePage::getSettings();

		// $notes = array();
		// $notes = LastNote::getNotes();

		// $archive = array();
		// $archive = Archive::getArchive();

		// $friend = array();
		// $friend = Friend::getFriend();

			$category = array();
		    $category = Category::getCategoryItemById($category_id);

			$data = array();
			$data = Data::getDataItemById($category_id);

		}
		
		require_once(ROOT.'/views/categories/index_cat.php');

		return true;
		
	}
}