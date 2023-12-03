<?php
include('includes/config.php'); 
$id=$_SESSION['id'];
if (isset($_POST['updateProfile'])) {
    // Retrieve and sanitize form data
    $name = $_POST['name'];
   
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];

   
       
        $updateQuery = "UPDATE worker SET name='$name',phonenumber='$phonenumber', address='$address' WHERE id='$id'";
      $result = mysqli_query($con, $updateQuery);

        // Check if the update was successful and display a success message.
        if ($result) {
            echo "<script>alert('Profile updated successfully.');</script>";
        } else {
            echo "<script>alert('Failed to update profile.');</script>";
        }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clean Kerala - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
 
  <?php include('includes/navbar.php'); ?>
  <div class="flex">
  <?php include('includes/sidebar.php'); ?>
  <?php
          $email=$_SESSION['email'];          
$sql = "SELECT * FROM worker where id='$id' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
 
  <main class="flex-grow p-10 b">
  

      <form class="bg-white p-6 rounded-lg shadow-md w-2/5 mx-auto" method="post">
      <h2 class="text-3xl font-bold text-center -mt-5 mb-4">Profile</h2>
        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Full Name</label>
          <input type="text" id="name" name="name" class="w-full border rounded-md py-2 px-3" value="<?php echo $row['name']; ?>" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
          <input type="email" id="email" name="email" class="w-full border rounded-md py-2 px-3" value="<?php echo $row['email']; ?>" required readonly>
        </div>

      

        <!-- Specialization -->
        <!-- Add your specialization options dynamically here -->
       

        <!-- Phone Number -->
        <div class="mb-4">
          <label for="phonenumber" class="block text-gray-700 font-bold mb-2">Phone Number</label>
          <input type="text" id="phonenumber" name="phonenumber" class="w-full border rounded-md py-2 px-3" value="<?php echo $row['phonenumber']; ?>" required>
        </div>

        <!-- Address -->
        <div class="mb-4">
          <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
          <textarea id="address" name="address" rows="4" class="w-full border rounded-md py-2 px-3" required><?php echo $row['address']; ?></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" name="updateProfile" class="bg-green-600 text-white font-bold py-2 px-4 rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
            Update Profile
          </button>
        </div><?php } }?>
      </form>
    </main>
        </div>
</body>
</html>
