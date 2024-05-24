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


$sql = "SELECT * FROM users";
$result =$conn->query($sql);
$numUsers = $result->num_rows;

if ($user_type != 'Admin'){ 

$sql = "SELECT * FROM task_allocated WHERE user_id=$user_id";
$results =$conn->query($sql);
$numTask = $results->num_rows;


$sql = "SELECT * FROM task_allocated WHERE user_id=$user_id AND task_completion_status = 'YES'";
$results =$conn->query($sql);
$numCompletedTask = $results->num_rows;


$sql = "SELECT * FROM task_allocated WHERE user_id=$user_id AND task_completion_status = 'NO'";
$resultprogress =$conn->query($sql);
$numProgressTask = $resultprogress->num_rows;



$sql = "SELECT * FROM task_allocated ";
$results =$conn->query($sql);
$numTotalTask = $results->num_rows;

}else {
  $sql = "SELECT * FROM task_allocated  ";
$results =$conn->query($sql);
$numTask = $results->num_rows;


$sql = "SELECT * FROM task_allocated WHERE  task_completion_status = 'YES'";
$results =$conn->query($sql);
$numCompletedTask = $results->num_rows;


$sql = "SELECT * FROM task_allocated WHERE   task_completion_status = 'NO'";
$resultprogress =$conn->query($sql);
$numProgressTask = $resultprogress->num_rows;



$sql = "SELECT * FROM task_allocated ";
$results =$conn->query($sql);
$numTotalTask = $results->num_rows;

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
    <title>Job Allocation</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="app sidebar-mini">


<?php include 'navigation.php';?>

<?php  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-speedometer"></i> Profession Distribution </h1>
          <p>Welcome <?php  echo $username; ?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="#">Profession</a></li>
        </ul>
      </div>
      <div class="row">
      <?php if ($user_type == 'Admin'){ ?>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b><?php echo $numUsers; ?></b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon bi bi-heart fs-1"></i>
            <div class="info">
              <h4>Profession</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon bi bi-star fs-1"></i>
            <div class="info">
              <h4>Allocations</h4>
              <p><b><?php echo $numTotalTask ; ?></b></p>
            </div>
          </div>
        </div>
        <?php } ?>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon bi bi-folder2 fs-1"></i>
            <div class="info">
              <h4>Assigments</h4>
              <p><b><?php echo $numTask; ?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Profession task distribution</h3>
            <div class="ratio ratio-16x9">
              <div id="salesChart"></div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    <script type="text/javascript">
      const salesData = {
      	xAxis: {
      		type: 'category',
      		data: ['Electrical', 'Computer', 'Mechanical', 'Serviceg', 'Communication' ]
      	},
      	yAxis: {
      		type: 'value',
      		axisLabel: {
      			formatter: '{value}'
      		}
      	},
      	series: [
      		{
      			data: [2, 4, 8, 16, 32, 64, 128],
      			type: 'line',
      			smooth: true
      		}
      	],
      	tooltip: {
      		trigger: 'axis',
      		formatter: "<b>{b0}:</b> ${c0}"
      	}
      }
      
      const supportRequests = {
      	tooltip: {
      		trigger: 'item'
      	},
      	legend: {
      		orient: 'vertical',
      		left: 'left'
      	},
      	series: [
      		{
      			name: 'Task Requests',
      			type: 'pie',
      			radius: '50%',
      			data: [
      				{ value: <?php echo $numProgressTask; ?>, name: 'In Progress' },
      				{ value: <?php echo $numCompletedTask ; ?>, name: 'Complete' }
      			],
      			emphasis: {
      				itemStyle: {
      					shadowBlur: 10,
      					shadowOffsetX: 0,
      					shadowColor: 'rgba(0, 0, 0, 0.5)'
      				}
      			}
      		}
      	]
      };
      
      const salesChartElement = document.getElementById('salesChart');
      const salesChart = echarts.init(salesChartElement, null, { renderer: 'svg' });
      salesChart.setOption(salesData);
      new ResizeObserver(() => salesChart.resize()).observe(salesChartElement);
      
      const supportChartElement = document.getElementById("supportRequestChart")
      const supportChart = echarts.init(supportChartElement, null, { renderer: 'svg' });
      supportChart.setOption(supportRequests);
      new ResizeObserver(() => supportChart.resize()).observe(supportChartElement);
    </script>
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