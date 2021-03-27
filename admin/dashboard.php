<?PHP 
session_start();
if (isset($_SESSION['uname'])){
	$usr_name = $_SESSION['uname'];
	}
else {
	header("location: login.php?session=timeout");
}
$p_level = "../"
?>
<?PHP include('../common/dbconnect.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<?PHP include('../common/header.html'); ?>
	<link rel="stylesheet" href="../common/dashboard.css">
	<link rel="stylesheet" href="../common/sidebar.css">
	<script type="text/javascript" src="../common/sidenav.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		<?php
							
	$sqltops = "SELECT * FROM `product` ORDER BY `product`.`itm_ord_count` DESC limit 10;";
	$result_tops = $conn->query($sqltops);	
							
				while ($row_tops = $result_tops->fetch_assoc()){			
						
					echo	"['".$row_tops['itm_name']."', ".$row_tops['itm_ord_count']." ],";
					
								
								
				}
							?>
          
        ]);

        var options = {
          //title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
<title>Dasboard</title>
</head>

<body>
	<header class="sticky" style="height: 45px;
								  width: 100%;
								  background-color: #E7E5F5;">
	<div class="headerBody" style="display: inline;"><h3>Welcome <?PHP echo strtoupper($usr_name) ?></h3></div>
		<button type="button" class="btn btn-secondary"  style="display: inline;position: absolute;right: 2px;top: 2px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
</svg>
             <span class="badge badge-danger" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, 'sans-serif'">8</span> </button>
	</header>
	<div class="container contents">
	
	<div class="wrapper">
		
		<?PHP include('../common/sidenav.php') ?>
		
		<div id="content">
		<div id="cardRows" class="row"> <!--first row-->
			<div id="cardOrders" class="col-md m-1 p-2 rounded">
					<div class="card text-white bg-info mb-3"  style="box-shadow: 5px 5px 5px grey;">
					  <div class="card-header"><h5>Total Orders</h5></div>
					  <div class="card-body">
					   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg>
						  	<h1 id="cardOrders_text" style="display: inline; position: absolute;right: 0;margin-right: 20px" class="ml-auto"><?PHP include('cards/todayorders.php') ?></h1>

					  </div>
											<div class="card-footer">
											<a href="#" class="text-light">view more...</a>
											</div>
					</div>
			</div>
			<div id="cardSales" class="col-md m-1 p-2 rounded">
				<div class="card text-white bg-info mb-3"  style="box-shadow: 5px 5px 5px grey;">
				  <div class="card-header"><h5>Total Sales</h5></div>
				  <div class="card-body">
				   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
</svg><h1 id="cardSales_text" style="display: inline; position: absolute;right: 0;margin-right: 20px" class="ml-auto"><?PHP include('cards/todaysales.php') ?></h1>

				  </div>
										<div class="card-footer">
										<a href="#" class="text-light">view more...</a>
										</div>
				</div>
			</div>
			<div id="cardCustomers" class="col-md m-1 p-2 rounded">
					<div class="card text-white bg-info mb-3" style="box-shadow: 5px 5px 5px grey;">
					  <div class="card-header"><h5>Total Customers</h5></div>
					  <div class="card-body">
						<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
</svg><h1 id="cardCustomers_text" style="display: inline; position: absolute;right: 0;margin-right: 20px" class="ml-a	uto"><?PHP include('cards/totalcustomers.php') ?></h1>

					  </div>
											<div class="card-footer">
											<a href="#" class="text-light">view more...</a>
											</div>
					</div>
								</div>
			</div>
		<div id="StatsRow" class="row"> <!--Second row-->
			<div id="monthlyStats" class="col-md">
				<div class="card"  style="box-shadow: 5px 5px 5px grey;">
					<div class="card-header">Top 10 Product Sales of the Month</div>
					<div class="card-body">
					<div id="chart_div"></div>
					</div>
				</div>
			</div>
			<div id="latestOrders" class="col-md"  style="box-shadow: 5px 5px 5px grey;">
				<div class="card">
					<div class="card-header">Latest Orders</div>
					<div class="card-body" style="overflow-x: scroll">
						<table class="table table-hover table-sm">
						<thead>
							<th>Date</th>
							<th>Ord. No.</th>
							<th>Name</th>
							<th>Status</th>
							</thead>
							<tbody>
							<?PHP 
								$sql_loCard = "SELECT * FROM `ord` where ord_canceled = 0 ORDER BY `ord`.`ord_Date` DESC LIMIT 5";
								$result_loCard = $conn->query($sql_loCard);
								while ($row_loCards = $result_loCard->fetch_array()){
									echo "<tr>
											<td nowrap style='background;'>".$row_loCards['ord_Date']."</td>
											<td nowrap>".$row_loCards['ord_ID']."</td>
											<td nowrap>".$row_loCards['ord_name']."</td>
											<td nowrap>".$row_loCards['ord_fullfilled']."</td>
									</tr>
									";
																	
								}
								?>
							</tbody>
						</table>
					<div id="chart_div"></div>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div><!-- end of wrapper -->
	</div><!-- end of container -->
</body>
</html>
<?PHP $conn->close(); ?>