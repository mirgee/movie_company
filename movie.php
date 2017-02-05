<?php
	$link = mysql_connect('localhost', 'root', '1234');
	mysql_select_db('moviesite', $link);
	$peoplesql = "SELECT * FROM people";

	$result = mysql_query($peoplesql);

	while ($row = mysql_fetch_array($result)) {
		$people[$row['people_id']] = $row['people_fullname'];
	}
?>
<html>
<head>
<title>Add movie</title>
<style type="text/css">
td {
	color: #353535;
	font-family: verdana
}

th {
	color: #FFFFFF;
	font-family: verdana;
	background-color: #336699;
}
</style>
</head>
<body>
<form action="commit.php?action=add&type=movie" method="post">
<table border="0" width="750" cellspacing="1" cellpadding="3"
	bgcolor="#353535" align="center">
	<tr>
	<td bgcolor="#FFFFFF">Movie name</td>
	<td bgcolor="#FFFFFF">
		<input type="text" name="movie_name">
	</td>
	</tr>
	<tr>
	<td bgcolor="#FFFFFF">Movie type</td>
	<td bgcolor="#FFFFFF">
		<select id="game" name="movie_type">
<?php
	$sql = "SELECT movietype_id, movietype_label FROM movietype ORDER BY movietype_label";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
		echo '<option value="'.$row['movietype_id'].'">'.
			$row['movietype_label'].'</option>';
	}
?>
		</select>
	</td>
	</tr>
	<tr>
	<td bgcolor="#FFFFFF">Movie year</td>
	<td bgcolor="#FFFFFF">
		<select name="movie_year" name="movie_year">
		<option value="" selected>Select a year...</option>
<?php
	for ($year = date("Y"); $year >= 1970; $year--) {
?>
		<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
<?php
	}
?>
	</td>
	</tr>
	<tr>
	<td>Lead actor</td>
	<td>
		<select name="movie_leadactor">
			<option value="" selected>Select an actor...</option>
<?php
	foreach ($people as $people_id => $people_fullname) {
?>
			<option value="<?php echo $people_id; ?>"><?php echo $people_fullname; ?></option>
<?php
	}
?>
		</select>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="center">
		<input type="submit" name="submit" value="Add">
	</td>
	</tr>
</table>
</form>
</body>
</html>
