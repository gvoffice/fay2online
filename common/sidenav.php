<div id="sideNav" class="sideNav">
		<div id="side-toggler" class="side-toggler">
					<i class="fa fa-fw fa-list"></i>
		</div>
		<a href="<?PHP echo $_SESSION['linkTemp'] ?>/admin/dashboard.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
			<a href="#" id="orders"><i class="fa fa-fw fa-cart-arrow-down"></i> Orders</a> 
			<div id="orders-side-menu" class="sub-menu">
				<div class="dropdown-divider"></div>
				<a href="<?PHP echo $_SESSION['linkTemp'] ?>/admin/orders/index.php"><i class="fa fa-fw fa-cart-arrow-down"></i> Orders Details</a>
				<div class="dropdown-divider"></div>
				<a href="<?PHP echo $_SESSION['linkTemp'] ?>"><i class="fa fa-fw fa-plus-circle" style="color: white"></i> Add New Order</a>
				<div class="dropdown-divider"></div>
			</div>
			<a href="#"><i class="fa fa-fw fa-product-hunt"></i> Products</a>
			
			<a href="logout.php"><i class="fa fa-fw fa-truck"></i> Delivery</a>
			
			<a id="reports" href="#"><i class="fa fa-fw fa-file"></i> Reports</a>
			<div id="reports-side-menu" class="sub-menu">
				<a href="#"><i class="fa fa-fw fa-cart-arrow-down"></i> Orders Report</a>
				<a href="#"><i class="fa fa-fw fa-cart-arrow-down"></i> Products Report</a>
			</div>
			
			<a href="logout.php"><i class="fa fa-fw fa-times-circle"></i> Logout</a>
			
		</div>