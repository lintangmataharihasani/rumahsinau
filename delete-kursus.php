<?php
	include 'islogin.php';
	include 'connect-db.php';
	//Define the query
	$sql = "DELETE FROM kursus WHERE nama ='{$_POST['nama_kursus']}'";

	if ($connection->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $connection->error;
	}

	header("Location: dashboard-admin.php");
?>