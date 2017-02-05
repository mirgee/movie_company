<html>
<head>
</head>
<body>
<p style="font-size: <?php echo $_GET['fontSize']; ?>px; color: <?php echo $_GET['fontColor']; ?>; font-family: <?php echo $_GET['fontType']; ?>;">
<?php
echo $_GET['text'];
if ($_GET['save']) {
	setcookie('fontSize', $_GET['fontSize'], time()+3600);
	setcookie('fontColor', $_GET['fontColor'], time()+3600);
	setcookie('fontType', $_GET['fontType'], time()+3600);
}
?>
</p>
</body>
</html>
