<?php
include('includes/config.php');
if(isset($_POST['submit']))
{
$appointmentdate=$_POST['appointmentdate'];
$workerid=$_GET['id'];
$userid=$_SESSION['email'];
$description=$_POST['description'];

$query=mysqli_query($con,"insert into  book(appointmentdate,description,workerid,userid) values('$appointmentdate','$description','$workerid','$userid')");
if($query)
{
	echo "<script>alert('Successfully Booked');</script>";
	echo "<script>window.location.assign('bookinghistory.php');</script>";
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
  <title>Clean Kerala - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
 
  <?php include('includes/navbar.php'); ?>
  <div class="flex">
  <?php include('includes/sidebar.php'); ?>
  <main class="flex-grow p-10">
     
      <!-- Form for Booking Appointment -->
      <form class="bg-white p-6 rounded-lg shadow-md"  method="post">
        <h2 class="text-3xl text-center font-bold text-green-600 mb-4">Book Appointment</h2>

        <!-- Date (Ensure it's not a previous date or equal to the current date) -->
        <div class="mb-4">
          <label for="appointment_date" class="block text-gray-700 font-bold mb-2">Appointment Date</label>
          <input type="date" id="appointment_date" name="appointmentdate" class="w-full border rounded-md py-2 px-3" required min="<?php echo date('Y-m-d'); ?>">
        </div>

        <!-- Additional Notes (User can input any special requirements or notes) -->
        <div class="mb-4">
          <label for="appointment_notes" class="block text-gray-700 font-bold mb-2">Additional Notes</label>
          <textarea id="appointment_notes" name="description" placeholder="Any special requirements or notes" rows="4" class="w-full border rounded-md py-2 px-3" required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" name='submit' class="bg-green-600 text-white font-bold py-2 px-4 rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
            Book Appointment
          </button>
        </div>
      </form>

      <!-- Other content can be added here -->

    </main>
 

        </div>
</body>
</html>
