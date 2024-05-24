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
    <title>Report </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            #toast-container {
              position: fixed;
              top: 220px;
              left: 700px;
              background-color: rgba(0, 0, 0, 0.7);
              color: #fff;
              padding: 10px 20px;
              border-radius: 5px;
              display: none;
            }

        </style>
</head>

<body class="app sidebar-mini">

<?php include 'navigation.php';?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-receipt"></i>Admin Report</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Report</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h2 class="page-header"><i class="bi bi-globe"></i>Job Allo. Report</h2>
                            </div> 
                        </div>
                        <div class="row invoice-info">
                            <div class="col-4">From
                                <address><strong>Job Allo.</strong><br>Maseno <br>Email: joballo@gmail.com</address>
                            </div>
                            <div class="col-4">To
                                <address><strong><?php echo $username; ?></strong><br>Maseno <br>Email: <?php echo $username;?>@gmail.com</address>
                            </div> 
                        <div class="row">

                            <div class="col-12 table-responsive">



                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Task Name</th>
                                            <th>No. Of Works</th>
                                            <th>Description</th>
                                            <th>Profession</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                    <?php foreach ($tasks as $task): ?>
                      <tr>
                        <td><?php echo $task['task_name']; ?></td>
                        <td><?php echo $task['number_of_works']; ?></td>
                        <td><?php echo $task['task_description']; ?></td>
                        <td><?php echo $task['profession']; ?></td>
 

                      </tr>
                    <?php endforeach; ?>
                                    </tbody>


                                </table>
                            </div>
                        </div>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-end"><a class="btn btn-primary" href="javascript:window.print();"><i
                                        class="bi bi-printer me-2"></i> Print</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <script>
  function showToast() {
  var toastContainer = document.getElementById('toast-container');
  toastContainer.textContent = 'This is a toast message!';
  toastContainer.style.display = 'block';

  setTimeout(function() {
    toastContainer.style.display = 'none';
  }, 3000);
  }
    </script>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
    </script>
</body>

</html>