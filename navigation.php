
<header class="app-header">
      <a class="app-header__logo" href="index.html">Job Allocation</a>
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <ul class="app-nav"> 
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.php"><i class="bi bi-gear me-2 fs-5"></i> Settings</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
    <div>
      <p class="app-sidebar__user-name"><?php echo $username; ?></p>
      <p class="app-sidebar__user-designation"><?php echo $profession; ?></p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i><span class="app-menu__label">User</span><i class="treeview-indicator bi bi-chevron-down"></i></a>
      <ul class="treeview-menu">
      </ul>

      <li><a class="treeview-item" href="page-user.php"><i class="icon bi bi-circle-fill"></i> User Profile</a></li>
      <?php if ($user_type != 'Admin'){ ?>

      <li><a class="treeview-item" href="userChangeProfession.php"><i class="icon bi bi-circle-fill"></i>Change Profession</a></li>

        <li><a class="treeview-item" href="userTaskReports.php"><i class="icon bi bi-circle-fill"></i> Task Report</a></li>
        <?php } ?>

        <?php if ($user_type != 'Admin'){ ?>
        <li><a class="treeview-item" href="page-invoice.php"><i class="icon bi bi-circle-fill"></i> Invoice Page</a></li>
        <?php } ?>
        <li><a class="treeview-item"  href="changePassowrd.php" ><i class="icon bi bi-circle-fill"></i>Change Password</a></li>
        <?php if ($user_type != 'Admin'){ ?>
        <li><a class="treeview-item" href="deleteAccount.php"><i class="icon bi bi-circle-fill"></i> Delete Account</a></li>
        <?php } ?>


        <li><a class="treeview-item"  href="logout.php" ><i class="icon bi bi-circle-fill"></i>Logout</a></li>
         
    </li>
     <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-ui-checks"></i><span class="app-menu__label">Activities</span><i class="treeview-indicator bi bi-chevron-down"></i></a>
      <ul class="treeview-menu"> 

 

      </ul>
      <?php if ($user_type != 'Admin'){ ?>
        <li><a class="treeview-item" href="user-tasks-allocated.php"  ><i class="icon bi bi-circle-fill"></i>User Tasks Allocated</a></li>

        <?php } ?>

        <?php if ($user_type == 'Admin'){ ?>


         <li><a class="treeview-item" href="create-task.php" ><i class="icon bi bi-circle-fill"></i> Create Task</a></li>
        <li><a class="treeview-item"  href="admin-task-records.php" ><i class="icon bi bi-circle-fill"></i>Admin Tasks Records</a></li>
        <li><a class="treeview-item"  href="admin-task-records-reports.php" ><i class="icon bi bi-circle-fill"></i>Tasks Records Reports</a></li>
        <li><a class="treeview-item"  href="professionDistribution.php" ><i class="icon bi bi-circle-fill"></i>Profession Distribution</a></li>
        <li><a class="treeview-item"  href="professionDistribution-report.php" ><i class="icon bi bi-circle-fill"></i>Distribution Reports</a></li>
        <li><a class="treeview-item"  href="changeProfession.php" ><i class="icon bi bi-circle-fill"></i>Change User Profession</a></li>
        <li><a class="treeview-item"  href="general-user-report.php" ><i class="icon bi bi-circle-fill"></i>General users Report</a></li>

        <?php } ?>

        <li><a class="treeview-item" href="taskprogress.php"  ><i class="icon bi bi-circle-fill"></i>Task Progress</a></li>



    </li>
  </ul>
</aside>
