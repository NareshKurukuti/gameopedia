<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$description = $_POST['description'];

	$sql = "SELECT * FROM messages ORDER BY priority DESC LIMIT 1";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	$priority = $row['priority'] + 1;

	$sql = "INSERT INTO messages (description, priority) VALUES ('$description', '$priority')";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Message added successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: messages.php');
