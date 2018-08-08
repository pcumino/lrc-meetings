<?php
function get_db(){
	$_DB_ADDR = "slides/db_meetings.json";

	$mt_db = fopen($_DB_ADDR, "r") or die("Unable to open file!");
	$db_json = fread($mt_db, filesize($_DB_ADDR));
	$db_arr = json_decode($db_json, true);

	fclose($mt_db);

	return $db_arr;
}

function addToDbArr($file, $post){
	$db_arr = get_db();

	$arr_index = -1;
	for ($i=0; $i < sizeof($db_arr); $i++) {
			if ($db_arr[$i]["date"] === $post["date"]) {
				$arr_index = $i;
				break;
			}
	}
	$newrow = array(
		"student_name" => $post["student_name"],
		"title" => $post["title"],
		"file_path" => "slides/".$post["date"]."/".$file["fileToUpload"]["name"]
	);

	if($arr_index >= 0){
		array_push($db_arr[$arr_index]["presentations"], $newrow);
	}
	else {
		$newpres = array();
		array_push($newpres, $newrow);
		$newdate = array(
			"date" => $post["date"],
			"presentations" => $newpres
		);
		array_push($db_arr, $newdate);
	}

	updateJSONdb($db_arr);
}

function updateJSONdb($arr)
{
	$_DB_ADDR = "slides/db_meetings.json";
	$mt_db = fopen($_DB_ADDR, "w");
	$res = json_encode($arr);

	fwrite($mt_db, $res);
	fclose($mt_db);
}

?>
