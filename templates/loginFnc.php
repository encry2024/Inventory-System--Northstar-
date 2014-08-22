<?php     //start php tag
//include connect.php page for database connection
Include('dbConnection.php');
//if submit is not blanked i.e. it is clicked.
//var_dump($_SESSION['usernameTbx']);
session_start();
$user = $_POST['usernameTbx'];
$pass = $_POST['passwordTbx'];
$errCount = 0;
$_SESSION['usernameTbx'] = $_REQUEST['usernameTbx'];
$_SESSION['passwordTbx'] = $_REQUEST['passwordTbx'];

if(isset($_REQUEST['submit'])!='')
{
	//VALIDATE USERNAME TEXTBOX
	if($_REQUEST['usernameTbx']=='') {
		$errCount++;
		$_SESSION['error'] = array('usernameTbx' => "Username cannot be empty");
		
	}
	//VALIDATE PASSWORD TEXTBOX
	if($_REQUEST['passwordTbx']=='') {
		$errCount++;
		$_SESSION['error'] += array('passwordTbx' => "Password cannot be empty");
	} 
	header('Location: loginPage.php');
	if($errCount == 0) {

		$sql = mysql_query("Select * FROM admin_tbl WHERE username = '".mysql_real_escape_string($user)."' AND password = '".mysql_real_escape_string($pass)."'") or die(mysql_error());

		$row = mysql_fetch_array($sql);
		if($row["username"]==$user && $row["password"]==$pass)
		{
			$_SESSION['userFirstName'] = $row['firstname'];
			header('Location: ?page=mainPage.php');

		}
		elseif($row["username"]!=$user && $row["password"]!=$pass)
		{
			$_SESSION['sysMsg'] = array('$strFail' => "Incorrect Username or Password" );
		}
	}
	
	//$_POST['usernameTbx'] = $_SESSION['usernameTbx'];

}


?>