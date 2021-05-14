<?php
include 'includes/session.php';

$sql = "SELECT * FROM messages";
$pquery = $conn->query($sql);


$output = '';
$candidate = '';

$sql = "SELECT * FROM messages ORDER BY priority DESC";
$query = $conn->query($sql);
$num = 1;
while ($row = $query->fetch_assoc()) {
	$input = '<input type="radio" class="flat-red ' . trim($row['description']) . '" name="' . trim($row['description']) . '">';


	$sql = "SELECT * FROM options WHERE message_id='" . $row['id'] . "'";
	$cquery = $conn->query($sql);

	while ($crow = $cquery->fetch_assoc()) {
		$candidate .= '
				<li>
					' . $input . '
					<span class="cname clist">' . $crow['option_data'] . '</span>
				</li>
			';
	}

	$instruct = '<b>Choose Your Vote</b>';

	$output .= '
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-solid" id="' . $row['id'] . '">
						<div class="box-header with-border">
							<h3 class="box-title"><b>' . $row['description'] . '</b></h3>							
						</div>
						<div class="box-body">
							<p>' . $instruct . '</p>
							<div id="candidate_list">
								<ul>
									' . $candidate . '
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		';


	// $sql = "UPDATE positions SET priority = '$num' WHERE id = '" . $row['id'] . "'";
	// $conn->query($sql);

	$num++;
	$candidate = '';
}

echo json_encode($output);
