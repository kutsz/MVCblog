<?php


include_once ROOT.'/models/HomePage.php';
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/LastNote.php';
include_once ROOT.'/models/Archive.php';
include_once ROOT.'/models/Friend.php';
// 
// include ROOT.'/models/HomePage.php';
// include ROOT.'/models/Category.php';
// include ROOT.'/models/LastNote.php';
// include ROOT.'/models/Archive.php';
// include ROOT.'/models/Friend.php';


class Common
{
  public static $categories = array();
  public static $notes = array();
  public static $archive = array();
  public static $friend = array();
  // public  $categories = array();
  // public  $notes = array();
  // public  $archive = array();
  // public  $friend = array();

    public  function asideCategories()
    {
    	$settings = array();
		$settings = HomePage::getSettings();

    }

	public function actionIndex()
	{
        $this->asideCategories();

    	//$categories = array();
		$this->categories = Category::getCategoriesList();


		//$notes = array();
		$this->notes = LastNote::getNotes();

		//$archive = array();
		$this->archive = Archive::getArchive();

		//$friend = array();
		$this->friend = Friend::getFriend();



		require_once(ROOT.'/views/homePage/index.php');
// require (ROOT.'/views/homePage/index.php');
		 return true;
		
		// echo 'BlogController::actionIndex';
	}
}