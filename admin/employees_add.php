<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$filename = $_FILES['photo']['name'];
	if (!empty($filename)) {
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
	}
	//generate Employee id
	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$employeeId = substr(str_shuffle($set), 0, 15);

	$sql = "INSERT INTO employees (employee_id, email, password, firstname, lastname, photo) VALUES 
	('$employeeId', '$email', '$password', '$firstname', '$lastname', '$filename')";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Employee added successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: employees.php');
