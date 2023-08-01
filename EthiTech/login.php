<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to EthiTech</title>
  <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body background="students.jpg" alt="Image" height="360px;" width="850px; style="margin:0px;>
	<div class="center">
		<img src="heading.png"alt="Image" height="200px;" width="850px;">
	<div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('error.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
