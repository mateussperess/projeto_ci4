<?php
// var_dump($profile_photo);
// echo base_url('uploads/profile_photos/' . esc($profile_photo['file_name']));
// exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minimal Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
    <div class="flex flex-col items-center">

      <!-- mensagem de sucesso caso os dados tenham sido alterados com sucesso -->
      <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('success_login')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline"><?= session()->getFlashdata('success_login') ?></span>
        </div>
      <?php endif; ?>

      <!-- Profile Picture -->
      <div class="w-44 h-44 mb-4">
        <img
          src="<?= isset($profile_photo) && $profile_photo ? base_url('public/uploads/profile_photos/' . esc($profile_photo['file_name'])) : base_url('public/uploads/profile_photos/default.png') ?>"
          alt="Profile Picture"
          class="rounded-full shadow-md w-full h-full object-cover">
      </div>

      <a href="<?= base_url('dashboard/edit_profile') ?>"
        class="mb-4 bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-blue-600 transition">
        <i class="fas fa-pencil-alt"></i>
      </a>

      <!-- User Name -->
      <h1 class="text-2xl font-semibold text-gray-900"><?= esc($username) ?></h1>
      <p class="text-gray-500 text-sm"> <?= esc($firstname) . ' ' . esc($lastname); ?> </p>

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

      <!-- Back to home Button -->
      <div class="flex justify-center mt-6">
        <form action="
        <?php
        switch ($user_role) {
          case 1:
            echo base_url('admin');
            break;
          case 2:
            echo base_url('dashboard');
            break;
          default:
            echo base_url('dashboard');
        }
        ?>" method="GET">
          <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
            Voltar
          </button>
        </form>
      </div>

      <div class="flex justify-center mt-6">
        <form action="<?= base_url('dashboard/logout'); ?>" method="POST">
          <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
            Logout
          </button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>