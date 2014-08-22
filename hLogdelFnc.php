<?php

include ('dbConnection.php');


$personId = $_GET['person_Id'];


$query = mysql_query("Delete from person_tbl WHERE person_Id = '$personId'");
//header('location: showpage.php?page=headsets');
var_dump($query);
var_dump($personId);
var_dump(mysql_query("Delete from person_tbl WHERE person_Id = '$personId'"));
?>