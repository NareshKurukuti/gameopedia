<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<h1 class="page-header text-center title"><b><?php echo strtoupper("Ballot for Vote"); ?></b></h1>
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<?php
							if (isset($_SESSION['error'])) {
							?>
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<ul>
										<?php
										foreach ($_SESSION['error'] as $error) {
											echo "
												<li>" . $error . "</li>
												";
										}
										?>
									</ul>
								</div>
							<?php
								unset($_SESSION['error']);
							}
							if (isset($_SESSION['success'])) {
								echo "
				            	<div class='alert alert-success alert-dismissible'>
				              		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				              		<h4><i class='icon fa fa-check'></i> Success!</h4>
				              	" . $_SESSION['success'] . "
				            	</div>
				          	";
								unset($_SESSION['success']);
							}

							?>

							<div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<span class="message"></span>
							</div>


							<!-- Voting Ballot -->
							<form method="POST" id="ballotForm" action="submit_ballot.php">
								<?php
								include 'includes/slugify.php';

								$candidate = '';
								$sql = "SELECT * FROM messages ORDER BY priority ASC";
								$query = $conn->query($sql);

								while ($row = $query->fetch_assoc()) {
									$sql = "SELECT * FROM options WHERE message_id='" . $row['id'] . "' order by id asc";
									$cquery = $conn->query($sql);
									$checkVotedOrNot = "SELECT * FROM votes_list WHERE employee_id='" . $_SESSION['voter'] . "' and message_id='" . $row['id'] . "'";

									$votedrecords = $conn->query($checkVotedOrNot);
									$aleadyVoted = false;
									if ($votedrecords->num_rows >= 1) {
										$aleadyVoted = true;
									} else {
										$aleadyVoted = false;
									}
									while ($crow = $cquery->fetch_assoc()) {
										$slug = slugify($row['description']);
										$checked = '';

										if ($aleadyVoted === true) {
											$input = '';
											$instruct = '<b style="color:green !important;">Already Voted.....</b>';
										} else {
											$instruct = '<b>Choose Your Vote</b>';
											$input = '<input type="radio" class="flat-red ' . $slug . '" name="messages[' . $row['id'] . '][selected_option]" value="' . $crow['id'] . '">';
										}


										if (!empty($crow['photo'])) {
											$image = '<img src="images/' . $crow['photo'] . '" height="100px" width="100px" class="clist">';
										} else {
											$image = '';
										}
										$candidate .= '
												<li>
													' . $input . $image . '<span class="cname clist">' . $crow['option_data'] . '</span>
												</li>
											';
									}
									echo '
											<div class="row">
												<div class="col-xs-12">
													<div class="box box-solid" id="' . $row['id'] . '">
														<div class="box-header with-border">
														
															<h3 class="box-title"><b>' . $row['description'] . '</b></h3>
														</div>
														<div class="box-body">
															<p>' . $instruct . '
																<span class="pull-right">
																	<button type="button" class="btn btn-success btn-sm btn-flat reset" data-desc="' . slugify($row['description']) . '"><i class="fa fa-refresh"></i> Reset</button>
																</span>
															</p>
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

									$candidate = '';
								}
								?>
								<?php
								if ($query->num_rows != 0) { ?>
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-flat" name="vote"><i class="fa fa-check-square-o"></i> Submit</button>
									</div>
								<?php }
								?>

							</form>
							<!-- End Voting Ballot -->
							<?php
							// }
							?>
						</div>
					</div>
				</section>

			</div>
		</div>

		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<script>
		$(function() {
			$('.content').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass: 'iradio_flat-green'
			});

			$(document).on('click', '.reset', function(e) {
				e.preventDefault();
				var desc = $(this).data('desc');
				$('.' + desc).iCheck('uncheck');
			});

		});
	</script>
</body>

</html>