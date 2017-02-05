<?php
session_start();
if ($_SESSION['authuser'] != 1) {
	echo 'Sorry, nut you don\'t have permission to view this page!';
	exit();
}
?>
<html>
<head>
<title>
<?php
if (isset($_GET['favmovie'])) {
	echo ' = ';
	echo $_GET['favmovie'];
}
?>
</title>
</head>
<body>
<?php
include 'header.php';
function listmovies($howmany, $sort){
	$con=mysqli_connect('localhost', 'root', '1234', 'movrev');
	if (mysqli_errno($con)) { echo 'Failed to connect to MySQL'; }
	else {
		$table = mysqli_query($con, 'SELECT * FROM topmovies');
		$i=1;
		while ($row = mysqli_fetch_array($table)) {
			if ($i<=$howmany) {
				$ar[$i] = $row['Name'];
				$i++;
			}
			else {break;}
		}
		$i=1;
		if ($sort == true) { sort($ar); }
		foreach ($ar as $value) {
			echo $i;
			echo '. ';
			echo $value;
			echo '<br/>';
			$i++;
		}
	}
	mysqli_close($con);
}

if (isset($_GET['favmovie'])) {
	echo 'Welcome to our site, ';
	echo $_SESSION['username'];
	echo '! <br/>';
	echo 'My favorite movie is ';
	echo $_GET['favmovie'];
	echo '<br/>';
	$movierate = 5;
	echo 'My movie rating for this film is ';
	echo $movierate;
} else {
	echo 'My top ';
	echo $_GET['movienum'];
	echo ' movies are:';
	echo '<br/>';
	
	listmovies($_GET['movienum'], $_GET['sorted']);
}
?>
<?php include 'footnote.php'; ?>
</body>
</html>

