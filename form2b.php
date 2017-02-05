<html>
 <head>
  <title>Multipurpose Form</title>
 </head>
</head>
<body>
<?php
if ($_POST['type'] == 'movie') {
	echo '<h1>New ' . ucfirst($_POST['movie_type']) . ': ';
} else {
	echo '<h1>New ' . ucfirst($_POST['type']) . ': ';
}
echo $_POST['name'] . '</h1>';

echo '<table>';
if ($_POST['type'] == 'movie') {
	echo '<tr>';
	echo '<td>Year</td>';
	echo '<td>' . $_POST['year'] . '</td>';
	echo '</tr><tr>';
	echo '<td>Movie Description</td>';
} else {
	echo '<tr><td>Biography</td>';
}
echo '<td>' . nl2br($_POST['extra']) . '</td>';
echo '</tr>';
echo '</table>';

if (isset($_GET['debug'])) {
	echo '<pre>';
	echo print_r($_POST);
	echo '</pre>';
}
?>
</body>
</html>
