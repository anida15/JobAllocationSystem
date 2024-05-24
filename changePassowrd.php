<?php 
include 'db.php';

session_start(); 

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$profession = $_SESSION['profession'];
$created_at = $_SESSION['created_at'];
$user_type = $_SESSION['user_type'];

if(!isset($_SESSION['username']))
{
    header("location:page-login.php");
    exit();  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        #toast-container {
            position: absolute;
            top: 30%;
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
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
                    <div class="info"><img class="user-img" src="https://randomuser.me/api/portraits/men/1.jpg">
                        <h4><?php echo $username ; ?></h4>
                        <p><?php echo $profession; ?></p>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-bs-toggle="tab">change Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="user-timeline">
                        <div class="timeline-post">
                            <div class="post-media"><a href="#"><img src="https://randomuser.me/api/portraits/men/1.jpg"></a>
                                <div class="content">
                                    <h5><a href="#"><?php echo $username ; ?></a></h5>
                                    <p class="text-muted"><small>Registered On: <?php echo $created_at; ?></small></p>
                                </div>
                            </div>
                            <div class="post-content">
                                <form id="updateForm" method="post">

                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="submitForm()">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </main>
    <script>
    function submitForm() {
        var newPassword = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('confirm_password').value;


        // Client-side validation
        if (newPassword !== confirmPassword) {
            alert("Error: New password and confirm password do not match.");
            
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'process/sendChangePassword.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {

                alert(xhr.responseText);
                window.location.href = "changePassowrd.php";
                
            } 
        };
        xhr.send('new_password=' + encodeURIComponent(newPassword) + '&confirm_password=' + encodeURIComponent(confirmPassword));
    }
</script>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
