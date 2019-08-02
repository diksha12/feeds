<?php
include("config.php");
	$stmt1 =mysqli_query($link,"select id, name from Teams");
	$TeamId = array();
	$TeamName = array();

	while($result1=mysqli_fetch_array($stmt1, MYSQLI_ASSOC)){
		$TeamId[] = $result1['id'];
		$TeamName[] = $result1['name'];
	}
	$stmt2=mysqli_query($link,"select id, name from series");
	$SeriesId = array();
	$SeriesName = array();

	while($result2=mysqli_fetch_array($stmt2, MYSQLI_ASSOC)){
		$SeriesId[] = $result2['id'];
		$SeriesName[] = $result2['name'];
	}

if (isset($_POST['TeamId']) && isset($_POST['SeriesId']) && isset($_POST['FormatId'])) 
{
	echo "working";
	$result1=mysqli_query($link,"select * from series_format_type where id=".$_REQUEST['FormatId']);
	$row1=mysqli_fetch_array($result1, MYSQLI_BOTH);
	$result2=mysqli_query($link,"select * from series_type where id=".$_REQUEST['SeriesId']);
	$row2=mysqli_fetch_array($result2, MYSQLI_BOTH);
	mysqli_query($link,"insert into series (name, location, country,format_id,format_name, series_type_id, series_type_name,created_by,datetime_created) values('".$_POST['SeriesName']."','".$_POST['Location']."','".$_POST['Country']."','".$_POST['FormatId']."','".$row1['name']."','".$_POST['SeriesId']."','".$row2['name']."','1','".$timenow."' )");
	if(mysqli_error($link)){
		echo mysqli_error($link);
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Squads</title>
 	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> 
	<link rel="stylesheet" type="text/css" href="css/index.css">
 	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
</head>
<body>

<div class="form-style-8">
  <h2>Add The Squads Details</h2>
  <form action="squads.php" method="POST" id="results">
    <label>Current Team</label>
	<select name="TeamId">
		<?php for ($i=0; $i < sizeof($TeamId) ; $i++) { ?>
		  <option id=<?php echo $TeamId[$i]; ?> value= <?php echo $TeamId[$i]; ?>><?php echo $TeamName[$i]; ?></option>
		 <?php } ?>
	</select> 
    <label>Current Series</label>
	<select name="SeriesId">
		  <?php for ($i=0; $i < sizeof($SeriesId) ; $i++) { ?>
		  <option id=<?php echo $SeriesId[$i]; ?> value= <?php echo $SeriesId[$i]; ?>><?php echo $SeriesName[$i]; ?></option>
		 <?php } ?>
	</select> 
<!-- 		<select id="country"></select> -->
	<br>
    <input id="submitFormData" onclick="SubmitFormData();" type="submit" name="submit" value="Submit">
  </form>
</div>

</body>
</html>

<script type="text/javascript">
			$(document).ready(function() {
				// var country = ["Australia", "Bangladesh", "Denmark", "Hong Kong", "Indonesia", "Netherlands", "New Zealand", "South Africa"];
				// $("#country").select2({
				//   data: country
				// });
			function SubmitFormData() {
				alert("working");
		    var TeamId = $("#TeamId").val();
		    var SeriesId = $("#SeriesId").val();
		    alert(TeamId);
		    $.post("squads.php", { TeamId: TeamId, SeriesId: SeriesId },
		    function(data) {
			 $('#results').html(data);
			 // $('#myForm')[0].reset();
    });
}
    });
		</script>