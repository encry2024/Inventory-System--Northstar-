<?php     //start php tag
//include connect.php page for database connection
Include ('dbConnection.php');
//if submit is not blanked i.e. it is clicked.
session_start();

$errCount = 0;

$_SESSION['headsetId'] = $_REQUEST['headsetTb'];
if(isset($_REQUEST['submit'])!='')
{
	//VALIDATE HEADSET TEXTBOX
	if($_REQUEST['headsetTb']=='') {
		$errCount++;
		$_SESSION['err'] = array('headsetTb' => "headsetTb cannot be empty");
		
	} elseif(strlen($_REQUEST['headsetTb'])<6 OR strlen($_REQUEST['headsetTb'])>15) {
		$errCount++;
		$_SESSION['err'] += array('headsetTb' => "headsetTb must not less than 6 characters and not greater than 6");
		
	} elseif(preg_match('#[^a-zA-Z0-9]#', $_REQUEST['headsetTb'])) {
		$errCount++;
		$_SESSION['err'] += array('headsetTb' => "headsetTb must only contain: a-z, A-Z, 0-9 characters");
	}
	if ($errCount == 0)
	{
		$sql2=mysql_query("Select * from headset_tbl WHERE headset_Id='". mysql_real_escape_string($_REQUEST['headsetTb']) ."'");
		if (mysql_num_rows($sql2) == 0)
		{
			$sql1="insert into headset_tbl(headset_Id) values('".mysql_real_escape_string($_REQUEST['headsetTb'])."')";
			$res2=mysql_query($sql1);
			if($res2)
			{
				$_SESSION['sysMsg'] = array('$strSuccess' => "Headset successfuly registered" );

			}
		}
		else {
			$_SESSION['sysMsg'] = array('headsetTb' => "Headset's ID is already exists" );
		}


		}
		header('Location: showpage.php?page=headsets');
	}

	?>