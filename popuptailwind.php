<div class="hidden fixed top-40 left-1/2 transform -translate-x-1/2 bg-white max-w-md w-full p-6 rounded-lg shadow-md backdrop-blur-sm" id="popup">
    <div class="flex justify-between">
      <h1 class="text-xl">Book Appointment</h1>
      <span class="hover:bg-blue-200 p-1 cursor-pointer"><i class="fas fa-times" onclick="hide();"></i></span>
    </div>
    <form method="post">
      <label for="name" class="mt-4">Name:</label>
      <input type="text" id="full_name" name="full_name" value="<?php echo $_SESSION['full_name']; ?>" placeholder="Enter your name" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <label for="email" class="mt-4">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <label for="password" class="mt-4">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <label for="date" class="mt-4">Date of Appointment:</label>
      <input type="date" id="date" name="date" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 mt-4 rounded-lg hover:bg-blue-600">Book Now</button>
    </form>
  </div>