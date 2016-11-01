

<?php


// include ROOT.'/models/Data.php';

class ArchiveController
{

	public function actionView($dateArchive)
	{
		if($dateArchive){
			
			$date = array();
			$date = Data::getLastDates($dateArchive);

		}
		
		require_once(ROOT.'/views/archive/index_archive.php');

		return true;
		
	}
}