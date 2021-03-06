
<?php


class NoteController
{

	public function actionView($note_id)
	{
		if($note_id){
			

			$note = array();
			$note = Data::getNoteById($note_id);
			
			Data::updateView($note_id);

			$comments = [];
			$comments = Comment::getCommentsById($note_id);
			//$commentSet = [];
			$commentSet = Comment::getCommentsSetting();



		}
		
		require_once(ROOT.'/views/notes/index.php');

		return true;
		
	}

	private function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data,ENT_QUOTES, 'UTF-8');
		return $data;
	}

	public function actionComment()
	{
		$author = (isset($_POST['author'])) ? $_POST['author'] : NULL ;
		$text = (isset($_POST['text'])) ? $_POST['text'] : NULL ;
		$pr = (isset($_POST['pr'])) ? $_POST['pr'] : NULL ;
		$sub_com = (isset($_POST['sub_com'])) ? $_POST['sub_com'] : NULL ;
		$id = (isset($_POST['id'])) ? $_POST['id'] : NULL ;
		$commentSet = Comment::getCommentsSetting();

		if(isset($sub_com)){
			$author = (isset($author)) ? $this->test_input($author) : "" ;
			$text = (isset($text)) ? $this->test_input($text) : "" ;

			if(empty($author) || empty($text) || ($pr !== $commentSet['sum'])){

				exit("<p style='color:blue;margin-left:30px; font-size: 22px;'>
					Вы ввели не всю информацию, вернитесь назад и заполните все поля.<br><br>
					<input type='button' name='back' value='Вернутся назад'
		 onclick='history.back();' style=' width: 170px; height: 25px;font-size: 15px;'></p>"); // history.go(-1)
			}
			if($pr == $commentSet['sum']){
				$date = date("Y-m-d");
	         /*
				// Отправляем письмо администратору 
                $adminEmail = 'varrann@gmail.com';
                $message = "Текст: {$text}. От {$author}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
             */
                Comment::addComment($id,$author,$text,$date);
                header("Location: /MVCBlog/note/$id;");

            }

        }
    }



}