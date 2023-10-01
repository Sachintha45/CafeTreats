<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<?php


include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:Login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('bquery failed');
      $message[] = 'product added to cart!';
   }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Treats</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/CoffeeStyle.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	
	
</head>
<body>

    

<?php include 'Header.php'; ?>
	
	
<section class="hero">
	
	<video autoplay loop muted plays-inline class="back-video">
		<source src="images/Coffee Cup loop.mp4" type="video/mp4">
	</video>

   <div class="sliderblock">
	<h1>CafeTreats</h1>
	 <p>Serving Only the Best !</p>
		<a href="Menu.php">Shop now</a>
	</div>

</section>
	

	
<section class="section-p1" id="section-p1">
	<div class="fe-box">
		<img src="images/delivery.png" alt="">
		<h6>Free Delivery</h6>
		</div>
	<div class="fe-box">
		<img src="images/bank.png" alt="">
		<h6>Money Saving</h6>
		</div>
	<div class="fe-box">
		<img src="images/online.png" alt="">
		<h6>Online Order</h6>
		</div>
	<div class="fe-box">
		<img src="images/discount.png" alt="">
		<h6>Offers</h6>
		</div>
	</section>
	
	<section class="explain" id="explain">
	
	<div class="row">
		<div class="image">
			<img src="images/img1.png" alt="" height="819">
		</div>
		
		<div class="content1">
			<h3>best coffee in the city</h3><br>
			<p>CafeTreats comes from the idea that everyone can enjoy coffee. It doesn’t matter if you like your coffee light and sweet, or you prefer strong coffee with no sugar, you can always enjoy it with your personal preferences in here. It’s our pleasure to help you find the best crafted drink that suits your taste in the best way.</p>

			<div class="morebtn" align="center">
				<a href="#" class="btn">Our Story →</a>
				</div>
		</div>
	</div>
</section>
	
	
<section class="products">

   <h1 class="title" align="center">PRODUCTS</h1><br><br><br><br>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 8") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="Productimages/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="Menu.php" class="option-btn">ALL MENU</a>
   </div>

</section>
	
	

	<?php include 'Footer.php'; ?>

	
   <script>
$(document).ready(function(){
  $(window).scroll(function(){
    var gap = 50;
    if($(window).scrollTop() > gap){
      $("header").addClass("active");
    }else{
      $("header").removeClass("active");
    }
  });
});
</script>
	
<script src="js/script.js"></script>


	
</body>
</html>