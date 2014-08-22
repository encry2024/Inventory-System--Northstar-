<?php 
ini_set('error_reporting', 'E_ALL & ~E_DEPRECATED & ~E_STRICT');
include_once('Template.php');
include_once('dbConnection.php');
session_start();
$page = $_GET['page'];

$t = new Template();
switch ($page) {
######### HEADSET LOG
	case 'hLog';
	$t->title = "Headset Log";
	$hn = $_GET['hn'];
	$headsets_table = "<form  method='POST' action='getHeadsetLog.php'>
	<div class='row'>
		<div class='large-12 columns'>
		<h4>".$hn."</h4>
		    <footer class='row'>
		      <div class='large-12 columns'>
		        <hr/>
		        <div class='row'>
		          <div class='large-6 columns'>

		          </div>
		          <div class='large-6 columns'>

		          </div>
		        </div>
		      </div> 
		    </footer>
		<ul class='inline-list'>
		<li><a href='#'>Edit</a></li>
		<li><a href='#'>Delete</a></li>
		</ul>
		</div>
		
	</div>
	</form>
	<table>
		<thead>
			<tr>

			</tr>
		</thead>
	<tbody>
	";
	
	// $query2 = mysql_query("Select * FROM user_tbl WHERE user_id = (Select user_id FROM person_tbl");
	// if($row = mysql_fetch_array($query2)) {
	// 	$_SESSION['uname'] = $row['firstname']." ".$row['lastname'];
	// }
	//$query = mysql_query("Select * FROM person_tbl WHERE hdst_Id = (Select hdst_Id FROM headset_tbl WHERE headset_Id = '$hn')");
	 $query = mysql_query(
	"Select
	t1.hdst_Id, t1.assigned_date, t2.headset_Id, t3.firstname, t3.lastname, t1.person_Id
	FROM
	person_tbl AS t1 
	JOIN
	headset_tbl AS t2
	JOIN
	user_tbl AS t3 
	ON
	t1.hdst_Id = t2.hdst_Id 
	AND
	t1.user_Id = t3.user_id
	WHERE t2.headset_Id ='$hn'");
	$ctr=0;
	while ($row = mysql_fetch_array($query)) {
		$personId = $row['person_Id'];
		$headsets_table .= "<tr><td>".$row['assigned_date']." - ".$_SESSION['userFirstName']." assigned a headset [ ".$hn." ] to ".$row['firstname']." ".$row['lastname']."</td></tr>";
	 }
	$headsets_table .= "</tbody></table>";

	$t->content = $headsets_table;
	$t->render('headsetLog.php');
	break;
######### END HEADSET LOG

######## HEADSETS
	 case 'headsets':
	$t->title = "Headsets Page";	
	//get all headsets from database
	$headsets_table = "<form  method='POST' action='regHeadset.php'>
	<div class='row'>
		<div class='large-6 columns'>
		<label><cite>Register headset</cite> <input type='text' placeholder='Enter Headset Id#' name='headsetTb'/></label>
			
			<div class='row'>
				<div class='large-2 columns'>
					<input class='button small radius' type='submit' value='Register' name='submit'>
				</div>

			</div>
		</div>
	</div>

	</form>

	<table class='striped'>
		<thead>
			<tr>
				<th>ID #</th>
				<th>Headset ID</th>
				<th>Date Added</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
	<tbody>
	";
	$query = mysql_query("select * from headset_tbl ");
	 
	$ctr=0;
	while ($row = mysql_fetch_array($query)) {
		$id = $row['hdst_Id'];
		$hn = $row['headset_Id'];
		$headsets_table .= "<tr><td>".++$ctr."</td><td><a href='showpage.php?page=hLog&hn=$hn'>".$row['headset_Id']."</a></td><td>".$row['date']."</td><td>"."<a href='showpage.php?page=editheadsets&id=$id'>".'Edit'."</a></td><td>"."<a href='delFnc.php?id=$id'>".'Delete'."</a></td></tr>";
		

		if(isset($_SESSION['sysMsg']['headsetTb'])) {
		$headsets_table .= '<div id="div1" data-alert class="alert-box alert radius">'.$_SESSION['sysMsg']['headsetTb'].'</div>';
		unset($_SESSION['sysMsg']['headsetTb']);
		}	
	}

	$headsets_table .= "</tbody></table>";

	$t->content = $headsets_table;
	$t->render('mainpage.php');
	break;

######### USERS PAGE
	case 'users':
	$t->title = "Users Page";
	$user_tbl = "

	<form  method='POST' action='regUserFnc.php'>
	<div class='row'>
		<div class='large-6 columns'>
			<label><cite>Register Username</cite><input type='text' placeholder='Enter usersname' name='usernameTb'/></label>
		</div>
	</div>
	<div class='row'>
		<div class='large-6 columns'>
		<label><cite>Register Password</cite> <input type='password' placeholder='Enter Password' name='passwordTb'/></label>
		</div>

		<div class='large-6 columns'>
			<label><cite>Confirm Password</cite> <input type='password' placeholder='Confirm Password' name='confirmPassTb'/></label>
		</div>
	</div>
	<div class='row'>
		
	</div>
	<div class='row'>
		<div class='large-6 columns'>
			<label><cite>Register Firstname</cite> <input type='text' placeholder='Enter Firstname' name='firstNameTb'/></label>
		</div>
		<div class='large-6 columns'>
		<label><cite>Register Lastname</cite> <input type='text' placeholder='Enter Lastname' name='lastNameTb'/></label>
		</div>
	</div>
	<div class='row'>
		<div class='large-2 columns'>
			<input class='button small radius' type='submit' value='Register' name='submit'>
		</div>
	</div>
	</form>

	<table class='striped'>
		<thead>
			<tr>
				<th>ID #</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Date Joined</th>
			</tr>
		</thead>
	<tbody>"
	;
	$query = mysql_query("select * from user_tbl");
	$ctr =0 ;
	while ($row = mysql_fetch_array($query)) {
		$user_tbl .= "<tr><td>".++$ctr."</td><td><a href=''>".$row['firstname']."</a></td><td>".$row['lastname']."</a></td><td>".$row['date']."</td></tr>";

		if(isset($_SESSION['sysMsg']['usernameTb'])) {
			$user_tbl .=  '<div id="div2" data-alert class="alert-box alert radius">'.$_SESSION['sysMsg']['usernameTb'].'</div>';
			unset($_SESSION['sysMsg']['headsetTb']);
		} if(isset($_SESSION['err']['usernameTb'])) {
                      	$user_tbl .= '<small class="error">'.$_SESSION['err']['usernameTb'].'</small>';
                      	unset($_SESSION['err']['usernameTb']);
                } if(isset($_SESSION['err']['passwordTb'])) {
                      	$user_tbl .= '<small class="error">'.$_SESSION['err']['passwordTb'].'</small>';
                      	unset($_SESSION['err']['passwordTb']);
                } if(isset($_SESSION['err']['confirmPassTb'])) {
                      	$user_tbl .= '<small class="error">'.$_SESSION['err']['confirmPassTb'].'</small>';
                      	unset($_SESSION['err']['confirmPassTb']);
                } if(isset($_SESSION['err']['firstNameTb'])) {
                      	$user_tbl .= '<small class="error">'.$_SESSION['err']['firstNameTb'].'</small>';
                      	unset($_SESSION['err']['firstNameTb']);
                } if(isset($_SESSION['err']['lastNameTb'])) {
                        $user_tbl .= '<small class="error">'.$_SESSION['err']['lastNameTb'].'</small>';
                        unset($_SESSION['err']['lastNameTb']);
                } 
		
	}
	$user_tbl .= "</tbody></table>";
	$t->content = $user_tbl;
	$t->render('userPage.php');
	break;
######### END USER PAGE

######### MANAGE HEADSET PAGE
	case 'editheadsets':
	$t->title = "Headset Page";
	$headsets_table = "<form  method='POST' action='editHeadset.php'>
	<div class='row'>
		<div class='large-6 columns'>
		<label><cite>Register headset</cite> <input type='text' placeholder='Enter Headset Id#' name='headsetTb'/></label>
			
			<div class='row'>
				<div class='large-2 columns'>
					<input class='button small radius' type='submit' value='Update Headset' name='submit'>
				</div>

			</div>
		</div>
	</div>

	</form>

	<table class='striped'>
		<thead>
			<tr>
				<th>ID #</th>
				<th>Headset ID</th>
				<th>Date Added</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
	<tbody>
	";
	$query = mysql_query("select * from headset_tbl");
	 
	$ctr=0;
	while ($row = mysql_fetch_array($query)) {
		$id = $row['hdst_Id'];
		$_SESSION['id'] = $_GET['hdst_Id'];
		$hn = $row['headset_Id'];

              if(isset($_SESSION['sysMsg']['$strSuccess'])) {

                echo '<div id="div1" data-alert class="alert-box success radius">'.$_SESSION['sysMsg']['$strSuccess'].'</div>';
                unset($_SESSION['sysMsg']['$strSuccess']);
              }
	}

	$headsets_table .= "</tbody></table>";

	$t->content = $headsets_table;
	$t->render('manageHeadsets.php');
	break;
######### END MANAGE HEADSET PAGE

######### LOG PAGE
	case 'logs':
	$t->title = "Log Page";
	$headsets_table = "<form  method='POST' action='regHeadset.php'>
	<div class='row'>
		<h4>Log Page</h4>
	</div>

	</form>
</br>
	<table class='tableOne'>
		<thead>
			<tr>

			</tr>
		</thead>
	<tbody>
	";
	 $query = mysql_query(
	"Select
	t1.hdst_Id, t1.assigned_date, t2.headset_Id, t3.firstname, t3.lastname
	FROM
	person_tbl AS t1 
	JOIN
	headset_tbl AS t2
	JOIN
	user_tbl AS t3 
	ON
	t1.hdst_Id = t2.hdst_Id 
	AND
	t1.user_Id = t3.user_id");
	while ($row = mysql_fetch_array($query)) {
		$id = $row['hdst_Id'];
		$headsets_table .= "<tr><td>".$_SESSION['userFirstName']." assigned a headset </td><td>[ ".$row['headset_Id']." ] to </td><td>".$row['firstname']."</td><td>on ".$row['assigned_date']."</td></tr>";	
	}

		$headsets_table .= "</tbody>
	</table>";

	$t->content = $headsets_table;
	$t->render('logPage.php');
	break;
######## END LOG PAGE

######## PERSON PAGE
	case 'persons':
	$t->title = "Persons Page";
####### GET HEADSET NAME
		$query = mysql_query("select headset_Id from headset_tbl WHERE headset_status = 'Available'");
	 
		$ctr=0;
		while ($row = mysql_fetch_array($query)) {
		$hdset = $row['headset_Id'];
		
		 $hdstOption .= "<option value=".$row['headset_Id'].">".$hdset."</option>";
		
		}
####### GET USER NAME
		$query = mysql_query("select firstname, lastname from user_tbl");
	 
		$ctr=0;
		while ($row = mysql_fetch_array($query)) {
		$uFirstname = $row['firstname'];
		$uLastname = $row['lastname'];
		 $usrOption .= "<option value='".$row['firstname']."' ".$row['lastname'].">".$uFirstname ." " .$uLastname."</option>";
		
		}
	$getHdst = "<form  method='POST' action='assignFnc.php'>

	<div class='row'>
		<div class='large-6 columns'>
		<label><cite>Pick Headset</cite>
		  		<select name = 'hdsts'>
		  		$hdstOption
				</select>
		</label>
		<label><cite>Assign to</cite>
		  		<select name = 'usrs'>
		  		$usrOption
				</select>
		</label>
</br>
			<div class='row'>
				<div class='large-1 columns'>
					<input class='button small radius' type='submit' value='Assign' name='submit'>
				</div>

			</div>
		</div>
	</div>

	<div id='firstModal' class='small reveal-modal' data-reveal>
  		<div class='row'>
  			<div class='large-6 columns'>
  			<label><h5>Headset Status</h5><select name = 'hdsts'>
		  			<option value='Good'>Good</option>
  					<option value='Defect'>Defect</option>
  					<option value='Retired'>Retired</option>
				</select>
			</label>
			</div>
			
		</div>
		<div class='large-12 columns'>
  			<label><h5>Comments</h5>
  				<textarea  placeholder='State headsets defect' name='dfctTb'>".$_SESSION['id']."</textarea>
			</label>
		</div>
		<div class='row'>
			<div class='large-1 columns'>
				<input class='button small radius' type='submit' value='Return' name='submit'>
			</div>
		</div>
  	<a class='close-reveal-modal'>&#215;</a>
	</div>

	</form>

	<table class='tableOne'>
		<thead>
			<tr>
				<th>ID #</th>
				<th>Assigned Headset</th>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assigned To</th>
				<th>Date Assigned</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	";

	$query_hdst = mysql_query("select hdst_Id from headset_tbl WHERE headset_status = 'Available'");
	$query_usr = mysql_query("select user_id from user_tbl");
	$ctr=0;
	while ($row_hdst = mysql_fetch_array($query_hdst)) {
		$_SESSION['hdstId'] = $row_hdst['hdst_Id'];	
	}

	while ($row_usr = mysql_fetch_array($query_usr)) {
		$_SESSION['usrId'] = $row_usr['user_id'];
	}

	$query = mysql_query(
	"Select
	t1.hdst_Id, t1.assigned_date, t2.headset_Id, t3.firstname, t3.lastname
	FROM
	person_tbl AS t1 
	JOIN
	headset_tbl AS t2
	JOIN
	user_tbl AS t3 
	ON
	t1.hdst_Id = t2.hdst_Id 
	AND
	t1.user_Id = t3.user_id");
	 //$id = $_GET['hdst_Id'];
	$ctr=0;
	while ($row = mysql_fetch_array($query)) {
		$_SESSION['id'] = $row['hdst_Id'];
		$getHdst .= "<tr><td>".++$ctr."</td><td>".$row['headset_Id']."</td><td>".$row['firstname']." " .$row['lastname']."</td><td>".$row['assigned_date']."</td><td>"."<a href='showpage.php?page=persons&id=".$_SESSION['id']."' data-reveal-id='firstModal'>return</a></td></tr>";
	}

	$getHdst .= "</tbody>
	</table>
	
	";

	$t->content = $getHdst ;
	$t->render('personPage.php');
######### END PERSON PAGE

	default:
	# code...
	break;
}


?>