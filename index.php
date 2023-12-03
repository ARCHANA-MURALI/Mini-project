<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickFixpro- Book a Service</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="bg-gradient-to-r from-green-400 to-green-600">
  <?php include('header.php'); ?>

  <header class="container mx-auto py-16 text-center">
    <h1 class="text-5xl font-bold text-white mb-6 animate__animated animate__fadeInDown">Book the Right Service</h1>
    <p class="text-xl text-gray-300 mb-8 animate__animated animate__fadeInUp">Your reliable source for various home services.</p>
    <a href="userlogin.php" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
      Get Started
    </a>
  </header>
  
  <!-- How to Book Section -->
  <section class="bg-gray-100 py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-6">How to Book</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-green-200 p-8 shadow-md rounded-md flex flex-col justify-between">
          <div>
            <h3 class="text-xl font-bold text-green-800 mb-2">Browse Services</h3>
            <p class="text-gray-700 mb-4">Explore our range of home services.</p>
          </div>
        </div>
        <div class="bg-green-200 p-8 shadow-md rounded-md flex flex-col justify-between">
          <div>
            <h3 class="text-xl font-bold text-green-800 mb-2">Select Your Service</h3>
            <p class="text-gray-700 mb-4">Choose the service you need from our trusted providers.</p>
          </div>
        </div>
        <div class="bg-green-200 p-8 shadow-md rounded-md flex flex-col justify-between">
          <div>
            <h3 class="text-xl font-bold text-green-800 mb-2">Book a Service</h3>
            <p class="text-gray-700 mb-4">Schedule your service by clicking "Book Now."</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Services Section -->
  <section class="bg-gray-100 py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Services</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Service Card 1 -->
        <div class="bg-green-200 p-6 shadow-md rounded-md">
          <h3 class="text-xl font-bold text-green-800 mb-2">Cleaning Services</h3>
          <p class="text-gray-700">Professional cleaning for your home or office.</p>
        </div>
        <!-- Service Card 2 -->
        <div class="bg-green-200 p-6 shadow-md rounded-md">
          <h3 class="text-xl font-bold text-green-800 mb-2">Electrical Services</h3>
          <p class="text-gray-700">Electrical repairs, installations, and more.</p>
        </div>
        
        <!-- Service Card 3 -->
        <div class="bg-green-200 p-6 shadow-md rounded-md">
          <h3 class="text-xl font-bold text-green-800 mb-2">Plumbing Services</h3>
          <p class="text-gray-700">Professional plumbing solutions.</p>
        </div>






   <!-- Service Card 4 -->
   <div class="bg-green-200 p-6 shadow-md rounded-md">
          <h3 class="text-xl font-bold text-green-800 mb-2">VehicleCare  Services</h3>
          <p class="text-gray-700">By maintaning your vehicles value and improve its performance,regular serving it also helps extends it lifespan .</p>
        </div>
        <!-- Service Card 5 -->
   <div class="bg-green-200 p-6 shadow-md rounded-md">
          <h3 class="text-xl font-bold text-green-800 mb-2">Petcare  Services</h3>
          <p class="text-gray-700">  premises used to provide for the grooming of domestic animals. A veterinary hospital or a kennel are not pet services.</p>
           </div>
        <!-- Service Card 6 -->
   <div class="bg-green-200 p-6 shadow-md rounded-md">
          <h3 class="text-xl font-bold text-green-800 mb-2">Home Paint Services</h3>
          <p class="text-gray-700">  Asian Painting Service at GreatSelections Attractive Results Get More Results Online Information  .</p>
           </div>
 <!-- Service Card 7-->
 <div class="bg-green-200 p-6 shadow-md rounded-md">
          <h3 class="text-xl font-bold text-green-800 mb-2">Dometic Services</h3>
          <p class="text-gray-700">  Dometic Service offers hassle-free servicing, installations and repairs for your motorhome, panel van or caravan Our technicians will contact you within 48 .</p>
           </div>



        

        <!-- Add more service cards here -->
      </div>
    </div>
  </section>

  <!-- Client Testimonials Section -->
  <section class="bg-white py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-6">Client Testimonials</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Testimonial Card 1 -->
        <div class="bg-green-200 p-6 shadow-md rounded-md">
          <p class="text-gray-700 mb-4">"I'm extremely satisfied with the services provided by Clean Kerala. They helped me with my home cleaning, and the results were fantastic."</p>
          <p class="text-gray-800 font-bold">- Sarah Johnson</p>
        </div>
        <!-- Testimonial Card 2 -->
        <div class="bg-green-200 p-6 shadow-md rounded-md">
          <p class="text-gray-700 mb-4">"The electricians from Clean Kerala were punctual and professional. They fixed my electrical issues quickly."</p>
          <p class="text-gray-800 font-bold">- Mark Thompson</p>
        </div>
        <div class="bg-green-200 p-6 shadow-md rounded-md">
          <p class="text-gray-700 mb-4">"Outstanding plumbing services! Clean Kerala saved me from a major plumbing disaster."</p>
          <p class="text-gray-800 font-bold">- Emily Martinez</p>
        </div>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
