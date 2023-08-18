<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );

$con = mysqli_connect ("localhost","root","","vsmsphp");
if (!$con)
{
die("Could not connect: " . mysqli_error());
}
?>