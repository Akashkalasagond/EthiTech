<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <style>
        body {
	margin: 0px;
	padding: 0px;
  }
  body{  
	height:100%;
	width:100%;
	background-repeat:no-repeat;
	background-size:cover;
	position:fixed;
	
}

.center {
    position: relative;
	width:40px;
    text-align: center;
    font-size: 18px;
	left:26%;
	
}  
  .header {
	width: 1100%;
    height: 26px;
	margin: 80px auto 0px;
	color: rgb(6, 2, 2);
	background-image: none;
	text-align: center;
    text-transform: uppercase;
    font-size:xx-large ;
    text-size-adjust: none;
	border: 3px solid #0d0e0f;
    border-top: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
    border-style: double;
    position: relative; left:210px;
  }
  
  form, .content {
	width: 1100%;
    height: 410px;
	color: rgb(17, 6, 6);
    font-size: x-large;  
	font-display:block;
	font-family: Georgia, 'Times New Roman', Times, serif;
	margin: 10x auto;
	padding: 20px;
    border-top: none;

	background-image: none;
	border: 3px solid #0d0e0f;
    border-style: double;
	border-radius: 0px 0px 10px 10px;
	position: relative; left:210px;
    position: relative;top: 100%;
  }
  .input-group {
	margin: 10px 0px 10px 0px;
  }
  .input-group label {
	display: block;
	text-align: left;
	margin: 3px;
  }
  .input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
  }
  .btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
  }
  .error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
  }
  .success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
  }
    </style>
</head>
<body background="students.jpg"alt="Image" height="30px;" width="10px;" style="margin:0px;">
    <div class="center">
        <img src="heading.png" alt="Image" height="200px;" width="850px;">
        <div class="header">
            <h>Register</h>
        </div>

        <form method="post" action="register.php">
            <?php include('error.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>
        </form>
    </div>
</body>
</html>
