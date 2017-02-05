<?php
function get_director($director_id) {
	
	global $con;

	$query = 'SELECT
			people_fullname
		FROM
			people
		WHERE
			people_id = ' . $director_id;
	$result = mysql_query($query, $con);
	
	$row = mysql_fetch_assoc($result);
	extract($row);
	
	return $people_fullname;
}

function get_leadactor($leadactor_id) {
	
	global $con;
	
	$query = 'SELECT
			people_fullname
				FROM
			people
				WHERE
			people_id = ' . $leadactor_id;
	
	$result = mysql_query($query, $con);
	
	$row = mysql_fetch_assoc($result);
	extract($row);
	
	return $people_fullname;
}

function get_movietype ($type_id) {
	
	global $con;
	
	$query = 'SELECT
			movietype_label
				FROM
			movietype
				WHERE
			movietype_id = ' . $type_id;
	
	$result = mysql_query($query, $con);
	
	$row = mysql_fetch_assoc($result);
	extract($row);
	
	return $movietype_label;
}

function orderby() {
	if (isset($_GET['sort'])) {
		return $_GET['sort'];
	}
	else { return 'movie_name'; }
}

$con = mysql_connect('localhost', 'root', '1234');
mysql_select_db('moviesite', $con);

$order = orderby();
$query = 'SELECT
movie_id, movie_name, movie_year, movie_director, movie_leadactor, movie_type
FROM
	movie
ORDER BY ' . $order;
$result = mysql_query($query, $con);
$num_movies = mysql_num_rows($result);

$table = 
<<<ENDHTML
<div style="text-align: center;">
 <h2>Movie Review Database</h2>
 <table border="1" cellpadding="2" cellspacing="2" 
 style="width: 70%; margin-left: auto; margin-right: auto;">
  <tr>
   <th><a href="table2.php?sort=movie.movie_title">Movie Title</a></th>
   <th><a href="table2.php?sort=movie.movie_year">Year of Release</a></th>
   <th><a href="table2.php?sort=movie_director">Movie Director</a></th>
   <th><a href="table2.php?sort=movie_leadactor">Movie Lead Actor</a></th>
   <th><a href="table2.php?sort=movie_type">Movie Type</a></th>
  </tr>
ENDHTML;

  while ($row = mysql_fetch_assoc($result)) {
	  extract($row);
	  $director = get_director($movie_director);
	  $leadactor = get_leadactor($movie_leadactor);
	  $type = get_movietype($movie_type);
	  $table .= 
<<<ENDHTML
<tr>
<td><a href="movie_details.php?movie_id=$movie_id">$movie_name</a></td>
<td>$movie_year</td>
<td>$director</td>
<td>$leadactor</td>
<td>$type</td>
</tr>
ENDHTML;
}

  $table .= 
<<<ENDHTML
 </table>
 <p> $num_movies movies</p>
</div>
ENDHTML;
echo $table;
?>
