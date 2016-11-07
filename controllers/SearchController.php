
<?php


class SearchController
{

	private function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data,ENT_QUOTES, 'UTF-8');
		return $data;
	}

	public function actionSeek()
	{
		$submit_s = isset($_POST['submit_s']) ? $_POST['submit_s'] : '';
		$search = isset($_POST['search']) ? $_POST['search'] : '';

		if(isset($submit_s)) {
			if(empty($search) || (mb_strlen($search,'UTF8')<4)){
				exit("<p>Поисковый запрос не введен , либо он менее 4-х символов.</p>");	
			}
			$search = $this->test_input($search);
		}
		else{
			exit("<p>Вы обратились к файлу без необходимых параметров</p>");
		}		

		$date = array();
		$date = Data::searchData($search);


        require_once(ROOT.'/views/notes/search.php');

		return true;
		
	}


}