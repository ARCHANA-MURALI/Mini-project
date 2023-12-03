<?php
include('config.php');

if (isset($_POST['submit'])) {
    if ($_POST['retype_password'] != $_POST['password']) {
        echo "<script>alert('Password not matching');</script>";
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $gender = $_POST['gender'];
        
        $phoneNumber = $_POST['phone_number'];
       

        $sql = "INSERT INTO user (name, email, password, gender,  phonenumber)
                VALUES ('$name', '$email', '$password', '$gender',  '$phoneNumber')";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('User registered successfully. You can log in now');</script>";
            echo "<script>window.location.assign('userregistration.php');</script>";
        } else {
            echo "<script>alert('Failed to register.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clean Kerala - Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
  <?php include('header.php'); ?>

  <header class="container mx-auto py-16 text-center">
    <h1 class="text-5xl font-bold text-white mb-6 animate__animated animate__fadeInDown">Register for an Account</h1>
    <p class="text-xl text-gray-300 mb-8 animate__animated animate__fadeInUp">Create your account to access our services.</p>
  </header>

  <section class="bg-white py-8">
    <div class="container mx-auto text-center">
      <div class="max-w-md mx-auto">
        <form class="text-left" action="" method="post">
          <!-- Full Name -->
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required>
          </div>

          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required>
          </div>

          <!-- Password -->
          

          <!-- Gender (Radio Buttons) -->
          <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Gender</label>
            <div class="flex">
              <label class="inline-flex items-center mr-6">
                <input type="radio" name="gender" value="Male" class="form-radio text-green-500" required>
                <span class="ml-2">Male</span>
              </label>
              <label class="inline-flex items-center mr-6">
                <input type="radio" name="gender" value="Female" class="form-radio text-green-500" required>
                <span class="ml-2">Female</span>
              </label>
              <label class="inline-flex items-center">
                <input type="radio" name="gender" value="Other" class="form-radio text-green-500" required>
                <span class="ml-2">Other</span>
              </label>
            </div>
          </div>

          <!-- Specialization (Select Box) -->
        

          <!-- Phone Number -->
          <div class="mb-4">
            <label for="phone_number" class="block text-gray-700 font-medium mb-2">Phone Number</label>
            <input type="tel" id="phone_number" name="phone_number" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required
              pattern="^\d{10}$"
              title="Phone number should be 10 digits without spaces or special characters."
            >
          </div>

          <!-- Address -->
         
          <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required
              pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"
              title="Password must contain at least 8 characters, including at least one lowercase letter, one uppercase letter, one digit, and one special character (!@#$%^&*)."
            >
          </div>

          <!-- Confirm Password -->
          <div class="mb-4">
            <label for="confirm-password" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
            <input type="password" id="confirm-password" name="retype_password" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required>
          </div>
          <!-- Submit Button -->
          <div class="text-center">
            <button type="submit" name="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
