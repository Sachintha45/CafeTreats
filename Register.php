<?php

$conn = mysqli_connect('localhost','root','','cafetreats_db') or die('Connection failed');

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($conn, $_POST['fname']); 
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $contact = mysqli_real_escape_string($conn, $_POST['tel']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['password2']));
	
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('Failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exist';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched. Check it again';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(fname, lname, email, contact, address, password) VALUES('$fname', '$lname', '$email', '$contact', '$address', '$pass')") or die('Failed');
         $message[] = 'User Registered successfully';
         header('location:Login.php');
      }
   }

}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>
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
	
	

<table width="663" height="748" align="center" cellpadding="3" cellspacing="10" class="container">
	
  <form  id="form1" name="form1" method="post" action="" class="form">
	  
  <br><br><br><br><tbody class="details">
    <tr>
      <td colspan="2"><h1 class="title"   >REGISTRATION</h1></td>
    </tr>
    <tr class="input-box">
      <td width="140" >First Name</td>
      <td width="479"><input name="fname"  type="text" required="required" id="textfield"></td>
    </tr>
    <tr class="input-box">
      <td>Last Name</td>
      <td><input name="lname" type="text" required="required" id="textfield2" ></td>
    </tr>
    <tr class="input-box">
      <td>Email</td>
      <td><input name="email" type="email" required="required" id="email" ></td>
    </tr>
    <tr class="input-box">
      <td>Contact Number</td>
      <td><input name="tel" type="tel" required="required" id="tel" ></td>
    </tr>
    <tr class="input-box">
      <td>Contact Address</td>
      <td><textarea name="address" cols="50" rows="4" required="required" id="textarea" ></textarea></td>
    </tr>
    <tr class="input-box">
      <td>Password</td>
      <td><input name="password" type="password" required="required" id="password" placeholder="Password"></td>
    </tr>
    <tr class="input-box">
      <td style="text-align: left">Confirm Password</td>
      <td><input name="password2" type="password" required="required" id="password2" placeholder="Confirm Password"></td>
    </tr>
  <br><br>   <br><br> 

    <tr >
      <td colspan="2" style="text-align: center"> <input name="checkbox" type="checkbox" required="required" id="checkbox">
        <label  for="checkbox">  </label>
      I agree to all terms and conditions</td>
    </tr>
    <tr class="Button">
      <td colspan="2" style="text-align: center"><input type="submit" name="submit" id="submit" value="Register">
      </td>
    </tr>
	<tr style="text-align: center" class="link">
      <td height="40" colspan="2"> Already have an account? <a href="Login.php" class="link1">  Log In  </a></td>
  </tr>
	</form>
</table>

</body>
</html>
