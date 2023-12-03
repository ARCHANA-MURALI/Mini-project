<?php
include("config.php");
if(isset($_POST['submit']))
{
  $password=$_POST['password'];
$ret=mysqli_query($con,"SELECT * FROM user WHERE email='".$_POST['email']."' and password='".md5($password)."' ");
$num=mysqli_fetch_array($ret);

if($num>0)
{
$_SESSION['id']=$num['id'];
$_SESSION['role']='user';
$_SESSION['name']=$num['name'];
$_SESSION['email']=$num['email'];
	echo "<script>window.location.assign('user/dashboard.php');</script>";
}
else{
    echo "<script>window.alert('Invalid details');</script>";
}
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clean Kerala - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
  <?php include('header.php'); ?>
  
  <header class="container mx-auto py-16 text-center">
    <h1 class="text-5xl font-bold text-white mb-6 animate__animated animate__fadeInDown">Log In to Your Account</h1>
   
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
          <div class="mb-4">
            <label for="password" name='password' class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required>
          </div>
          <button type="submit" name='submit' class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
            Log In
          </button>
          <p class="text-gray-700 mt-2">
            <a href="userforgotpassword.php" class="text-green-600 hover:underline">Forgot Password?</a>
          </p>
        </form>
        <p class="text-gray-700 mt-4">
          Don't have an account? <a href="userregistration.php" class="text-green-600 hover:underline">Sign up here</a>.
        </p>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
