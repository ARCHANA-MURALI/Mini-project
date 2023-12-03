<?php 
include('includes/config.php');
if (isset($_POST['submit'])) {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('New password and Confirm password do not match');</script>";
    } else {
        // Get user ID from session
        $userId = $_SESSION['id'];

        // Fetch user data from database
        $sql = "SELECT * FROM admin WHERE id = '$userId'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        // Verify if the current password matches the one in the database
        if (md5($currentPassword) === $row['password']) {
            // Update the password in the database
            $updateSql = "UPDATE admin SET password =  '".md5($newPassword)."' WHERE id = '$userId'";
            if (mysqli_query($con, $updateSql)) {
                echo "<script>alert('Password changed successfully');</script>";
                echo "<script>window.location.assign('changepassword.php');</script>";
            } else {
                echo "<script>alert('Failed to update password');</script>";
                echo "<script>window.location.assign('changepassword.php');</script>";
            }
        } else {
            echo "<script>alert('Invalid current password');</script>";
            echo "<script>window.location.assign('changepassword.php');</script>";
        }
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
    
 
         
            <div class=" w-1/3 h-1/2 mt-24 mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Change Password</h2>
            <form class="space-y-4" method="post" >
                <div>
                    <label class="block font-bold mb-2 text-gray-800" for="currentPassword">Current Password</label>
                    <input type="password" id="currentPassword" name="current_password" class="w-full py-2 px-4 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 border-gray-300 transition-colors text-black" required>
                </div>
                <div>
                    <label class="block font-bold mb-2 text-gray-800" for="newPassword">New Password</label>
                    <input type="password" id="newPassword" name="new_password" class="w-full py-2 px-4 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 border-gray-300 transition-colors text-black"
                    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" title="Enter a valid password" required>
                </div>
                <div>
                    <label class="block font-bold mb-2 text-gray-800" for="confirmPassword">Confirm New Password</label>
                    <input type="password" id="confirmPassword" name="confirm_password" class="w-full py-2 px-4 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 border-gray-300 transition-colors text-black" required>
                </div>
                <button type="submit" name="submit" class="w-full py-3 px-6 bg-green-600 text-white font-bold rounded-full shadow-lg hover:bg-green-700 transition-colors">Change Password</button>
            </form>
        </div>
        </div>
  

  
</body>
</html>
