<?php 
include 'db.php';

session_start(); 
$error ="";
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$profession = $_SESSION['profession'];
$user_type = $_SESSION['user_type'];
$created_at = $_SESSION['created_at'];


if(!isset($_SESSION['username']))
{
	header("location:page-login.php");
}

 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description"
        content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description"
        content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <title>Task creation</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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
                <h1><i class="bi bi-ui-checks"></i> Tasks</h1>
                        <p>create task</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item">Tasks</li>
                <li class="breadcrumb-item"><a href="#">create task</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12 ">



                <div class="tile">

                    <div class="tile-body">
                        <form class="form-horizontal" id = "createForm">
            <div id="toast-container" ></div>

                            <div class="mb-3 row">
                                <label class="form-label col-md-3">Task Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="task_name"
                                        placeholder="Enter Task Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-md-3">Number of Works</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="number" name="number_of_works"
                                        placeholder="Number of Works ">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-md-3">Task Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="task_description" rows="4"
                                        placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label col-md-3">Profession</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="profession" name="profession">
                                        <option value="Electrical Engineering">Electrical Engineering</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                        <option value="Service Engineering">Service Engineering</option>
                                        <option value="Communication Engineering">Communication Engineering</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-3">
                                        <button onclick="submitForm()" class="btn btn-primary" type="button"><i
                                                class="bi bi-check-circle-fill me-2"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
  function submitForm(){
    var form = document.getElementById('createForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST','process/createTask.php' , true);
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status <300){
 

        if(xhr.responseText == "Task Created Success"){

            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';
            setTimeout(function() {
            toastContainer.style.display = 'none';
            window.location.href ="create-task.php"


            }, 2000);

            }else{

            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';
            setTimeout(function() {
            toastContainer.style.display = 'none';

            }, 2000);
            }
      }else{
        console.error("Request failed");

      }
    }
    xhr.send(formData);

  }
  </script>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>