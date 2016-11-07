<?php



class HomePageController
{


	public function actionIndex()
	{
		

		$settings = array();
		$settings = HomePage::getSettings();


		require_once(ROOT.'/views/homePage/index.php');

		return true;
		
		
	}
}