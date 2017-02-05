<html>
<head>
</head>
<body>
<?php
$_GET['page'] = (isset($_GET['page']) ? $_GET['page'] : 1);
$con = mysql_connect('localhost', 'root', '1234') or
die('Unable to connecto to the database');
mysql_select_db('moviesite', $con);
$pageminusone = $_GET['page'] - 1;
$query = 'SELECT movie_name FROM movie LIMIT ' . $pageminusone . ', 1';
$result = mysql_query($query, $con);
while($ar = mysql_fetch_array($result)){
	echo $ar['movie_name'];
}
echo '<br/>';
echo '<div style="text-align: center">';
$rows = mysql_num_rows(mysql_query('SELECT * FROM movie', $con));
for ($i=1; $i<=$rows; $i++) {
	echo '<a href="ind.php?page=' . $i . '">' . $i . '</a>';
}
echo '</div>';
?>
</body>
</html>
