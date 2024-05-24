<?php 
include 'db.php';

session_start(); 
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$profession = $_SESSION['profession'];
$user_type = $_SESSION['user_type'];
$created_at = $_SESSION['created_at'];

if(!isset($_SESSION['username']))
{
	header("location:page-login.php");
}



$sql = "SELECT * FROM task";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tasks = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $tasks = array(); 
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <title>Task Data</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
            #toast-container {
              position: absolute;
              top: 50%;
              left: 50%;
              background-color: rgba(0, 0, 0, 0.7);
              color: #fff;
              padding: 10px 20px;
              border-radius: 5px;
              width:auto;
              display: none;
              transform: translate(-50%,-50%);
            }

        </style>
  </head>
  <body class="app sidebar-mini">
    
  <?php include 'navigation.php';?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Task data</h1>
          <p>Task Available</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">

            <div class="tile-body">
              <div class="table-responsive">

                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Task Name</th>
                      <th>Number of Works</th>
                      <th>Task Description</th>
                      <th>Profession</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($tasks as $task): ?>
                      <tr>
                        <td><?php echo $task['task_name']; ?></td>
                        <td><?php echo $task['number_of_works']; ?></td>
                        <td><?php echo $task['task_description']; ?></td>
                        <td><?php echo $task['profession']; ?></td>
                        <td>
                            <form method="post" class="deleteForm">
                                <input type="hidden" name="task_id" value="<?php echo $task['task_id']; ?>">
                                <button type="button" class="btn btn-danger btn-sm delete-button" data-task-id="<?php echo $task['task_id']; ?>">Delete</button>
                            </form>
                        </td>

                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
             <div id="toast-container" ></div>

              </div>
              
              <div class="row d-print-none mt-2">
                            <div class="col-12 text-end"><a class="btn btn-primary" href="javascript:window.print();"><i
                                        class="bi bi-printer me-2"></i> Print</a></div>
                        </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-button').forEach(function(button) {
            button.addEventListener('click', function() {
                var taskId = this.getAttribute('data-task-id');
                deleteTask(taskId);
            });
        });
    });

    function deleteTask(taskId) {
        var formData = new FormData();
        formData.append('task_id', taskId);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'process/deleteTask.php', true);
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                var toastContainer = document.getElementById('toast-container');
                toastContainer.textContent = xhr.responseText;
                toastContainer.style.display = 'block';
                setTimeout(function () {
                    toastContainer.style.display = 'none';
                    window.location.href = "admin-task-records.php";
                }, 1000);
            } else {
                console.error("Request failed");
            }
        };
        xhr.send(formData);
    }
</script>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>
