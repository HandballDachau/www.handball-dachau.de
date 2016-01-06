<?php
	session_start();
	require_once("src/mysql.php");
	if(isset($_POST['sent']) && $_POST['sent']=="Login") {
		if (login($_POST['team'], $_POST['pw']))
		header('Location: redakteur.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<div style="text-align: center;margin-top: 300px;">
		<h1>Login</h1>
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" name="login" method="post">
			<select name="team" size="1">
				<option value="Top News">Top News</option>
				<option value="Damen 1">Damen 1</option>
				<option value="Damen 2">Damen 2</option>
				<option value="Damen 3">Damen 3</option>
				<option value="Damen 4">Damen 4</option>
				<option value="Herren 1">Herren 1</option>
				<option value="Herren 2">Herren 2</option>
				<option value="Herren 3">Herren 3</option>
				<option value="Herren 4">Herren 4</option>
				<option value="Weibliche A">Weibliche A</option>
				<option value="Weibliche B">Weibliche B</option>
				<option value="Weibliche C">Weibliche C</option>
				<option value="Weibliche D">Weibliche D</option>
				<option value="Weibliche E">Weibliche E</option>
				<option value="Männliche A">Maennliche A</option>
				<option value="Männliche B">Maennliche B</option>
				<option value="Männliche C">Maennliche C</option>
				<option value="Männliche D">Maennliche D</option>
				<option value="Männliche E">Maennliche E</option>
				<option value="Minis">Minis</option>
			</select>
			<input name="pw" type="password" size="4" />
			<input name="sent" type="submit" value="Login" />
		</form>
	</div>
</body>
</html>