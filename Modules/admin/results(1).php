<?php
	// Created by Bryan Joshua Bucu


	function total(){
		require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

		$sql = "SELECT COUNT(*) count FROM appointment WHERE appointment_status = 'upcoming' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	function patient(){
		require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
		$sql = "SELECT COUNT(*) count FROM users WHERE accrole = 'patient' ";
		$result = mysqli_query($connection, $sql);
		 	

		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}

	}





?>