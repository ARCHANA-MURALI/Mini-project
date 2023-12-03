<?php
 if($_SESSION['role']!="admin"){
echo "<script>window.location.assign('../index.php');</script>";

} ?>
<nav class="bg-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <a href="../index.php" class="text-2xl font-bold text-green-600 italic">QuickFixPro</a>
      <ul class="flex space-x-6">
        <li x-data="{ open: false }" class="relative">
          <button @click="open = !open" class="text-gray-700 hover:text-green-600 focus:outline-none">
            <span class="sr-only">Open User Menu</span>
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
          <ul x-show="open" @click.away="open = false" class="absolute z-10 right-0 mt-2 py-2 w-40 bg-white border rounded-lg shadow-md">
            
            <li><a href="changepassword.php" class="block px-4 py-2 text-gray-700 hover:bg-green-100">Change Password</a></li>
            <li><a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-green-100">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>