<?php
include 'includes/session.php';

if (isset($_POST['messages'])) {
	foreach ($_POST['messages'] as $key => $val) {
		if (isset($val['selected_option']) && !empty($val['selected_option'])) {
			$sql = "INSERT INTO votes_list (employee_id, message_id, option_id) VALUES ('" . $voter['id'] . "', '$key', '$val[selected_option]')";
			$conn->query($sql);
			$_SESSION['success'] = 'Ballot Submitted';
		}
	}
} else {
	$_SESSION['error'][] = 'Something Went Wrong..';
}


header('location: home.php');
