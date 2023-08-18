<?php $page='model';
    include("header.php");
?>
<?php
if(isset($_POST['update1']))
{	
	$model = ($_POST['mod']);
	$manufac = ($_POST['manu']);
	
	if(mysqli_query($con,"INSERT INTO model(model_name,manufacturer_name) VALUES('$model','$manufac')"))
		{
			?>
			<script>alert('Successfully added new model.');</script>
			<?php 
		}
		else
		{
			?>
			<script>alert('error while Adding!..');</script>
			<?php
		}	
}
?>
<?php
if(isset($_POST['update2']))
{
	$manufac2 = ($_POST['manu2']);
	
	if(mysqli_query($con,"INSERT INTO manufacturer(manufacturer_name) VALUES('$manufac2')"))
		{
			?>
			<script>alert('Successfully added new manufacturer.');</script>
			<?php 
		}
		else
		{
			?>
			<script>alert('error while Adding!..');</script>
			<?php
		}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
</head>
<body>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	    <div class="row">
				<br>
		</div>		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Manage Vehicle Manufacturer & Model </h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<div class="panel panel-info">
					<div class="panel-heading">Vehicle Manufacturer</div>
					<div class="panel-body">
					<div id="manufacturerTableContainer" ></div>
				    </div>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="panel panel-info">
					<div class="panel-heading">Vehicle Model</div>
					<div class="panel-body">
						<div id="modelTableContainer" ></div>
				    </div>
				</div>
			</div>
			
		</div>
	</div>
    
    
	<div class="row">
			<div class="col-lg-7 col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading" style="padding-left:300px">Add New Vehicle Model</div>
					<div class="panel-body" style="padding-left: 300px;">
					<form method="post">
						<fieldset>
							<div class="form-group">
								Model name : <input class="form-control" placeholder="Model name" name="mod" type="text" required>
							</div>
							<div class="form-group">
								Manufacturer : <input class="form-control" placeholder="Manufacturer" name="manu" type="text" required>
							</div>
							<button type="submit" class="btn btn-primary" name="update1">Submit</button>
						</fieldset>
					</form>
				</div>
		    </div>
	    </div>
		<div class="col-lg-5 col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">Add New Manufacturer</div>
					<div class="panel-body">
					<form method="post">
						<fieldset>
							<div class="form-group">
								Manufacturer : <input class="form-control" placeholder="Manufacturer" name="manu2" type="text" required>
							</div>
							<button type="submit" class="btn btn-primary" name="update2">Submit</button>
						</fieldset>
					</form>
				</div>
		    </div>
	    </div>
	</div>
	<div>
		<br>
	</div>

	<script>
		$(document).ready(function () {
		    //Prepare jTable
			$('#manufacturerTableContainer').jtable({
				title: 'All Car Manufacturer',
				actions: {
					listAction: 'Actions.php?action=list',
					deleteAction: 'Actions.php?action=delete'
				},
				fields: {
					manufacturer_id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					manufacturer_name: {
						title: 'Manufacturer Name',
						width: '100%'
					}
				}
			});
			//Load manufacturer list from server
			$('#manufacturerTableContainer').jtable('load');

		});
	</script>

	<script>
		$(document).ready(function () {
		    //Prepare  all models jTable
			$('#modelTableContainer').jtable({
				title: 'All Car Model',
				actions: {
					listAction: 'Actions.php?action=listm',
					deleteAction: 'Actions.php?action=deletem'
				},
				fields: {
					model_id: {
						key: true,
						create: false,
						edit: false,
					    list: false
					},
					model_name: {
						title: 'Model Name',
						width: '25%'
					},
					manufacturer_name: {
						title: 'Manufacturer',
						width: '18%',
						options: 'Actions.php?action=listma'	
					}				
				}
			});
			$('#modelTableContainer').jtable('load');
		});
		//Load models list from server
	</script>
</body>

</html>