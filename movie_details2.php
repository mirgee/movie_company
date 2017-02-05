<?php
function generate_ratings($rating) {
	$movie_rating = '';
	for ($i=0; $i<$rating; $i++) {
		$movie_rating .= '<img src="star.png" alt="star"/>';
	}
	return $movie_rating;
}

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

function calculate_differences($takings, $costs) {
	
	$difference = $takings - $costs;
	
	if ($difference < 0) {
		$color = 'red';
		$difference = '$' . abs($difference) . ' million';
	}
	elseif ($difference > 0) {
		$color = 'green';
		$difference = '$' . abs($difference) . ' million';
	} else {
		$color = 'blue';
		$difference = 'broke even';
	}
	
	return '<span style="color:' . $color . ';">' . $difference . '</span>';
}

$con = mysql_connect('localhost', 'root', '1234');
mysql_select_db('moviesite', $con);

$query = 'SELECT
		movie_name, movie_year, movie_director, movie_leadactor, 
		movie_type, movie_running_time, movie_cost, movie_takings
	FROM
		movie
	WHERE
		movie_id = ' . $_GET['movie_id'];
$result = mysql_query($query, $con);

$row = mysql_fetch_assoc($result);
$movie_name		= $row['movie_name'];
$movie_director	= get_director($row['movie_director']);
$movie_leadactor = get_leadactor($row['movie_leadactor']);
$movie_year		= $row['movie_year'];
$movie_running_time = $row['movie_running_time'] . ' mins';
$movie_takings	= $row['movie_takings'] . ' million';
$movie_cost		= $row['movie_cost'] . ' million';
$movie_health	= calculate_differences($row['movie_takings'], $row['movie_cost']);

echo <<<ENDHTML
<html>
<head>
<title>Details and Reviews for: $movie_name</title>
</head>
<body>
<div style=”text-align: center;”>
<h2>$movie_name</h2>
<h3><em>Details</em></h3>
<table cellpadding=”2” cellspacing=”2”
style=”width: 70%; margin-left: auto; margin-right: auto;”>
<tr>
<td><strong>Title</strong></strong></td>
<td>$movie_name</td>
<td><strong>Release Year</strong></strong></td>
<td>$movie_year</td>
</tr><tr>
<td><strong>Movie Director</strong></td>
<td>$movie_director</td>
<td><strong>Cost</strong></td>
<td>$$movie_cost<td/>
</tr><tr>
<td><strong>Lead Actor</strong></td>
<td>$movie_leadactor</td>
<td><strong>Takings</strong></td>
<td>$$movie_takings<td/>
</tr><tr>
<td><strong>Running Time</strong></td>
<td>$movie_running_time</td>
<td><strong>Health</strong></td>
<td>$movie_health<td/>
</tr>
</table>
ENDHTML;

$query = 'SELECT
		review_movie_id, review_date, reviewer_name, review_comment,
		review_rating
	FROM
		reviews
	WHERE
		review_movie_id = ‘ . $_GET[‘movie_id’] . ‘
	ORDER BY
		review_date DESC';

$result = mysql_query($query, $con);

echo <<<ENDHTML
	<h3><em>Reviews</em></h3>
	<table cellpadding="2" cellspacing="2" style="width: 90%;
	margin-left: auto; margin-right: auto;">
	<tr>
	 <th style="width: 7em;">Date</th>
	 <th style="width: 10em;">Reviewer</th>
	 <th>Comments</th>
	 <th style="width: 5em;">Rating</th>
	</tr>
ENDHTML;

while ($row = mysql_fetch_array($result)) {
	$date = $row['review_date'];
	$name = $row['reviewer_name'];
	$comment = $row['review_comment'];
	$rating = generate_ratings($row['review_rating']);
	echo <<<ENDHTML
	<tr>
	 <td style="vertical-align:top; text-align:center;">$date</td>
	 <td style="vertical-align:top;">$name</td>
	 <td style="vertical-align:top;">$comment</td>
	 <td style="vertical-align:top;">$rating</td>
	</tr>
ENDHTML;
}

echo <<<ENDHTML
</div>
</body>
</html>
ENDHTML;
?>

