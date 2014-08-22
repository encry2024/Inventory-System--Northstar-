<?php     //start php tag
//include connect.php page for database connection
Include('dbConnection.php');
//if submit is not blanked i.e. it is clicked.
//var_dump($_SESSION['usernameTbx']);
session_start();

$hdstId = $_GET['hn']


	$sql1=mysql_query("Select hdst_Id from headset_tbl WHERE headset_Id = '".$hdstId."'");
	if ($row = mysql_fetch_array($sql1)) {
		$hdst_ID = $row['hdst_Id'];
	}

	$sql2=mysql_query("Select * from person_tbl WHERE hdst_Id='". mysql_real_escape_string($hdst_ID) ."'");	
	header('Location: showpage.php?page=hLog');

}

?>