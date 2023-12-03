<?php
include('config.php');
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$message=$_POST['message'];
$email=$_POST['email'];

$query=mysqli_query($con,"insert into contact(name,email,message) values('$name','$email','$message')");
if($query)
{
	echo "<script>alert('Successfully send admin will gave you reply through gmail');</script>";
	//echo "<script>window.location.assign('contact.php');</script>";
}
else{
  echo "<script>alert('failed');</script>";
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clean Kerala - Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
  <?php include('header.php'); ?>
  
  <header class="container mx-auto py-16 text-center">
    <h1 class="text-5xl font-bold text-white mb-6 animate__animated animate__fadeInDown">Contact Us</h1>
    <p class="text-xl text-gray-300 mb-8 animate__animated animate__fadeInUp">Have a question or need assistance? Get in touch with us.</p>
  </header>
  
  <section class="bg-white py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-6">Get in Touch</h2>
      <div class="max-w-2xl mx-auto">
        <p class="text-gray-700 mb-6">Have a question or need assistance? Feel free to get in touch with us.</p>
        <form class="text-left" method='post'>
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500">
          </div>
          <div class="mb-4">
            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500"></textarea>
          </div>
          <button type="submit" name='submit' class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>

 <?php include('footer.php') ?>
</body>
</html>
