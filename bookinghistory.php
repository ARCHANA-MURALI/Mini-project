<?php
// error_reporting(0);
include('includes/config.php');

if(isset($_GET['delete'])){
    $id=$_GET['id'];
    $query=mysqli_query($con,"DELETE from booking WHERE id = '$id'");
    if($query){
      echo "<script>alert('Successfully Deleted');</script>";
      echo "<script>window.location.assign('workerlawpoint.php');</script>"; 
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
  <main class=" w-full p-6 ">
       
        <div class="  rounded-lg ">
            <div class=" max-w-full mx-auto p-6">
                <h1 class="text-3xl font-bold text-center text-white mb-4">Booking History</h1>

                <input type="text" id="searchInput" class="w-full p-2 mb-4 border rounded-md focus:outline-none focus:ring focus:border-blue-400" placeholder="Search...">

                <table class="w-full bg-white border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                        <th class="p-3 font-semibold text-left">User</th>
                            <th class="p-3 font-semibold text-left">worker</th>
                            <th class="p-3 font-semibold text-left">Appointment Date</th>
                            <th class="p-3 font-semibold text-left">Description</th>
                            <th class="p-3 font-semibold text-left">Reply</th>
                            <th class="p-3 font-semibold text-left">Status</th>
                            <th class="p-3 font-semibold text-left">Reg.Date</th>
                           
                           
                            <th class="p-3 font-semibold text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    <?php
                    
$sql = "SELECT * FROM book order by date desc";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr class='text-black'>
        <td class='p-3'> <?php echo $row["userid"]; ?> </td>
        <td class='p-3'> <?php echo $row["workerid"]; ?> </td>
        <td class='p-3'> <?php echo $row["appointmentdate"]; ?> </td>
        <td class='p-3'> <?php echo $row["description"]; ?> </td>
        <td class='p-3'> <?php echo $row["reply"]; ?> </td>
        <td class='p-3'> <?php echo $row["status"]; ?> </td>
       
        <td class='p-3'> <?php echo $row["date"]; ?> </td>
        
      
     <td class='p-3'>
     <a href='bookinghistory.php?id=<?php echo $row['id'] ; ?>&delete=delete' onClick="return confirm('Are you sure you want to delete?')" class='text-red-500 hover:underline'>Delete</a>
              
          
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
