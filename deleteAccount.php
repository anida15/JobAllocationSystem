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
}

$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
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
    <title>User Profile</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
                        <li class="nav-item"><a class="nav-link active" href="#user-timeline"
                                data-bs-toggle="tab">Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="#user-settings" data-bs-toggle="tab">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="user-timeline">
                        <div class="timeline-post">
                            <div class="post-media"><a href="#"><img
                                        src="https://randomuser.me/api/portraits/men/1.jpg"></a>
                                <div class="content">
                                    <h5><a href="#"><?php echo $username ; ?></a></h5>
                                    <p class="text-muted"><small>Registered On: <?php echo $created_at; ?></small></p>
                                </div>
                            </div>
                            <div class="post-content"> 
                              
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>username</th>
                      <th>Profession</th>
                      <th>Registartion</th>
                      <th>User Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($tasks as $task): ?>
                      <tr>
                        <td><?php echo $task['username']; ?></td>
                        
                        <td>     <?php echo $task['profession']; ?> 
 
                       </td>
                    
                        <td><?php echo $task['created_at']; ?></td>
                        <td><?php echo $task['user_type']; ?></td>
                        <td>
                            <form method="post" class="deleteForm">
                                <input type="hidden" name="user_id" value="<?php echo $task['user_id']; ?>">
                                <button type="button" class="btn btn-danger btn-sm delete-button" data-task-id="<?php echo $task['user_id']; ?>">Delete Account</button>
                            </form>
                        </td>

                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
             <div id="toast-container" ></div>
                            </div>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="user-settings">
                        <div class="tile user-settings">
                            <h4 class="line-head">Settings</h4>
                            <form class="login-form" id="updateForm" >
                                <div id="toast-container" ></div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Username</label>
                                        <input class="form-control" name="username" value="<?php echo $username; ?>"
                                            type="text">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label>Profession</label>


                                       

                                        <select class="form-control" id="profession" value="<?php echo $profession; ?>"
                                            name="profession">
                                            <option value="<?php echo $profession; ?>"><?php echo $profession; ?></option>

                                        <?php if ($user_type != 'Admin'){ ?>

                                            <option value="Electrical Engineering">Electrical Engineering</option>
                                            <option value="Computer Engineering">Computer Engineering</option>
                                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                                            <option value="Service Engineering">Service Engineering</option>
                                            <option value="Communication Engineering">Communication Engineering</option>
                                        <?php } ?>

                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button  onclick="submitForm()" class="btn btn-primary" type="button"><i
                                                class="bi bi-check-circle-fill me-2"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Add event listener to all update buttons
    document.querySelectorAll('.update-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the user ID from the button's data attribute
            var userIdname = this.getAttribute('data-profession-id');
            
            // Find the selected profession from the dropdown menu within the same parent container
            var selectedProfession = this.parentElement.querySelector('.profession-dropdown').value;
            

            // Call the function to update the profession
            updateProfession(userIdname, selectedProfession);
        });
    });
});

function updateProfession(userIdname, selectedProfession) {
    // Create a new FormData object to send data to server
    var formData = new FormData();
    
    // Append user ID and selected profession to FormData
    formData.append('user_id', userIdname); // Corrected from userId to userIdname
    formData.append('profession', selectedProfession);

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    
    // Configure the request
    xhr.open('POST', 'process/userUpdateProfession.php', true);
    
    // Define what to do when the response comes back
    xhr.onload = function () {
        var toastContainer = document.getElementById('toast-container');
        if (xhr.status >= 200 && xhr.status < 300) {
            // Success case
            toastContainer.textContent = xhr.responseText;
            setTimeout(function () {
                toastContainer.style.display = 'none';
                window.location.href = "userChangeProfession.php";
            }, 1000);
        } else {
            // Error case
            toastContainer.textContent = xhr.responseText;
        }
        toastContainer.style.display = 'block';
    };
    
    // Send the request with FormData
    xhr.send(formData);
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-task-id');
            deleteUser(userId);

        });
    });
});

function deleteUser(userId) { // Corrected function name here
    var formData = new FormData();
    formData.append('user_id', userId);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process/deleteAccount.php', true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';

            setTimeout(function () {
                toastContainer.style.display = 'block';
                toastContainer.textContent = '';
                toastContainer.textContent = "Destroying Session...";
    

            setTimeout(function () { 
                window.location.href = "logout.php";
            }, 4000);

            }, 1000);
            
        } else {
            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';
            setTimeout(function () {
                toastContainer.style.display = 'none';
                window.location.href = "userChangeProfession.php";
            }, 1000);
            console.error("Request failed");
        }
    };
    xhr.send(formData);
}
</script>


    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>