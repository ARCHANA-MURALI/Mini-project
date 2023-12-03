<?php
// error_reporting(0);
include('includes/config.php');
if(isset($_GET['delete'])){
    $id=$_GET['id'];
    $query=mysqli_query($con,"DELETE from user WHERE id = '$id'");
    if($query){
      echo "<script>alert('Successfully Deleted');</script>";
      echo "<script>window.location.assign('user.php');</script>"; 
    }
  }
//   if(isset($_GET['update'])){
//     $id=$_GET['update'];
//     $query=mysqli_query($con,"UPDATE user set status='verified' WHERE id = '$id'");
//     if($query){
//       echo "<script>alert('Successfully verified');</script>";
//       echo "<script>window.location.assign('user.php');</script>"; 
//     }
//   }

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
                <h1 class="text-3xl font-bold text-center text-white mb-4">User List</h1>

                <input type="text" id="searchInput" class="w-full p-2 mb-4 border rounded-md focus:outline-none focus:ring focus:border-blue-400" placeholder="Search...">

                <table class="w-full bg-white border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                        
                            <th class="p-3 font-semibold text-left">Name</th>
                            <th class="p-3 font-semibold text-left">Email Id</th>
                            <th class="p-3 font-semibold text-left">Gender</th>
                           
                            <th class="p-3 font-semibold text-left">Contact Number</th>
                           
                           
                           
                            
                            <th class="p-3 font-semibold text-left">Date</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    <?php
$sql = "SELECT * FROM user";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr class='text-black'>
        
        <td class='p-3'> <?php echo $row["name"]; ?> </td>
        <td class='p-3'> <?php echo $row["email"]; ?> </td>
        <td class='p-3'> <?php echo $row["gender"]; ?> </td>
       
        <td class='p-3'> <?php echo $row["phonenumber"]; ?> </td>
        
        <td class='p-3'> <?php echo $row["date"]; ?> </td>
        
      
    
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
