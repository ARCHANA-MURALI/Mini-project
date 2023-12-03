<?php
include("config.php");
if(isset($_GET['id']) and isset($_GET['key']) )
{
    $id=$_GET['id'];
    $key=$_GET['key'];
    $ret=mysqli_query($con,"SELECT * FROM worker WHERE id='$id' and password='$key' ");
    if (mysqli_num_rows($ret) > 0) {

    } else {
        echo "<script>alert('Unauthorized access');</script>";
        echo "<script>window.location.assign('workerlogin.php');</script>";}
    }
    else{
        echo "<script>alert('Unauthorized access');</script>";
        echo "<script>window.location.assign('workerlogin.php');</script>";
    }

if(isset($_POST['submit']))
{
$password=$_POST['password'];
$newpassword=$_POST['repassword'];
    if($newpassword!=$password){
        echo "<script>alert('Password mismatch');</script>";
    } else {   
$ret=mysqli_query($con,"updateworker set password='$password' where id='$id'");
if($ret)
{
        echo "<script>alert('Password reset successfully');</script>";
        echo "<script>window.location.assign('workerlogin.php');</script>";
     
}else{
    echo "<script>alert('Failed');</script>";  
}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clean Kerala -</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
  <?php include('header.php'); ?>

  <header class="container mx-auto py-16 text-center">
    <h1 class="text-5xl font-bold text-white mb-6 animate__animated animate__fadeInDown">Reset Password</h1>
    
  </header>

  <section class="bg-white py-8">
    <div class="container mx-auto text-center">
      <div class="max-w-md mx-auto">
        <form class="text-left" action="" method="post">
      
          <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">New Password</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required
              pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"
              title="Password must contain at least 8 characters, including at least one lowercase letter, one uppercase letter, one digit, and one special character (!@#$%^&*)."
            >
          </div>

          <!-- Confirm Password -->
          <div class="mb-4">
            <label for="confirm-password" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
            <input type="password" id="confirm-password" name="repassword" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required>
          </div>
          <!-- Submit Button -->
          <div class="text-center">
            <button type="submit" name="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
              Reset
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
