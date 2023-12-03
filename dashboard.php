<?php 
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clean Kerala - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
  <?php include('includes/navbar.php'); ?>
  <div class="flex">
    <?php include('includes/sidebar.php'); ?>
    <main class="flex-grow p-10">
      <h1 class="text-5xl font-bold text-white mb-6 animate__animated animate__fadeInDown">Welcome to Your Dashboard</h1>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Users Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-2">
          <h3 class="text-xl font-semibold text-green-600 mb-2"><i class="fas fa-users"></i> Users</h3>
          <p class="text-gray-700 text-3xl font-bold">
            <?php
              $que = "SELECT COUNT(*) AS user_count FROM user";
              $re = mysqli_query($con, $que);
              $r = mysqli_fetch_assoc($re);
              echo $r['user_count'];
            ?>
          </p>
        </div>

        <!--workers Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-2">
          <h3 class="text-xl font-semibold text-green-600 mb-2"><i class="fas fa-user"></i> Workers</h3>
          <p class="text-gray-700 text-3xl font-bold">
            <?php
              $que = "SELECT COUNT(*) AS worker_count FROM worker";
              $re = mysqli_query($con, $que);
              $r = mysqli_fetch_assoc($re);
              echo $r['worker_count'];
            ?>
          </p>
        </div>

        <!-- Bookings Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-2">
          <h3 class="text-xl font-semibold text-green-600 mb-2"><i class="fas fa-book"></i> Bookings</h3>
          <p class="text-gray-700 text-3xl font-bold">
            <?php
              $que = "SELECT COUNT(*) AS booking_count FROM book";
              $re = mysqli_query($con, $que);
              $r = mysqli_fetch_assoc($re);
              echo $r['booking_count'];
            ?>
          </p>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
