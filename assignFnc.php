<?php     //start php tag
//include connect.php page for database connection
Include('dbConnection.php');
//if submit is not blanked i.e. it is clicked.
//var_dump($_SESSION['usernameTbx']);
session_start();

$hdstId = $_REQUEST['hdsts'];
$usrId = $_REQUEST['usrs'];

if(isset($_REQUEST['submit'])!='')
{

	$sqlRetrieveHdstId = mysql_query("Select hdst_Id FROM headset_tbl WHERE headset_Id ='".$hdstId."'");
	if ($row = mysql_fetch_array($sqlRetrieveHdstId)) {
		$id = $row['hdst_Id'];
	}

	$sqlRetrieveUsrId = mysql_query("Select user_id FROM user_tbl WHERE firstname = '".$usrId."'");
	if ($row1 = mysql_fetch_array($sqlRetrieveUsrId)) {
		$userid = $row1['user_id'];
	}


	$sql2=mysql_query("Select * from headset_tbl WHERE headset_Id='". mysql_real_escape_string($hdstId) ."'");
	
	if(mysql_num_rows($sql2) != 0)
	{
		$sql1 = mysql_query("insert into person_tbl(hdst_Id, user_id) values('".mysql_real_escape_string($id)."','".mysql_real_escape_string($userid)."')");
		$updateHeadset = mysql_query("Update headset_tbl SET headset_status = 'Unavailable' WHERE hdst_Id = '".$id."'");
	}
	header('Location: showpage.php?page=persons');

}

?>