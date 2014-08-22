
<form  method="POST" action="regHeadset.php">
<div class="row">
	<div class="large-6 columns">
		<label><cite>Register headset</cite> <input type="text" placeholder="Enter Headset Id#" name="headsetTb"/>
		</label>
		<?php 
		if(isset($_SESSION['errHs']['headsetTb'])) {
			echo '<small class="error">'.$_SESSION['errHs']['headsetTb'].'</small>';
			unset($_SESSION['errHs']['headsetTb']);
		} 
		?>
		<div class="row">
			<div class="large-2 columns">
				<input class="button small radius" type="submit" value="Register" name="submit">
			</div>

		</div>
	</div>
</div>

</form>
<table class="striped">
	<tr>
		<td>ID #</td>
		<td>Headset Id</td>
		<td>Date Added</td>
	</tr>

	<?php
	include ('dbConnection.php');

$query = mysql_query("select * from headset_tbl");
	while ($row = mysql_fetch_array($query)) {
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['headset_Id']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "</tr>";
	}
	?>
</table>
