<!DOCTYPE html>
<html>
<head>
	<title>Choose your Action</title>
</head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<style type="text/css">
	.skeleton{
		padding-bottom: 5%;
	}
</style>
<body>
<?php
if ((!empty($_GET['format'])&&(!empty($_GET['values'])))) {?>

<div class="form-style-8 skeleton">
  <h2>Success</h2>

<?php
if ($_GET['format']=="series") {
echo $_GET['values']." is added Succesfully"; ?>

<br><p>Choose your Action</p>
	<a href="index.php"><button style="float: left;">Go Home</button></a>
	<a href="teams.php"><button style="float: right;">Add Team</button></a>
</div>
<?php }
if ($_GET['format']=="teams") {
echo $_GET['values']." is added Succesfully"; ?>
<br><p>Choose your Action</p>
		<a href="index.php"><button style="float: left;">Go Home</button></a>
		<a href="teams.php"><button style="margin-left: 8%;">Add More Teams</button></a>
		<a href="players.php"><button style="float: right;">Add Players</button></a>
</div>
<?php }
if ($_GET['format']=="players") {
echo $_GET['values']." is added Succesfully"; ?>
<br><p>Choose your Action</p>
		<a href="index.php"><button style="float: left;">Go Home</button></a>
		<a href="players.php"><button style="margin-left: 8%;">Add More Player</button></a>
		<a href="squads.php"><button style="float: right;">Add Squad</button></a>
</div>
<?php }
if ($_GET['values']=="error") { ?>
<br><p>Incomplete Form</p>
		<a href= <?php echo $_GET['format']; ?>".php"><button style="float: left;">Go Back</button></a>
		<a href="index.php"><button style="float: right;">Go Home</button></a>
</div>
<?php }}?>


</body>
</html>