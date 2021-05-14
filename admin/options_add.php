<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$option_data = $_POST['option_data'];
	$message_id = $_POST['message_id'];
	$filename = $_FILES['photo']['name'];

	if (!empty($filename)) {
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
	}

	$sql = "INSERT INTO options (message_id, option_data, photo) 
	VALUES ('$message_id', '$option_data','$filename')";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Option added successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: options.php');
