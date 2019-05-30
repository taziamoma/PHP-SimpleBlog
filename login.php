<?php
include_once('includes/config.php');

if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$message = "";

	if(empty($username) || empty($password)) {
		$message = "All fields required";
	} else {
		$sql = "SELECT username, password FROM users WHERE username = ? AND password = ?";
		$query = $db->prepare($sql);
		$query->execute(array($username,$password));

		if($query->rowCount() >= 1) {
			$_SESSION['username'] = $username;
			$_SESSION['time_start_login'] = time();
			header('Location: index.php');
		} else {
			$message = "Username/Password is wrong";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="images/style.css">
  <title>Simple Blog</title>
</head>
<body>

<div class="wrapper">
	<div class="container">
	    <div class="header"><h1><?php echo "Simple Blog"; ?></h1></div>
		<div class="article-wrap">
			<h1>Login</h1><br />
			<?php echo $message; echo md5('root');?>
			<form method="post" action="login.php">
				<p><input type="text" name="username" value="" placeholder="Username"></p>
	        	<p><input type="password" name="password" value="" placeholder="Password"></p>
	        	<p class="submit"><input type="submit" name="submit" value="Login"></p>
        	</form>
	</div>
</div>

</body>
</html>