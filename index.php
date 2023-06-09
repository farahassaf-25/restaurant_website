<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	
	$get_recent = $db->query("SELECT * FROM food");
	
	$result = "";
	
	if($get_recent->num_rows) {
		
		while($row = $get_recent->fetch_assoc()) {
			
			$result .= "<div class='parallax_item'>
				
							<a href='detail.php?fid=".$row['id']."'><img src='image/FoodPics/".$row['id'].".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>".$row['food_name']."</h4>
								<p class='desc'>".substr($row['food_description'], 0, 33)."...</p>
								<p class='price'>$".$row['food_price']."</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
			
		}
		
	}
	
?>

<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>
	
<title>Restaurant</title>

<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>

<style>
    img[src*="https://cloud.githubusercontent.com/assets/23024110/20663010/9968df22-b55e-11e6-941d-edbc894c2b78.png"] {
    display: none;}
</style>

</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>Restaurant</h2>
		<h3>Delicious Foods & Best Services</h3>
		
	</div>
	
</div>


<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class="fresh">Menu</span></h2>
		
		<div class="parallax_content">
			
			<?php echo $result; ?>
			
			<p class="clear"></p>
			
		</div>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
		
		<div class="contact">
			
			<div class="left">
				
				<h3>LOCATION</h3>
				<p>BEIRUT, LEBANON</p>
				
			</div>
			
			<div class="left">
				
				<h3>CONTACT</h3>
				<p>01123456, 01112233</p>
				<p>restaurant@gmail.com</p>
				
			</div>
			
			<p class="left"></p>
			
			<div class="icon_holder">
				
				<a href="#"><img src="image/icons/Facebook.png" alt="image/icons/Facebook.png" /></a>
				<a href="#"><img src="image/icons/Google+.png" alt="image/icons/Google+.png"  /></a>
				<a href="#"><img src="image/icons/Twitter.png" alt="image/icons/Twitter.png"  /></a>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="footer_parallax" onclick="remove_class()">
	
	<div class="on_footer_parallax">
		
		<p style="color: white;">&copy; 2022 Restaurant, All Right Reserved</p>
		
	</div>
	
</div>
	
</body>

</html>