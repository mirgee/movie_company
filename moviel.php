<?php
session_start();
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;

if (($_SESSION['username'] == 'Joe') and
	($_SESSION['userpass'] == '1234')) {
		$_SESSION['authuser'] = 1;
} else {
	echo 'Sorry, but you don\'t have the permission to view this page!';
	exit();
}
?>
<html>
<head>
<title>Find my Favourite Movie!</title>
</head>
<body>
<?php
include 'header.php';
$myfavmovie = urlencode('Life of Brian');
echo "<a href=\"moviesite.php?favmovie=$myfavmovie\">";
echo 'Click here to see information about my favourite movie!';
echo '</a>';
?>
<br/>
<form method="get" action="moviesite.php">
<p>How many top movies do you want to see?
<select name="movienum" action="moviesite.php">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10 selected>10</option>
</select>
<input type='submit' value='Submit'/>
<br/>
Check to sort alphabetically: 
<input type="checkbox" name="sorted"/>
</p>
</form>
<?php include 'footnote.php'; ?>
</body>
</html>
