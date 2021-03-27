<?PHP 
session_start();

if (isset($_SESSION['uname'])){
	$usr_name = $_SESSION['uname'];
	}
else {
	header("location: ../index.php?session=timeout");
}
$p_level = "../../";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<?PHP include('../../common/header.html'); ?>
	<link rel="stylesheet" href="../../common/dashboard.css">
	<link rel="stylesheet" href="../../common/sidebar.css">
	<script type="text/javascript" src="../../common/sidenav.js"></script>
	<script type="text/javascript" src="data.js"></script>
	<script type="text/javascript" src="functions.js"></script>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	
	
<title>Dasboard</title>
</head>

<body>
	<header class="sticky" style="height: 45px;width: 100%;background-color: #E7E5F5;">
	<div class="headerBody" style="display: inline;"><h3>Welcome <?PHP echo strtoupper($usr_name) ?></h3></div>
		<button type="button" class="btn btn-secondary"  style="display: inline;position: absolute;right: 2px;top: 2px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
</svg>
             <span class="badge badge-danger" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, 'sans-serif'"><?php echo "55"; ?></span> </button>
	</header>
	<div class="container">
	
	<div class="wrapper">
		
		<?PHP include('../../common/sidenav.php') ?>
		
		<div class="content ml-4">
		
		<div id="filters" class="row mt-3"> <!--first row-->
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#filter_options" aria-expanded="false" aria-controls="filter_options">
    Filters
  </button>
  
  			<div class="collapse" id="filter_options">
			 
			
			<div class="alert alert-info list-inline-item">Select orders <select class="form-control-sm" id="r_status">
				
				<option value="all">All Orders</option>
				<option class="list-group-item-success" value="Delivered">Delivered Orders</option>
				<option class="list-group-item-info" value="Processed">Processed Orders</option>
				<option class="list-group-item-warning" value="Pending">Pending Orders</option>
				<option class="list-group-item-danger" value="Cancelled">Cancelled Orders</option>
				
			</select> </div>
			
			<div class="alert alert-info list-inline-item">Results per page <select class="form-control-sm" id="r_p_p">
				<option>5</option>
				<option>10</option>
				<option>15</option>
				<option>20</option>
				<option>25</option>
				<option>30</option>
				<option>35</option>
				<option>40</option>
			</select> </div>
			
			<div class="alert alert-info list-inline-item">Display <Select class="form-control-sm ml-2 filter_orders" id="r_o_by"> 
				
				<option value="DESC">Newest to oldest</option>
				<option value="ASC">Oldest to newest</option>
				<option></option>
				</select>
			</div>
			<div class="alert alert-info list-inline-item">
				<label for="from_date">From Date:</label>
				<input type="date" id="from_date" class="form-control" required>
				<label for="to_date">To Date:</label>
				<input type="date" id="to_date" class="form-control" required>
				</div>
			<button type="button" id="apply_fltr" class="btn btn-block btn-success">Apply Filter</button>
			</div>
			
			</div>
		<div id="dataTable" class="row overflow-auto"> <!--Second row-->
			<div id="results"></div>
			<?PHP include('all.php') ?>
            <div id="loader"></div>
			</div>
		</div><!-- end of contents -->
		</div><!-- end of wrapper -->
	</div><!-- end of container -->
	
	<?PHP include('ajax_scripts.php')  ?>
	
</body>
</html>
