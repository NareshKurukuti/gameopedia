<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['login'])) {
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$sql = "SELECT * FROM employees WHERE email = '$email'";
	$query = $conn->query($sql);

	if ($query->num_rows < 1) {
		$_SESSION['error'] = 'Cannot find Employee email id..';
	} else {
		$row = $query->fetch_assoc();
		if (password_verify($password, $row['password'])) {
			$_SESSION['voter'] = $row['id'];
		} else {
			$_SESSION['error'] = 'Incorrect password';
		}
	}
} else {
	$_SESSION['error'] = 'Something Went Wrong..';
}

header('location: index.php');
