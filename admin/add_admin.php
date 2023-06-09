<?php 
session_start();
	require "includes/db.php";
	require "includes/functions.php";

    if(!isset($_SESSION['user'])) {
        header("location: logout.php");
    }
?>	
    

<?php
    //Process the value from form and database
    //checked whether the submit click or not
    if(isset($_POST['submit'])){
       if(!(empty($_POST['username'])) and !(empty($_POST['password']))){
        //Button CLicked
        $username = $_POST['username'];
        $password = $_POST['password'];

        //SQL query to save the data to database
        $sql = "INSERT INTO admin SET
        username = '$username',
        password = '$password'";

        $res = mysqli_query($db,$sql);

        //CHeck whether $res is true or false

        if($res==TRUE){
            //Data Inserted
            //echo'Data Inserted';
            //Session To display messege
            $_SESSION['add'] = "<div>Admin Added Successfully</div>";
            //redirect page to mange admin
            header("location: manage_admins.php");
        }else{
            //Data Failed TO Insert
            //echo'Data Failed TO Insert';
            $_SESSION['add'] = "<div>Failed to Add Admin</div>";
            //redirect page to add admin
            header("location: add_admin.php");
        }

       }
       else{
        $_SESSION['add'] = "<div>Failed to Add Admin</div>";
        //redirect page to add admin
        header("location: add_admin.php");
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

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="assets/img/sidebar-5.jpg">



    	<?php require "includes/side_wrapper.php"; ?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: blue;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">ADD NEW FOOD</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" style="color: #fff;">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-----Main content Section Starts-------->
    <div>
        <div>
            <h1>Add Admin</h1>
                <br>
                <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
                <br>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" placeholder="Enter User Name"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Enter Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <!-----Main content Section Ends-------->

<footer class="footer">
            <div class="container-fluid">
                
            <p class="copyright pull-right">
                    &copy; 2022 <a href="index.php" style="color: black;">Restaurant</a>
                </p>
            </div>
        </footer>

    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>