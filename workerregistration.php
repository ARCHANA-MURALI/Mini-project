<?php
include('config.php');

if (isset($_POST['submit'])) {
    if ($_POST['retype_password'] != $_POST['password']) {
        echo "<script>alert('Password not matching');</script>";
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $idproof = $_FILES['idproof']['name'];
        $tempidproof = $_FILES['idproof']['tmp_name'];
        $idproofPath = "worker/idproof/" . $idproof;
        move_uploaded_file($tempidproof, $idproofPath);
        $phoneNumber = $_POST['phone_number'];
        $address = $_POST['address'];
        $category = $_POST['category'];
        $sql = "INSERT INTO worker (name, email, password,phonenumber, address,category,idproof)
                VALUES ('$name', '$email', '$password',  '$phoneNumber', '$address','$category','$idproof')";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Worker registered successfully. You can log in after admin review.');</script>";
            echo "<script>window.location.assign('workerregistration.php');</script>";
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
   
  </header>

  <section class="bg-white py-8">
    <div class="container mx-auto text-center">
      <div class="max-w-md mx-auto">
        <form class="text-left" enctype="multipart/form-data" method="post">
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
        

          <!-- Specialization (Select Box) -->
          <div class="mb-4">
  <label for="specialization" class="block text-gray-700 font-medium mb-2">Category</label>
  <select id="specialization" name="category" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" required>
  <option value="" disabled selected>Select a category</option>
    <?php
            $sql = mysqli_query($con, "SELECT * FROM category ");
            while ($row = mysqli_fetch_array($sql)) {
              echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
            ?>
   
  </select>
</div>

         
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
            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
            <textarea id="address" name="address" class="w-full px-4 py-2 rounded-lg border focus:ring-green-500 focus:border-green-500" rows="4" required></textarea>
          </div>
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
          <div class="mb-4">
          <label class="block font-medium text-gray-700 mb-2">idproof(image)</label>
          <input type="file" name="idproof" required accept="image/*" class="w-full">
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
