<?php
var_dump($profile_photo);
exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minimal Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
    <div class="flex flex-col items-center">
      <!-- Profile Picture -->
      <div class="w-24 h-24 mb-4">
        <img
          src="<?= base_url('uploads/profile_photos/' . esc($profile_photo['file_name'])) ?>"
          alt="Profile Picture"
          class="rounded-full shadow-md w-full h-full object-cover">
      </div>

      <!-- User Name -->
      <h1 class="text-2xl font-semibold text-gray-900"><?= esc($username) ?></h1>
      <p class="text-gray-500 text-sm">Software Developer</p>

      <!-- About Section -->
      <p class="mt-4 text-gray-600 text-center">
        Passionate about building intuitive and scalable web applications. Lover of minimal design and clean code.
      </p>

      <!-- Stats -->
      <div class="flex justify-between w-full mt-6">
        <div class="text-center">
          <h2 class="text-lg font-bold text-gray-800">150</h2>
          <p class="text-gray-500 text-sm">Posts</p>
        </div>
        <div class="text-center">
          <h2 class="text-lg font-bold text-gray-800">2.3k</h2>
          <p class="text-gray-500 text-sm">Followers</p>
        </div>
        <div class="text-center">
          <h2 class="text-lg font-bold text-gray-800">350</h2>
          <p class="text-gray-500 text-sm">Following</p>
        </div>
      </div>

      <!-- Logout Button -->
      <div class="flex justify-center mt-6">
        <form action="<?= base_url('public/logout') ?>" method="post">
          <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
            Logout
          </button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>