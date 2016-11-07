<?php


class CategoryController
{

	public function actionView($category_id)
	{
		if($category_id){
			

			$category = array();
			$category = Category::getCategoryItemById($category_id);

			$data = array();
			$data = Data::getDataItemById($category_id);

		}
		
		require_once(ROOT.'/views/categories/index_cat.php');

		return true;
		
	}
}