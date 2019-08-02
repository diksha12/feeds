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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Player</title>
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<div class="form-style-8">
  <h2>Fill The Player Details</h2>
  <form action="players.php" method="POST" >
    <input type="text" name="PlayerName" placeholder="Player Name" />
	<input type="date" name="PlayerDOB" placeholder="Player Date Of Birth" />
    <input type="text" name="PlayerArea" placeholder="Player Place Of Birth"> 
    <label>Current Team</label>
	<select name="TeamId">
		<?php for ($i=0; $i < sizeof($TeamId) ; $i++) { ?>
		  <option value= <?php echo $TeamId[$i]; ?>><?php echo $TeamName[$i]; ?></option>
		 <?php } ?>
	</select> 
    <label>Current Series</label>
	<select name="SeriesId">
		  <?php for ($i=0; $i < sizeof($SeriesId) ; $i++) { ?>
		  <option value= <?php echo $SeriesId[$i]; ?>><?php echo $SeriesName[$i]; ?></option>
		 <?php } ?>
	</select> 
	<label>Player type</label>
	<select name="PlayerType">
		  <option value="Batsman">Batsman</option>
		  <option value="Bowler">Bowler</option>
		  <option value="WicketKeeper">Wicket Keeper</option>
		  <option value="AllRounder">All Rounder</option>
	</select> 
    <input type="submit" name="submit" value="Submit">
  </form>
</div>

</body>
</html>
<?php
include("config.php");
if (!empty($_POST['PlayerName']) && !empty($_POST['PlayerDOB']) && !empty($_POST['PlayerArea']) && !empty($_POST['TeamId']) && !empty($_POST['SeriesId']) && !empty($_POST['PlayerType']) && !empty($_POST['submit'])) 
{
		mysqli_query($link,"insert into players (name, dob, area, current_team, current_series, player_type, created_by, datetime_created, player_credits) values('".$_POST['PlayerName']."','".$_POST['PlayerDOB']."','".$_POST['PlayerArea']."','".$_POST['TeamId']."','".$_POST['SeriesId']."','".$_POST['PlayerType']."','1','".$timenow."','0' )");
	if(mysqli_error($link)){
		echo mysqli_error($link);
	}
}
else{
	echo "Complete the Form";
}


?>