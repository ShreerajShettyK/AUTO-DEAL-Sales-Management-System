<?php
try
{
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con = mysqli_connect("localhost","root","","vsmsphp"); 

	if($_GET["action"] == "list")
	{
		$result = mysqli_query($con,"SELECT * FROM manufacturer;");
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
		    $rows[] = $row;
		}
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
		
	}

	else if($_GET["action"] == "delete")
	{
		$result = mysqli_query($con,"DELETE FROM manufacturer WHERE manufacturer_id = " . $_POST["manufacturer_id"] . ";");
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	
	else if($_GET["action"] == "listm")
	{
		$result = mysqli_query($con,"SELECT * FROM model;");
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
		    $rows[] = $row;
		}
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}	

	else if($_GET["action"] == "listma")         
	{				  
		$result = mysqli_query($con,"SELECT * from manufacturer;");
		$rows = array();
		while ($row = mysqli_fetch_array($result)) {
			$eil = array();
			$eil["DisplayText"] = $row[1];
			$eil["Value"] = $row[1];
			$rows[] = $eil;
		}
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Options'] = $rows;  
		print json_encode($jTableResult);  
	}
	else if($_GET["action"] == "deletem")
	{
		$result = mysqli_query($con,"DELETE FROM model WHERE model_id = " . $_POST["model_id"] . ";");
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
		
	else if($_GET["action"] == "listu")
	{
		$result = mysqli_query($con,"SELECT u_id,u_email,f_name,l_name,u_mobile,u_type FROM users;");
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
		    $rows[] = $row;
		}
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
		
	}
	else if($_GET["action"] == "deleteu")
	{
		$result = mysqli_query($con,"DELETE FROM users WHERE u_id = " . $_POST["u_id"] . " AND su !=1 ;");
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//to delete vehicle
	else if($_GET["action"] == "v_delete")
	{
		$db = mysqli_connect('localhost', 'root', '', 'vsmsphp');
        $id = $_GET["id"];
	    mysqli_query($db,"DELETE FROM vehicle WHERE v_id=$id;");
        header('location: vehicles.php');	
	}
	else if($_GET["action"] == "v_cat")
	{
	$parent_cat = $_GET['parent_cat'];

		$query = mysqli_query($con,"SELECT * FROM model WHERE manufacturer_name = '$parent_cat'");
		while($row = mysqli_fetch_array($query)) {
			echo "<option value='$row[model_name]'>$row[model_name]</option>";
		}
	}
	
	else if($_GET["action"] == "vs_delete")
	{
	
	$id = $_GET["id"];
	
	if(mysqli_query($con,"DELETE FROM customer WHERE v_id = $id;"))
		{   
		$result = mysqli_query($con,"UPDATE vehicle SET s_price = NULL,u_id = NULL,sold_date = NULL, status = 'Available'  WHERE v_id =$id;");
			?>
			<script>document.location = 'sold.php';</script>
			<?php 
		}
		else
		{
			?>
			<script>alert('Error while Deleting...');</script>
			<?php
		}	
	}
	//Close database connection
	mysqli_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>
