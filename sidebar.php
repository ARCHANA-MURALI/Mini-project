<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<aside class="bg-green-600 min-h-screen w-64 py-4 text-white">
  <div class="flex flex-col h-full justify-between">
    <nav>
      <ul class="space-y-4">
        <li><a href="dashboard.php" class="block hover:text-green-200 px-4"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="user.php" class="block hover:text-green-200 px-4"><i class="fas fa-user"></i> User</a></li>      
        <li><a href="services.php" class="block hover:text-green-200 px-4"><i class="fas fa-male"></i>  Services</a></li>      
        <li><a href="booking.php" class="block hover:text-green-200 px-4"><i class="fas fa-calendar-check"></i> Bookings</a></li>
        <li x-data="{ open1: false }" class="relative group">
          <button @click="open1 = !open1" class="block w-full text-left hover:text-green-200 focus:outline-none px-4">
            <i class="fas fa-cogs"></i> Settings
            <span class="absolute inset-y-0 right-0 flex items-center pr-2">
              <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </span>
          </button>
          <ul x-show="open1" @click.away="open1 = false" class="absolute z-10 right-0 mt-2 py-2 w-40 bg-green-500 border rounded-lg shadow-md">
            <li><a href="profile.php" class="block px-4 py-2 text-white hover:bg-green-600">Profile</a></li>
            <li><a href="changepassword.php" class="block px-4 py-2 text-white hover:bg-green-600">Change Password</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="mb-4">
      <p class="text-gray-400 text-center">&copy; 2023 Clean Kerala. All rights reserved.</p>
    </div>
  </div>
</aside>
