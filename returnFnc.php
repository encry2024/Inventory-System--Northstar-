<?php     //start php tag
//include connect.php page for database connection
Include('dbConnection.php');
//if submit is not blanked i.e. it is clicked.
//var_dump($_SESSION['usernameTbx']);
session_start();

$hdstId = $_GET['id'];



	$sql = mysql_query("Select * FROM headset_tbl WHERE hdst_Id = '".mysql_real_escape_string($hdstId)."'") or die(mysql_error());

	$row = mysql_fetch_array($sql);
	if($row["hdst_Id"] == $hdstId) {

	 	$updateHeadset = mysql_query("Update headset_tbl SET headset_status = 'Available' WHERE hdst_Id = '".$hdstId."'");

	 }	else {
		$_SESSION['sysMsg'] = array('headsetTb' => "Headset's ID is already exists" );
	}
	header('Location: showpage.php?page=persons');
	//var_dump($hdstId);


?>