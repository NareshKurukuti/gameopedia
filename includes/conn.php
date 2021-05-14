<?php
$conn = new mysqli('localhost', 'root', '', 'gameopedia');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
