<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysqli_query($con,"SELECT * FROM users WHERE u_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

$ut=mysqli_query($con,"SELECT COUNT(*) as x FROM users;");
$ucount=mysqli_fetch_array($ut);


$ic=mysqli_query($con,"SELECT SUM(s_price) as y FROM vehicle;");
$icount=mysqli_fetch_array($ic);

$ut2=mysqli_query($con,"SELECT COUNT(*) as z FROM vehicle;");
$vehcount=mysqli_fetch_array($ut2);

$vt=mysqli_query($con,"SELECT COUNT(*) as p FROM customer;");
$vcount=mysqli_fetch_array($vt);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Auto-Deal Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="css/custom.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="dashboard.php"><span> Auto-Deal Management System</span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"></use></svg><?php echo "Welcome ".$userRow['f_name']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php?logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div>
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div>
		
		<a class="nav menu" href="#">
                    <img src="img/logo3.jpg" alt="" height="140" width="200" style="margin-left: 9%; margin-top: 3%; "></a>
		<br></div>
		
		<ul class="nav menu side-nav">
		
			<li class="<?php if($page=='dash'){ echo 'active'; }?>"><a href="index.php"> Dashboard</a></li>
			<?php
		if($userRow['u_type']=="Admin") 
			if($page=='emp'){
				echo '<li class="active"><a href="manage_employee.php"> Manage Employee</a></li>';
			} else {
				echo '<li><a href="manage_employee.php"> Manage Employee</a></li>';
			}
		?>
			<li class="<?php if($page=='model'){ echo 'active'; }?>"><a href="model.php">Vehicle Model</a></li>
			<li class="<?php if($page=='vehicles'){ echo 'active'; }?>"><a href="vehicles.php">Vehicle Management</a></li>
		</ul>

	</div>
	<script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="js/jquery.dataTables.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/lumino.glyphs.js"></script>
</body>
</html>