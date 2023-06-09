<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";

    if(isset($_SESSION['user'])) {
        header("location: food_list.php");
    }
	//login form for admin
	if($_SERVER['REQUEST_METHOD'] == 'POST') {		
		if(isset($_POST['submit'])) {			//make that the submit button is clicked
			$user = escape($_POST['username']);
			$pass = $_POST['password'];			
			if($user != "" && $pass != "") { 
				//if the username and password in admin table in db is correct, go to food_list.php page	
				$verify = $db->query("SELECT * FROM admin WHERE username='$user' AND password='$pass' LIMIT 1");
				
				if($verify->num_rows) {				
					$row = $verify->fetch_assoc();
					$_SESSION['user'] = $row['username'];
                    header("location: food_list.php");
				}else{ //if user or pass is incorrect					
					echo "<script>alert('Invalid login credentials. Please try again')</script>";					
				}				
			}else{ //if user or pass field is empty				
				echo "<script>alert('Some fields are empty. All fields required!')</script>";
				
			}
			
		}
		
	}

	
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Restaurant</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	<link href="assets/css/style.css" rel="stylesheet" />
	
</head>
<body>

<div class="login_wrapper">
	
	<div class="login_holder">
			
		<form method="post" action="index.php">
			
			<div class="header">
				<h4 style="border-bottom: 1px solid #FF5722;" class="title">Login Form</h4>
			</div>
			
			<div class="form-group" method="post" action="#">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Enter Username" autofocus>
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter your password">
			</div>
			
			<input type="submit" name="submit" value="Login" class="btn btn-info btn-fill pull-right" style="background: #FF5722; border-color: #FF5722;" />
			<div class="clearfix"></div>
			
		</form>
		
	</div>
	
</div>

</body>

</html>