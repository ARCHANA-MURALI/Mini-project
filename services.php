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
  <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
 
  <?php include('includes/navbar.php'); ?>
  <div class="flex">
  <?php include('includes/sidebar.php'); ?>
  <main class=" w-full p-6 ">
       
        <div class="  rounded-lg ">
            <div class=" max-w-full mx-auto p-6">
                <h1 class="text-3xl font-bold text-center text-white mb-4">Services</h1>

      

<div class="popup" id="addPopup">

    <form action="" method="post" class="space-y-4">
        <input type="text" name="category" required placeholder="category Name" class="border rounded p-2">
        <input type="submit" name="submitAdd" value="Add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </form>
    <button onclick="hidePopup('addPopup')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mt-2 rounded">Close</button>
</div>

<div class="popup" id="editPopup">
    <h3 class="text-lg font-bold mb-4">Edit Category</h3>
    <form action="" method="post" class="space-y-4">
        <input type="hidden" name="editId" id="editId">
        <input type="text" name="category" id="editcategory" required placeholder="category Name" class="border rounded p-2">
        <input type="submit" name="submitEdit" value="Update" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
    </form>
    <button onclick="hidePopup('editPopup')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mt-2 rounded">Close</button>
</div>


<input type="text" id="search" onkeyup="liveSearch()" placeholder="Search.." class="border rounded p-2 mb-4">

<table class="w-full border bg-white justify-center text-center">
    <tr class="border bg-gray-200">
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Category</th>
   
    </tr>
    <!-- PHP code to fetch and displaycategory data -->
    <?php

   
    
    if (isset($_POST['submitAdd'])) {
        $category = $_POST['category'];
        $query = "INSERT INTO category (name) VALUES ('$category')";
        mysqli_query($con, $query);
    } elseif (isset($_POST['submitEdit'])) {
        $editId = $_POST['editId'];
        $category = $_POST['category'];
        $query = "UPDATE category SET name='$category' WHERE id=$editId";
        mysqli_query($con, $query);
    }
    
    if (isset($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        $query = "DELETE FROM category WHERE id=$deleteId";
        mysqli_query($con, $query);
    }
    
    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    
    $query = "SELECT * FROM category";
    
    if (!empty($search)) {
        $query .= " WHERE category LIKE '%$search%'";
    }
    
    $result = mysqli_query($con, $query);
    $c=0;
    while ($row = mysqli_fetch_assoc($result)) {
        $c=$c+1;
        echo "<tr>";
        echo "<td class='px-4 py-2'>".$c."</td>";
        echo "<td class='px-4 py-2'>".$row['name']."</td>";
      
        echo "</tr>";
    }
    ?>
</table>
</div>
</div>
</main>

<script>
function showPopup(popupId) {
    document.getElementById(popupId + 'Popup').style.display = 'block';
}

function hidePopup(popupId) {
    document.getElementById(popupId + 'Popup').style.display = 'none';
}

function showEditPopup(id,category) {
    document.getElementById('editId').value = id;
    document.getElementById('editcategory').value =category;
    showPopup('edit');
}

function liveSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    table = document.getElementsByTagName('table')[0];
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}
</script>
</body>
</html>