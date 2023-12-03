<?php
// error_reporting(0);
include('includes/config.php');

if(isset($_GET['delete'])){
    $id=$_GET['id'];
    $query=mysqli_query($con,"DELETE from booking WHERE id = '$id'");
    if($query){
      echo "<script>alert('Successfully Deleted');</script>";
      echo "<script>window.location.assign('booking.php');</script>"; 
    }
  }
  if (isset($_POST['submitReply'])) {
    $id = $_POST['id'];
    $reply = $_POST['replyText'];
    $status= $_POST['status'];
    
   
       $query = "UPDATE book SET status = '$status', reply = '$reply' WHERE id = $id";
      if(mysqli_query($con, $query));
       echo "<script>alert('Successfully Updated');</script>";
    echo "<script>window.location.assign('booking.php');</script>"; 
   
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
  <main class=" w-full p-6 ">
  <div id="replyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white p-6 rounded-lg shadow-md w-3/5">
    <h2 class="text-xl font-semibold mb-4">Enter Reply</h2>
    <form id="replyForm" method="post">
      <input type="hidden" id="contactId" name="id" value="">
      <div class="mb-4">
        <label for="replyStatus" class="block text-gray-700 font-bold mb-2">Select Status</label>
        <select id="replyStatus" name="status" class="w-full border rounded-md py-2 px-3" required>
          <option value="" disabled selected>Select status</option>
          <option value="accepted">Accept</option>
          <option value="rejected">Reject</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="replyStatus" class="block text-gray-700 font-bold mb-2">Reply</label>
      <textarea name="replyText" id="replyText" rows="4" class="w-full p-2 mb-4 border rounded-md" required></textarea>
      </div>
     
      <!-- End Select Box -->
      <div class="flex justify-end">
        <button type="button" class="mr-4 px-4 py-2 bg-gray-300 rounded-md" onclick="closeReplyModal()">Cancel</button>
        <button type="submit" name="submitReply" class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit</button>
      </div>
    </form>
  </div>
</div>

        <div class="  rounded-lg ">
            <div class=" max-w-full mx-auto p-6">
                <h1 class="text-3xl font-bold text-center text-white mb-4">Bookings</h1>

                <input type="text" id="searchInput" class="w-full p-2 mb-4 border rounded-md focus:outline-none focus:ring focus:border-blue-400" placeholder="Search...">

                <table class="w-full bg-white border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                        <th class="p-3 font-semibold text-left">User</th>
                           
                            <th class="p-3 font-semibold text-left">Appointment Date</th>
                            <th class="p-3 font-semibold text-left">Description</th>
                            <th class="p-3 font-semibold text-left">Reply</th>
                            <th class="p-3 font-semibold text-left">Status</th>
                            <th class="p-3 font-semibold text-left">Reg.Date</th>
                           
                           
                            <th class="p-3 font-semibold text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    <?php
          $email=$_SESSION['email'];          
$sql = "SELECT * FROM book where workerid='$email' order by date desc";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr class='text-black'>
        <td class='p-3'> <?php echo $row["userid"]; ?> </td>
       
        <td class='p-3'> <?php echo $row["appointmentdate"]; ?> </td>
        <td class='p-3'> <?php echo $row["description"]; ?> </td>
        <td class='p-3'> <?php echo $row["reply"]; ?> </td>
        <td class='p-3'> <?php echo $row["status"]; ?> </td>
       
        <td class='p-3'> <?php echo $row["date"]; ?> </td>
        
      
        <td class="p-3">
   <?php if ($row['status'] === 'notchecked') { ?>
      <button class="bg-blue-500 text-white px-2 py-1 rounded-md" onclick="openReplyModal(<?php echo $row['id']; ?>)">Reply</button>
        <?php } else { echo 'Replied'; } ?>
                        </td>
        </tr>
  <?php  }
}
?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        function openReplyModal(id, email) {
            const modal = document.getElementById('replyModal');
            modal.classList.remove('hidden');

            
            document.getElementById('contactId').value = id;
           
        }

        // Function to close the reply modal
        function closeReplyModal() {
            const modal = document.getElementById('replyModal');
            modal.classList.add('hidden');
        }


        const searchInput = document.getElementById("searchInput");
        const tableBody = document.getElementById("tableBody");

        searchInput.addEventListener("input", function () {
            const searchTerm = this.value.toLowerCase();
            const rows = tableBody.querySelectorAll("tr");

            rows.forEach(row => {
                const rowData = row.textContent.toLowerCase();
                if (rowData.includes(searchTerm)) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
 

        </div>
</body>
</html>
