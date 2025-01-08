<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-xl w-full sm:w-96">
    <?php if (session()->getFlashdata('warning_username')): ?>
      <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?= session()->getFlashdata('warning_username') ?></span>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('warning_email')): ?>
      <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?= session()->getFlashdata('warning_email') ?></span>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('warning_passwords')): ?>
      <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?= session()->getFlashdata('warning_passwords') ?></span>
      </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Criar Conta</h2>
    <form action="<?= base_url('public/register') ?>" method="POST" enctype="multipart/form-data">

      <!-- Nome de Usuário -->
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">Nome de Usuário</label>
        <input type="text" name="username" id="username" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Nome -->
      <div class="mb-4">
        <label for="first_name" class="block text-sm font-medium text-gray-700">Nome</label>
        <input type="text" name="first_name" id="first_name" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Sobrenome -->
      <div class="mb-4">
        <label for="last_name" class="block text-sm font-medium text-gray-700">Sobrenome</label>
        <input type="text" name="last_name" id="last_name" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- E-mail -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" name="email" id="email" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Senha -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
        <input type="password" name="password" id="password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <div class="mb-4" id="confirm_password_div">
        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
        <input type="password" name="confirm_password" id="confirm_password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

        <p id="confirm_password_ok" class="mt-2 text-sm text-green-600 dark:text-green-500" style="display: none;"><span class="font-medium">Muito bem!</span> As senhas estão corretas.</p>
        <p id="confirm_password_not_ok" class="mt-2 text-sm text-red-600 dark:text-red-500" style="display: none;"><span class="font-medium">Oops!</span> As senhas estão diferentes!</p>

      </div>

      <!-- Foto de Perfil -->
      <div class="mb-4">
        <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
        <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Botão de Registro -->
      <div class="mb-4 text-center">
        <button type="submit" id="submit_button"
          class="w-full py-2 px-4 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50" disabled>
          Registrar
        </button>
      </div>

    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Já tem uma conta? <a href="<?= base_url('public/login'); ?>" class="text-indigo-600 hover:text-indigo-800">Entrar</a>
    </p>
  </div>

  <script src="<?= base_url('public/js/register.js') ?>"></script>
</body>

</html>