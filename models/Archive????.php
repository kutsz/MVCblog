<?php

/**
* ?????????????????????????????
*/
class Archive
{
	
	public static function getArchive()
	{
	$db = Db::getConnection();
	$archive = array();

	$result = $db->query('SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC');


	$i = 0;
	while($row = $result->fetch()) {
		$archive[$i]['month'] = $row['month'];
        $i++;
    }

	
	return $archive;
	}
}
