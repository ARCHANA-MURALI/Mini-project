<?php
include("config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM user WHERE email='".$_POST['email']."' ");
$num=mysqli_num_rows($ret);
$n=mysqli_fetch_array($ret);
if($num>0)
{
  
    $email = $_POST['email'];
    $to_email = $email;
    $subject = "Password Reset Link";
    $body ="http://localhost/cleankerala/userresetpassword.php?id=".$n['id']."&key=".$n['password'];
    $headers = "From:@gmail.com";
    if (mail($to_email, $subject, $body, $headers)) {

        echo "<script>alert('Password reset link send to your email id ');</script>";
        echo "<script>window.location.assign('userforgotpassword.php');</script>";
    }
    else {
        echo "<script>alert('Failed to send password reset link ');</script>";
        if ($error = error_get_last()) {
            echo "<script>alert('Error: " . $error['message'] . "');</script>";
        }
    }
      }
    
    
else{
    echo "<script>alert('Invalid email');</script>";  
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clean Kerala - </title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
  <?php include('header.php'); ?>
  
  <header class="container mx-auto py-16 text-center">
    <h1 class="text-5xl font-bold text-white mb-6 animate__animated animate__fadeInDown">Forgot Password</h1>
    
  </header>
  
  <section class="bg-white py-16">
    <div class="container mx-auto text-center">
      <div class="max-w-md mx-auto">
        <form class="text-left" method='post'>
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email"  name='email' id="email" name="email" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500"
              required
              pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"
              title="Please enter a valid email address."
            >
          </div>
          
          <button type="submit" name='submit' class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
            Send Link
          </button>
          
        </form>
       
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
