<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT *, options.id AS canid FROM options LEFT JOIN messages ON messages.id=options.message_id WHERE options.id = '$id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
