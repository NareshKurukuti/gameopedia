<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MANAGE</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class=""><a href="employees.php"><i class="fa fa-users"></i> <span>Employees</span></a></li>
      <li class=""><a href="messages.php"><i class="fa fa-tasks"></i> <span>Messages</span></a></li>
      <li class=""><a href="options.php"><i class="fa fa-black-tie"></i> <span>Voting Options</span></a></li>
      <li class=""><a href="votes.php"><span class="glyphicon glyphicon-lock"></span> <span>Messages Voting History</span></a></li>
      <li class=""><a href="ballot.php"><i class="fa fa-file-text"></i> <span>Ballot Preview</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>