<?php
function onLoadPage() {
	$sql2="Select * from user_tbl";
	if (mysql_num_rows($sql2) == 0) {
		header('Location: inventoryRegistrationForm.php');
	}elseif (mysql_num_rows($sql2) != 0) {
		header('Location: loginPage.php')
	}	
}
?>