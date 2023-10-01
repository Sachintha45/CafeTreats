<header class="header">
	

    <a href="#" class="logo">
        <img src="images/logo1.png" alt="">
    </a>

    <nav class="navbar">
        <a href="HomePage.php">home</a>
        <a href="Menu.php">our menu</a>
		<a href="About.php">about us</a>
        <a href="Contact.php">contact us</a>
		<a href="Orders.php">Orders</a>
		
    </nav>

			<div class="icons">
            
            <div class="search-box"><a href="SearchPage.php" class="fas fa-search"></a></div>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <div> <a href="Cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a></div>
			<div id="menu-btn" class="fas fa-bars"></div>
         	</div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="Login.php" class="delete-btn">logout</a>
         </div>
    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>


		
</header>