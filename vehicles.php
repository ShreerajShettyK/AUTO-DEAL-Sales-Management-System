<?php 
$page='vehicles'; 
include("header.php");
?>
<?php 
$res= mysqli_query($con,"SELECT * FROM vehicle");
$query_parent = mysqli_query($con,"SELECT * FROM manufacturer");
?>
<?php
if(isset($_POST['submit']))
{
	$manufacturer_name =  ($_POST['manufacturer_name']);
	$model_name =  ($_POST['model_name']);
	//$category =  ($_POST['category']);
	$b_price =  ($_POST['b_price']);
	$mileage =  ($_POST['mileage']);
	$add_date =  ($_POST['add_date']);
	$status =  "Available";
	$registration_year =  ($_POST['registration_year']);
	$insurance_id =  ($_POST['insurance_id']);
	$gear =  ($_POST['gear']);
	$doors =  ($_POST['doors']);
	$seats =  ($_POST['seats']);
	$tank =  ($_POST['tank']);
	$e_no = ($_POST['e_no']);
	$c_no = ($_POST['c_no']);
	$v_color = ($_POST['v_color']);	
		if(mysqli_query($con,"INSERT INTO vehicle(v_color,e_no,c_no,manufacturer_name,model_name,b_price,mileage,add_date,status,registration_year,insurance_id,gear,doors,seats,tank) VALUES('$v_color','$e_no','$c_no','$manufacturer_name','$model_name','$b_price','$mileage','$add_date','$status','$registration_year','$insurance_id','$gear','$doors','$seats','$tank')"))
		{
			?>
			<script>document.location = 'vehicles.php';</script>
			<?php
		}
		else
		{
			?>
			<script>alert('Error while Inserting data!!Duplicate Data Provided');</script>
			<?php
		}			
}


?>

<html>
<body>

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
				<br>
		</div>		
			<div id="myModal" class="modal fade" >		
			<div class="modal-dialog modal-lg">
			    <div class="modal-content"></div></div>
			</div>
			
	<!-- Modal Insert Vehicle -->
	<div class="modal fade" id="insert" role="dialog" aria-labelledby="insert" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<h4 class="modal-title custom_align" id="Heading">Add New Vehicle</h4>
				</div>
			<form class="form-horizontal" method="post" enctype="multipart/form-data">  
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
					        <label>Vehicle Manufacturer</label>
							<select class="form-control" name="manufacturer_name" id="parent_cat">
								<?php while($row = mysqli_fetch_array($query_parent)): ?>
								<option value="<?php echo $row['manufacturer_name']; ?>"><?php echo $row['manufacturer_name']; ?></option>
								<?php endwhile; ?>
							</select>
						</div>
						<div class="col-xs-6">
							<label>Vehicle Model</label>
							<input type="text"class="form-control" name="model_name" placeholder="Existing Model"required>
						    </div>
					</div>
					<br>
						
					<div class="row">
					    <div class="col-xs-6">
						 <input type="text"class="form-control" name="v_color" placeholder="Color"required>
						</div>
						<div class="col-xs-6">
						      <input type="number" step="any" class="form-control" name="b_price" placeholder="Buying Price" required>
						</div>
					</div>	
						<br>
					<div class="row">
						<div class="col-xs-6">
						<br>
						 <input class="form-control" name="gear" placeholder="Gear Mode-Auto/Manual" required>
						</div>
						<div class="col-xs-6">
						<br>
						 <input type="number" step="any" class="form-control" name="mileage" placeholder="Mileage(km)" required>
						</div>
					</div>
							
						<br>
					<div class="row">
						<div class="col-xs-6">
						<br>
						 <input class="form-control" name="e_no" placeholder="6 Digit - Engine Number" required>
						</div>
						<div class="col-xs-6">
						<br>
						 <input class="form-control" name="e_no" placeholder="17 Digit - Chassis Number" required>
						</div>
					</div>
							
						<br>
						
					<div class="row">
						<div class="col-xs-6">
						<label>Add Date</label>
						 <input type="Date"class="form-control" name="add_date"  value="<?php echo date("Y-m-d"); ?>" required>
						</div>
						<div class="col-xs-6">
						<br>
						 <input type="number" class="form-control" name="doors" placeholder="No of Doors" required>
						</div>
					</div>
							
						<br>

					<div class="row">
						<div class="col-xs-6">
							<br>
						 <input type="number"class="form-control" name="registration_year" placeholder="Registration Year"required>
						</div>
						<div class="col-xs-6">
						<br>
						 <input type="number" class="form-control" name="insurance_id" placeholder="Insurance ID" required>
						</div>
					</div>
							
							<br>

					<div class="row">
						<div class="col-xs-6">
						 <input type="number"class="form-control" name="seats" placeholder="No of seats"required>
						</div>
						<div class="col-xs-6">
						 <input type="number" step="any" class="form-control" name="tank" placeholder="Tank Capacity(litters)" required>
						</div>
					</div>
						<br>
						</div>
							<div class="modal-footer ">
								<button type="submit" name="submit" id="submit" class="btn btn-success btn-lg" style="width: 100%;">Confirm</button>   
							</div>
						</form> 
						</div>
					</div> <!--end of modal content and dialog --> 
				</div>
				
				
				
				<!-- modal for selling the vehicle -->
					
		<div class="row"><br>
			<div class="col-lg-12">
				<a data-toggle="modal" data-target="#insert" href="#" class="btn btn-primary">Add New Vehicle</a><br><br>
			</div> 
		</div>
	
		 <table id="example" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
             <tr>
                <th>Vehicle id</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Adding date(m/d/Y)</th>
                <th>Selling date</th>
                <th>Buying</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
             <?php
            $i = 1;
            while ($vehicle = mysqli_fetch_assoc($res))
			 { ?>
              <tr class="success">
                <td><?php echo $vehicle['v_id']; ?></td>
                <td><?php echo $vehicle['model_name']; ?></td>
                <td><?php echo $vehicle['manufacturer_name']; ?></td>
                <td><?php $date = new DateTime($vehicle['add_date']); echo $date->format('m/d/Y'); ?></td>
                <td><?php if($vehicle['sold_date']=== NULL){ echo 'NULL'; }else{ $date = new DateTime($vehicle['sold_date']); echo $date->format('m/d/Y'); }?></td>
                <td><?php echo $vehicle['b_price']; ?></td>
                <td><span class="badge badge-dark"><?php echo $vehicle['status']; ?></span></td>
                <td width=200px>
	
					<a href="#" class="btn btn-success btn-xs"<?php if($vehicle['status']!="Available") echo 'style="display:none"';  ?>>Sell</a>
                    <a href="Actions.php?action=v_delete&id=<?php echo $vehicle['v_id']; ?>" class="btn btn-danger btn-xs" <?php if($userRow['u_type']!="Admin"){echo 'style="display:none"';} ?>  >Delete</a>
					
				</td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table>
	 </div><!--/.col-->
	 
	 
	 <script type="text/javascript">
$(document).ready(function() {
    
	$("#parent_cat").change(function() {
		$(this).after();
		$.get('Actions.php?action=v_cat & parent_cat=' + $(this).val(), function(data) {
			$("#sub_cat").html(data);
			$('#loader').slideUp(200, function() {
				$(this).remove();
			});
		});	
    });

});
</script>
</body>

</html>
