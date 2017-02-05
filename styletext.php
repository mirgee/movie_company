<html>
<head>
<title>Style Your Text</title>
</head>
<body>
<form method='get' action='styletext1.php'>
<p>Text: 
<textarea rows="10" cols="50" name="text">Write your text.</textarea>
</p>
<p>
Font size: <input type="text" name="fontSize"/> 
Color: 
<select name='fontColor'>
<option selected>Red</option>
<option>Green</option>
<option>Blue</option>
</select>
Font type:
<select name='fontType'>
<option selected>Verdana</option>
<option>Aerial</option>
<option>Comic-sans</option>
</select>
</p>
<p>Save? 
<input type="radio" name="save" value="true">Yes <input type="radio" name="save" value="false">No
</p>
<input type='submit' value='Submit'>
</form>
</body>
</html>
