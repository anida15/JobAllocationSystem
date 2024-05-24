<?php 
include 'db.php';

session_start();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$profession = $_SESSION['profession'];
$user_type = $_SESSION['user_type'];
$created_at = $_SESSION['created_at'];

if(!isset($_SESSION['username'])) {
    header("location:page-login.php");
}

$sql = "SELECT profession, COUNT(*) AS profession_count
        FROM users
        GROUP BY profession";

$result = $conn->query($sql);

$profession_counts = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profession_counts[$row['profession']] = $row['profession_count'];
    }
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
    <title>Report</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                <h1><i class="bi bi-receipt"></i> Admin Report</h1>
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
                                <h2 class="page-header"><i class="bi bi-globe"></i> Job Allocation Report</h2>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-4">From
                                <address><strong>Job Allo.</strong><br>Maseno <br>Email: joballo@gmail.com</address>
                            </div>
                            <div class="col-4">To
                                <address><strong><?php echo $username; ?></strong><br>Maseno <br>Email: <?php echo $username;?>@gmail.com</address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tile">
                                    <h3 class="tile-title">Distribution</h3>
                                    <div class="ratio ratio-16x9">
                                        <div id="salesChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                            <table class="table table-striped">
    <thead>
        <tr>
            <th>Profession</th>
            <th>No. Of Works</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($profession_counts as $profession => $count): ?>
            <tr>
                <td><?php echo $profession; ?></td>
                <td><?php echo $count; ?></td> 
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

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    <script>
        const salesData = {
            xAxis: {
                type: 'category',
                data: ['Electrical', 'Computer', 'Mechanical', 'Serviceg', 'Communication']
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
        };

        const salesChartElement = document.getElementById('salesChart');
        const salesChart = echarts.init(salesChartElement, null, { renderer: 'svg' });
        salesChart.setOption(salesData);
        new ResizeObserver(() => salesChart.resize()).observe(salesChartElement);
    </script>
</body>
</html>
