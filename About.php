<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:Login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Treats</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/CoffeeStyle.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	
</head>
<body>
    
<?php include 'Header.php'; ?>


	

	<section class="explain" id="explain">
	<h1 class="heading">ABOUT CAfe treats</h1><br<br><br<br>
	<div class="row">
		<div class="image">
			<img src="images/Menu.png" alt="">
		</div>
		
		<div class="content1">
			<p>CafeTreats was originally the vision of two coffee nerds who were unsatisfied with the quality of the coffee in their neighborhood. What started as a pop-up coffee stall has transformed into a full cafe with seating for over 50 guests.

Our aim isn’t just to give people a place to meet and drink coffee, but to get people excited about the coffee they drink, and where it comes from. Got more questions? Drop by and join us for a chat.</p>
			
		</div>
	</div>
</section>
	
	<?php include 'Footer.php'; ?>

	
	
<script src="js/script.js"></script>

</body>
</html>