
<?php
	// Created by Bryan Joshua BUcu


	function total(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM appointment WHERE appointment_status = 'upcoming' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

//CHILDREN-----------------------------------------------------------------------------------------------

	function children(){
include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 1 and 13";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	function childrenP1(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 1 and 13 AND purok = '1'";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	function childrenP2(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 1 and 13 AND purok = '2'";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	function childrenP3(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 1 and 13 AND purok = '3'";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

//-------------------------------------------------------------------------------------------------------------
//TEENAGERS----------------------------------------------------------------------------------------------------
	function teenagers(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 14 and 19";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function teenagersP1(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 14 and 19 AND purok = '1'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function teenagersP2(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 14 and 19 AND purok = '2'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function teenagersP3(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 14 and 19 AND purok = '3'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

//------------------------------------------------------------------------------------------------------------
//ADULTS------------------------------------------------------------------------------------------------------
	function adults(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 20 AND 59";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function adultsP1(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 20 and 59 AND purok = '1'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function adultsP2(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 20 and 59 AND purok = '2'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function adultsP3(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 20 and 59 AND purok = '3'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

//------------------------------------------------------------------------------------------------------------
//SENIORS-----------------------------------------------------------------------------------------------------
	function seniors(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 60 and 100";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function seniorsP1(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 60 and 100 AND purok = '1'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function seniorsP2(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 60 and 100 AND purok = '2'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function seniorsP3(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE age BETWEEN 60 and 100 AND purok = '3'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

//------------------------------------------------------------------------------------------------------------
//RESIDENTS---------------------------------------------------------------------------------------------------

	function residents(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'resident'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function residentsP1(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'resident' AND purok = '1'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function residentsP2(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'resident' AND purok = '2'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function residentsP3(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'resident' AND purok = '3'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

//------------------------------------------------------------------------------------------------------------
//BOARDERS----------------------------------------------------------------------------------------------------

	function boarders(){
	include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'boarder'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function boardersP1(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'boarder' AND purok = '1'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function boardersP2(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'boarder' AND purok = '2'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function boardersP3(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE type = 'boarder' AND purok = '3'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

//------------------------------------------------------------------------------------------------------------

	function male(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Male'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function maleP1(){
	include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Male' AND purok = '1'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function maleP2(){
include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Male' AND purok = '2'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function maleP3(){
include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Male' AND purok = '3'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

//------------------------------------------------------------------------------------------------------------

	function female(){
include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Female'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function femaleP1(){
include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Female' AND purok = '1'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function femaleP2(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Female' AND purok = '2'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

	function femaleP3(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM people WHERE gender = 'Female' AND purok = '3'";
		$result = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			echo $output = $row['count'];
		}
	}

//------------------------------------------------------------------------------------------------------------




?>