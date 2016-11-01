<?php


// include_once ROOT.'/models/HomePage.php';


class HomePageController
{


	public function actionIndex()
	{
  //   	$categories = array();
		// $categories = Category::getCategoriesList();


		// $notes = array();
		// $notes = LastNote::getNotes();

		// $archive = array();
		// $archive = Archive::getArchive();

		// $friend = array();
		// $friend = Friend::getFriend();

		$settings = array();
		$settings = HomePage::getSettings();


		require_once(ROOT.'/views/homePage/index.php');
// require (ROOT.'/views/homePage/index.php');
		 return true;
		
		// echo 'BlogController::actionIndex';
	}
}