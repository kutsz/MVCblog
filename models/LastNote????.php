<?php

/**
* ???????????????????????????????//
*/
class LastNote
{
	
	public static function getNotes()
	{
	$db = Db::getConnection();
	$notes = array();

	$result = $db->query('SELECT id,title FROM data ORDER BY date DESC,id DESC LIMIT 5');


	$i = 0;
	while($row = $result->fetch()) {
		$notes[$i]['id'] = $row['id'];
		$notes[$i]['title'] = $row['title'];
        $i++;
    }

	
	return $notes;
	}

	public static function getNoteById($id)
	{

		 $id = intval($id);
	if($id){

		
		 $db = Db::getConnection();

		$result = $db->query('SELECT * FROM data WHERE id=' .$id);

         // $result->setFetchMode(PDO::FETCH_NUM);
        //$result->setFetchMode(PDO::FETCH_ASSOC);

		$note = $result->fetch(); 

		return $note;
	}
}
}
