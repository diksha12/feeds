
<!DOCTYPE html>
<html>
<head>
	<title>Team Details</title>
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<style type="text/css">
	button{
	-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	box-shadow: inset 0px 1px 0px 0px #45D6D6;
	background-color: #2CBBBB;
	border: 1px solid #27A0A0;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 14px;
	padding: 8px 18px;
	text-decoration: none;
	text-transform: uppercase;
	}
	button:hover{
	background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
	background-color:#34CACA;
	}
	#AddMore{
		float: right;
	}
</style>
<body>
<?php
if ($_GET['form'] == "format") {?>

<div class="form-style-8">
  <h2>Fill The Format</h2>
  <form action="data.php?form=format" method="POST" >
    <input type="text" name="FormatName" placeholder="Format Name" />
    <a href="index.php">back</a>
    <input type="submit" name="submit" value="Add More" id="AddMore">
  </form>
</div>
<?php } 
if ($_GET['form'] == "seriestype") {?>

<div class="form-style-8">
  <h2>Fill The Series Type</h2>
  <form action="data.php?form=seriestype" method="POST" >
    <input type="text" name="SeriesName" placeholder="Series Name" />
    <a href="index.php">back</a>
    <input type="submit" name="submit" value="Add More" id="AddMore">
  </form>
</div>
<?php } ?>
</body>
</html>
<?php
include("config.php");
if (!empty($_POST['FormatName']) && !empty($_POST['submit'])) 
{
	mysqli_query($link,"insert into series_format_type (name) values('".$_POST['FormatName']."')");
	if(mysqli_error($link)){
		echo mysqli_error($link);
	}
}
if (!empty($_POST['SeriesName']) && !empty($_POST['submit'])) 
{
	mysqli_query($link,"insert into series_type (name) values('".$_POST['SeriesName']."')");
	if(mysqli_error($link)){
		echo mysqli_error($link);
	}
}


?>