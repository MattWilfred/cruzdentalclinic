<?php
	// Created by Bryan Joshua Bucu


	function total(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM appointment WHERE appointment_status = 'upcoming' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	function patient(){
		include __DIR__.('/connect.php');
		$sql = "SELECT COUNT(*) count FROM persons WHERE accrole = 'patient' ";
		$result = mysqli_query($connection, $sql);
		 	

		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}

	}





?>