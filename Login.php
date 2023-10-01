<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('Failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['usertype'] == 'admin'){

         $_SESSION['admin_name'] = $row['fname'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:AdminPage.php');

      }elseif($row['usertype'] == 'user'){

         $_SESSION['user_name'] = $row['fname'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:HomePage.php');

      }

   }else{
      $message[] = 'Incorrect email or password';
   }

}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>
	<link rel="stylesheet" href="css/WebForm.css">
</head>

<body>
	
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

<table width="500" height="500" align="center" cellpadding="3" cellspacing="10" class="container">
	
  <form  id="form1" name="form1" method="post" action="" class="form">
	  
  <br><br><br><br><tbody class="details">
    <tr>
      <td colspan="2"><h1 class="title"   >LOGIN</h1></td>
    </tr>

    <tr class="input-box">
      <td>Email</td>
      <td><input name="email" type="email" required="required" id="email" ></td>
    </tr>
  
    <tr class="input-box">
      <td>Password</td>
      <td><input name="password" type="password" required="required" id="password" placeholder="Password"></td>
    </tr>
    
    <tr class="Button">
      <td colspan="2" style="text-align: center"><input type="submit" name="submit" id="submit" value="Login">
      </td>
    </tr>
	<tr style="text-align: center" class="link">
      <td height="40" colspan="2"> Don't have an account? <a href="Register.php" class="link1">  Register  </a></td>
  </tr>
	</form>
</table>

</body>
</html>
