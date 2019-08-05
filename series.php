<?php
include("config.php");
	$stmt1=mysqli_query($link,"select id, name from series_type");
	$SeriesTypeId = array();
	$SeriesTypeName = array();

	while($result1=mysqli_fetch_array($stmt1, MYSQLI_ASSOC)){
		$SeriesTypeId[] = $result1['id'];
		$SeriesTypeName[] = $result1['name'];
	}

	$stmt2=mysqli_query($link,"select id, name from series_format_type");
	$FormatId = array();
	$FormatName = array();

	while($result2=mysqli_fetch_array($stmt2, MYSQLI_ASSOC)){
		$FormatId[] = $result2['id'];
		$FormatName[] = $result2['name'];
	}
if (isset($_POST['SeriesName']) && isset($_POST['Location']) && isset($_POST['Country']) && isset($_POST['FormatId']) && isset($_POST['SeriesId'])) 
{
	$result1=mysqli_query($link,"select * from series_format_type where id=".$_REQUEST['FormatId']);
	$row1=mysqli_fetch_array($result1, MYSQLI_BOTH);
	$result2=mysqli_query($link,"select * from series_type where id=".$_REQUEST['SeriesId']);
	$row2=mysqli_fetch_array($result2, MYSQLI_BOTH);
	mysqli_query($link,"insert into series (name, location, country,format_id,format_name, series_type_id, series_type_name,created_by,datetime_created) values('".$_POST['SeriesName']."','".$_POST['Location']."','".$_POST['Country']."','".$_POST['FormatId']."','".$row1['name']."','".$_POST['SeriesId']."','".$row2['name']."','1','".$timenow."' )");

	header("Location: popupwindow.php?format=series&&values=".$_POST['SeriesName']);
if(mysqli_error($link)){
		echo mysqli_error($link);
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>SERIES</title>
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<div class="form-style-8">
  <h2>Fill The Series Details</h2>
  <form action="series.php" method="POST" >
    <input type="text" name="SeriesName" placeholder="Series Name" />
    <input type="text" name="Location" placeholder="Location" />
    <label>Country</label>
	<select name="Country">
		  <option value="India">India</option>
		  <option value="Bangladesh" selected>Bangladesh</option>
		  <option value="UK">UK</option>
	</select> 
    <label>Format Name</label>
	<select name="FormatId">
		  <?php for ($i=0; $i < sizeof($SeriesTypeId) ; $i++) { ?>
		  <option value= <?php echo $SeriesTypeId[$i]; ?>><?php echo $SeriesTypeName[$i]; ?></option>
		<?php } ?>
	</select> 
    <label>Series Type</label>
	<select name="SeriesId">
		<?php for ($i=0; $i < sizeof($FormatId) ; $i++) { ?>
		  <option value= <?php echo $FormatId[$i]; ?>><?php echo $FormatName[$i]; ?></option>
		<?php } ?>
	</select> 
	<a href="index.php">back</a>
    <input type="submit" name="submit" value="Submit" style="float: right;">
  </form>
</div>

</body>
</html>
