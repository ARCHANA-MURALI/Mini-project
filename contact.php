<?php
// Include the database configuration
include('includes/config.php');



// Check if the form is submitted
if (isset($_POST['submitReply'])) {
    $id = $_POST['id'];
    $reply = $_POST['replyText'];
    $email = $_POST['email'];
    $to_email = $email;
    $subject = "Reply from Admin";
    $body =$reply;
    $headers = "From:your@gmail.com";
    if (mail($to_email, $subject, $body, $headers)) {
       echo "<script>alert(' successfully sent to $email');</script>";
       $query = "UPDATE contact SET status = 'verified', reply = '$reply' WHERE id = $id";
       mysqli_query($con, $query);
       echo "<script>alert('Successfully Updated');</script>";
    echo "<script>window.location.assign('contact.php');</script>"; 
   
    } else {
        echo "<script>alert('sending failed');</script>";
    }
    // Update the contact record and send email
    

    // Reload the page to show updated data
    
}


function getContactList($con)
{
    $query = "SELECT * FROM contact ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    return $result;
}

// Retrieve the contact list
$contactList = getContactList($con);
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
    
  <main class="w-full p-6 ">
      
        <h2 class="text-3xl font-bold mb-6 text-center text-white">Contact List</h2>

<!-- Form to submit the reply -->
 <!-- Reply Modal -->
<div id="replyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
<div class="bg-white p-6 rounded-lg shadow-md w-3/5">
    <h2 class="text-xl font-semibold mb-4">Enter Reply</h2>
    <form id="replyForm" method="post">
        <input type="hidden" id="contactId" name="id" value="">
        <input type="hidden" id="contactEmail" name="email" value="">
        <textarea name="replyText" id="replyText" rows="4" class="w-full p-2 mb-4 border rounded-md"></textarea>
        <div class="flex justify-end">
            <button type="button" class="mr-4 px-4 py-2 bg-gray-300 rounded-md" onclick="closeReplyModal()">Cancel</button>
            <button type="submit" name="submitReply" class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit</button>
        </div>
    </form>
</div>
</div>

<!-- Search Bar -->
<div class="mb-4 flex justify-center">
    <input type="text" id="searchInput" class="w-full px-4 py-2 w-64 border rounded-md" placeholder="Search...">
</div>

<!-- Contact List Table -->
<div class="bg-white p-4 rounded-lg shadow">
    <?php if (mysqli_num_rows($contactList) > 0) { ?>
        <table id="contactTable" class="table-auto w-full">
            <thead>
                <tr class='bg-gray-200'>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Reply</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($contactList)) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $row['id']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['name']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['email']; ?></td>
                      
                        <td class="border px-4 py-2"><?php echo $row['status']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['date']; ?></td>
                        <td class="border px-4 py-2">
                            <?php if ($row['status'] === 'not verified') { ?>
                                <button class="bg-blue-500 text-white px-2 py-1 rounded-md" onclick="openReplyModal(<?php echo $row['id']; ?>,'<?php echo $row['email']; ?>')">Reply</button>
                            <?php } else { echo $row['reply']; } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center text-gray-600">No contact records found.</p>
    <?php } ?>
</div>
    </main>
    <script>
        // Function to open the reply modal
        function openReplyModal(id, email) {
            const modal = document.getElementById('replyModal');
            modal.classList.remove('hidden');

            // Set the ID and email of the contact for which the reply is being entered
            document.getElementById('contactId').value = id;
            document.getElementById('contactEmail').value = email;
        }

        // Function to close the reply modal
        function closeReplyModal() {
            const modal = document.getElementById('replyModal');
            modal.classList.add('hidden');
        }
    

        // Function to handle the search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#contactTable tbody tr');

            rows.forEach(row => {
                const columns = row.getElementsByTagName('td');
                let showRow = false;
                for (let i = 1; i < columns.length - 1; i++) {
                    const columnText = columns[i].textContent.toLowerCase();
                    if (columnText.includes(searchValue)) {
                        showRow = true;
                        break;
                    }
                }
                row.style.display = showRow ? '' : 'none';
            });
        });
    </script>

        </div>
</body>
</html>
