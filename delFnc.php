<?php

include ('dbConnection.php');

$id = $_GET['id'];



$query = mysql_query("Delete from headset_tbl WHERE hdst_Id = '$id'");
header('location: showpage.php?page=headsets');
//var_dump($query);
?>