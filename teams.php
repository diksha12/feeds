<?php
include("config.php");
if (!empty($_POST['TeamName']) && !empty($_POST['TeamShortName'])) 
{
	if(!$_POST['Remark']){
		$_POST['Remark'] = "";
	}
	mysqli_query($link,"insert into teams (name, short_name, remarks, created_by,datetime_created) values('".$_POST['TeamName']."','".$_POST['TeamShortName']."','".$_POST['Remark']."','1','".$timenow."' )");
	$TeamName = $_POST['TeamName'];
	header("Location: popupwindow.php?format=teams&&values=".$_POST['TeamName']);
	// echo "<script type='text/javascript'>alert('$TeamName added');</script>";
	if(mysqli_error($link)){
		echo mysqli_error($link);
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Team Details</title>
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<div class="form-style-8">
  <h2>Fill The Team Details</h2>
  <form action="teams.php" method="POST" >
    <input type="text" name="TeamName" placeholder="Team Name" />
    <input type="text" name="TeamShortName" placeholder="Team Short Name" />
    <input type="text" name="Remark" placeholder="remark">
    <a href="index.php">back</a>
    <input type="submit" name="submit" value="Submit" style="float: right;">
  </form>
</div>

</body>
</html>
