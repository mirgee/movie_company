<html>
<head></head>
<body>
<?php
$con = mysqli_connect('localhost', 'root', '1234') or die('Unable to connect to the database');
mysqli_select_db($con, 'moviesite') or die('Here is the error');
$moviesQuery = 'SELECT movie_name FROM movie';
$actorsQuery = 'SELECT people_fullname FROM people, movie WHERE people_id = movie.movie_leadactor';
$directorsQuery = 'SELECT people_fullname FROM people, movie WHERE people_id = movie.movie_director';
$movies = mysqli_query($con, $moviesQuery);
$actors = mysqli_query($con, $actorsQuery);
$directors = mysqli_query($con, $directorsQuery);

echo '<table border="1">';
echo '<tr>';
echo '<td>Films</td>';
while ($row = mysqli_fetch_assoc($movies)) {
	foreach ($row as $value) {
		echo '<td>' . $value . '</td>';
	}	
}
echo '</tr>';
echo '<tr>';
echo '<td>Lead actors</td>';
while ($row = mysqli_fetch_assoc($actors)) {
	foreach ($row as $value) {
		echo '<td>' . $value . '</td>';
	}
}
echo '</tr>';
echo '<tr>';
echo '<td>Directors</td>';
while ($row = mysqli_fetch_assoc($directors)) {
	foreach ($row as $value) {
		echo '<td>' . $value . '</td>';
	}
}
echo '</tr>';
echo '</table>';
?>
</body>
</html>
