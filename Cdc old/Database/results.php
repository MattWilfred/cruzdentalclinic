<?php
	// Created by Bryan Joshua BUcu
	
	function total(){
		include __DIR__.('/connect.php');
		$id = $_SESSION['id'];
		$sql = "SELECT COUNT(*) count FROM bookings WHERE dentist_id='$id' AND status= '1' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	
	function countAllUpcoming(){
		include __DIR__.('/connect.php');
		$id = $_SESSION['id'];
		$sql = "SELECT COUNT(*) count FROM bookings WHERE dentist_id='$id' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
		
	}

	

	function totalUpcomingAppmts(){
		$id = $_SESSION['id'];
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM bookings WHERE dentist_id='$id' AND status = '1' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	function totalPatients(){
		include __DIR__.('/connect.php');
		$id = $_SESSION['id'];
		$sql = "SELECT COUNT(*) count FROM bookings WHERE dentist_id='$id' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}


	function overalltotalPatients(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM users WHERE accrole='Patient' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}


	function overalltotalUpcomingApt(){
		include __DIR__.('/connect.php');

		$sql = "SELECT COUNT(*) count FROM bookings WHERE status='1' ";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}

	function overalltotalAppt(){
		include __DIR__.('/connect.php');
	
		$sql = "SELECT COUNT(*) count FROM bookings";
		$result = mysqli_query($connection, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $output = $row['count'];
		}
	}



?>