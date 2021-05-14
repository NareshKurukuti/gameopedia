<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$option_data = $_POST['option_data'];
	$message_id = $_POST['message_id'];

	$sql = "UPDATE options SET option_data = '$option_data', message_id = '$message_id' WHERE id = '$id'";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Option updated successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Fill up edit form first';
}

header('location: options.php');
