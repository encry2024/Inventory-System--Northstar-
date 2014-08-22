<?php     //start php tag
//include connect.php page for database connection
Include('dbConnection.php');
//if submit is not blanked i.e. it is clicked.
session_start();

$errCount = 0;

$_SESSION['usernameTb'] = $_REQUEST['usernameTb'];
$_SESSION['passwordTb'] = $_REQUEST['passwordTb'];
$_SESSION['firstNameTb'] = $_REQUEST['firstNameTb'];
$_SESSION['lastNameTb'] = $_REQUEST['lastNameTb'];

if(isset($_REQUEST['submit'])!='')
{
	//VALIDATE USERNAME TEXTBOX
	if($_REQUEST['usernameTb']=='') {
		$errCount++;
		$_SESSION['err'] = array('usernameTb' => "Username cannot be empty");
		
	} elseif(strlen($_REQUEST['usernameTb'])<5 OR strlen($_REQUEST['usernameTb'])>30) {
		$errCount++;
		$_SESSION['err'] += array('usernameTb' => "Username must not less than 5 characters and not greater than 30");
		
	} elseif(preg_match('#[^a-zA-Z0-9-_]#', $_REQUEST['usernameTb'])) {
		$errCount++;
		$_SESSION['err'] += array('usernameTb' => "Username must only contain: a-z, A-Z, 0-9, and _");
	}
	//VALIDATE PASSWORD TEXTBOX
	if($_REQUEST['passwordTb']=='') {
		$errCount++;
		$_SESSION['err'] += array('passwordTb' => "Password cannot be empty");
	} elseif($_REQUEST['passwordTb'] != $_REQUEST['confirmPassTb']) {
		$errCount++;
		$_SESSION['err'] += array('passwordTb' => "Password do not match");
	}
	//VALIDATE CONFIRM PASSWORD TEXTBOX
	if($_REQUEST['confirmPassTb']=='') {
		$errCount += 1;
		$_SESSION['err'] += array('confirmPassTb' => "Confirm password cannot be empty");
	}
	//VALIDATE FIRSTNAME TEXTBOX
	if($_REQUEST['firstNameTb']=='') {
		$errCount += 1;
		$_SESSION['err'] += array('firstNameTb' => "Firstname cannot be empty");
	} elseif(preg_match('#[^a-zA-Z- ]#', $_REQUEST['firstNameTb'])) {
		$errCount += 1;
		$_SESSION['err'] += array('firstNameTb' => "Firstname must only contain: a-z, and A-Z");
	}
	//VALIDATE LASTNAME TEXTBOX
	if($_REQUEST['lastNameTb']=='') {
		$errCount += 1;
		$_SESSION['err'] += array('lastNameTb' => "Lastname cannot be empty");
	} elseif(preg_match('#[^a-zA-Z- ]#', $_REQUEST['lastNameTb'])) {
		$errCount += 1;
		$_SESSION['err'] += array('lastNameTb' => "Lastname must only contain: a-z, and A-Z");
	}
	if ($errCount == 0)
	{
		$sql2=mysql_query("Select username from user_tbl WHERE username='". mysql_real_escape_string($_REQUEST['usernameTb']) ."'");
		if (mysql_num_rows($sql2) == 0)
		{
			$sql1="insert into user_tbl(username,password,firstname,lastname) values('".mysql_real_escape_string($_REQUEST['usernameTb'])."', '".mysql_real_escape_string($_REQUEST['passwordTb'])."', '".mysql_real_escape_string($_REQUEST['firstNameTb'])."', '".mysql_real_escape_string($_REQUEST['lastNameTb'])."')";
			$res2=mysql_query($sql1);
			if($res2)
			{
				$_SESSION['sysMsg'] = array('$strSuccess' => "You have successfully registered!" );

			}
		}
		else {
			$_SESSION['sysMsg'] = array('usernameTb' => "Username already exists" );
		}


		}
		header('Location: showpage.php?page=users');
	}

	?>