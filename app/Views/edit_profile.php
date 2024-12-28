<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
    <form action="<?= base_url('public/update_profile') ?>" method="post" enctype="multipart/form-data">
      <div class="flex flex-col items-center">
        <!-- Profile Picture -->
        <div class="w-32 h-32 mb-4 relative">
          <img
            src="<?= base_url('public/uploads/profile_photos/' . esc($profile_photo['file_name'])) ?>"
            alt="Profile Picture"
            class="rounded-full shadow-md w-full h-full object-cover">
          <!-- Edit Button -->
          <label for="profile_photo"
            class="absolute bottom-0 right-0 bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-blue-600 transition cursor-pointer">
            <i class="fas fa-pencil-alt"></i>
            <input type="file" name="profile_photo" id="profile_photo" class="hidden">
          </label>
        </div>

        <!-- User Name -->
        <div class="mb-4 w-full">
          <label for="username" class="block text-gray-700">Username</label>
          <input type="text" name="username" id="username" value="<?= esc($username) ?>" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- First Name -->
        <div class="mb-4 w-full">
          <label for="first_name" class="block text-gray-700">First Name</label>
          <input type="text" name="first_name" id="first_name" value="<?= esc($first_name) ?>" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Last Name -->
        <div class="mb-4 w-full">
          <label for="last_name" class="block text-gray-700">Last Name</label>
          <input type="text" name="last_name" id="last_name" value="<?= esc($last_name) ?>" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Email -->
        <div class="mb-4 w-full">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" name="email" id="email" value="<?= esc($email) ?>" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar Perfil</button>
      </div>
    </form>
    <div class="flex justify-center mt-6">
      <form action="<?= base_url('public/profile') ?>" method="get">
        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
          Voltar
        </button>
      </form>
    </div>
  </div>
</body>

</html>