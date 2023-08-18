<?php $page='emp'; 
include("header.php");
?>
<?php
if(isset($_POST['update']))
{	
	$u_email = ($_POST['u_email']);
	$f_name = ($_POST['f_name']);
	$l_name = ($_POST['l_name']);
	$u_bday = ($_POST['u_bday']);
	$u_position = ($_POST['u_position']);
	$u_address = ($_POST['u_address']);
	$u_type = ($_POST['u_type']);
	$u_pass = md5($_POST['u_pass']);
	$u_gender = ($_POST['u_gender']);
	$u_mobile = ($_POST['u_mobile']);
	
	if(mysqli_query($con,"INSERT INTO users (u_mobile,u_gender,u_pass,u_address,f_name,l_name,u_bday,u_position,u_type,u_email)VALUES('$u_mobile','$u_gender','$u_pass','$u_address','$f_name','$l_name','$u_bday','$u_position','$u_type','$u_email')"))
		{
			?>
			<script>alert('Successfully registered ');</script>
			<?php 
		}
		else
		{
			?>
			<script>alert('error while Adding! Check email/Server...');</script>
			<?php
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
<link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="Scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script></head>
<body>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	    <div class="row">
				<br>
		</div>			
		<div class="row">
			<div class="col-lg-5 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading">Add New Employee</div>
					<div class="panel-body">
					<form method="post">
						<fieldset>
							<div class="form-group">
								Email : <input class="form-control" placeholder="E-mail" name="u_email" id="username" type="email" required>
							</div>
							<div class="form-group">
								Password : <input class="form-control" placeholder="Password" name="u_pass" type="password" required>
							</div>
							<div class="form-group">
								First Name : <input class="form-control" placeholder="First Name" name="f_name" type="text"  required>
							</div>
							<div class="form-group">
								Last Name : <input class="form-control" placeholder="Last Name" name="l_name" type="text" required>
							</div>
							<div class="form-group">
								Mobile : <input class="form-control" placeholder="Mobile" name="u_mobile" type="number"  required>
							</div>
							<div class="form-group">
								Position : <input class="form-control" placeholder="Position" name="u_position" type="text" required>
							</div>
							<div class="form-group">
								Gender : <input type="radio" name="u_gender" value="Male"> Male
										 <input type="radio" name="u_gender" value="Female"> Female
											
							</div>
							<div class="form-group">
								Date of Birth:<input type="date" name="u_bday">
							</div>
							<div class="form-group">
								Address: <input type="text" class="form-control"  name="u_address" required>
							</div>
							<div class="form-group">
								User Type: 
										   <input type="radio" name="u_type" value="Admin"> Admin
										   <input type="radio" name="u_type" value="Employee"> Employee 								
							</div>
							<button type="submit" class="btn btn-primary" name="update">Submit</button>
						</fieldset>
					</form>
				</div>
				</div>
			</div>				
			<div class="col-lg-7 col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">Users List</div>
					<div class="panel-body">
					<div id="userTableContainer" ></div>
				    </div>
				</div>
			</div>		
		</div>	
    </div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable for USERS(employees) LIST
			$('#userTableContainer').jtable({
				title: 'All Users ',
				actions: {
					listAction: 'Actions.php?action=listu',
					deleteAction: 'Actions.php?action=deleteu'
				},
				fields: {
					u_id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					u_email: {
						title: 'User Email',
						width: '10%'
					},
					f_name: {
						title: 'First Name',
						width: '12%'	
					},
					l_name: {
						title: 'Last Name',
						width: '12%'	
					},
					u_mobile: {
						title: 'Mobile',
						width: '12%'	
					},
					u_type: {
						title: 'Role',
						width: '5%'	
					}				
				}
			});
			//Loading users list from db
			$('#userTableContainer').jtable('load');

		});
	</script>
</body>
</html>
