<?php     //start php tag
//include connect.php page for database connection
Include('dbConnection.php');
//if submit is not blanked i.e. it is clicked.
//var_dump($_SESSION['usernameTbx']);
session_start();


$ids = $_SESSION['id'];
$errCount = 0;
$_SESSION['headsetTb'] = $_REQUEST['headsetTb'];




if(isset($_REQUEST['submit'])!='')
{
	//VALIDATE USERNAME TEXTBOX
	if($_REQUEST['headsetTb']=='') {
		$errCount++;
		$_SESSION['error'] = array('headsetTb' => "Username cannot be empty");
		
	}
	header('Location: showpage.php?page=headsets');
	if($errCount == 0) {

		$sql = mysql_query("Select * FROM headset_tbl WHERE id = '".mysql_real_escape_string($ids)."'") or die(mysql_error());

		$row = mysql_fetch_array($sql);
		if($row["id"] == $ids) {
			// $_SESSION['userFirstName'] = $row['firstname'];
			// header('Location: mainPage.php');
			$sql = mysql_query("update headset_tbl set headset_Id = '".mysql_real_escape_string($_SESSION['headsetTb'])."' WHERE id = '".$ids."'");
			$_SESSION['sysMsg'] = array('$strSuccess' => "Headset name successfully changed." );

		} else {
			$_SESSION['sysMsg'] = array('$strFail' => "Please check the name you entered. It might contain some invalid characters.")
		}
		// elseif($row["password"] != $_REQUEST['oldPasswordTbx']) {
		// 	$_SESSION['sysMsg'] = array('$strFail' => "Your old password is incorrect." );
		}
	}
	
	//$_POST['usernameTbx'] = $_SESSION['usernameTbx'];


?>