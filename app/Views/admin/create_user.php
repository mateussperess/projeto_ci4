<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Usuário - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('admin/templates/header') ?>

  <div id="loading-screen" class="fixed inset-0 flex flex-col items-center justify-center bg-gray-100 bg-opacity-75 z-50 hidden ">
    <div role="status" class="flex flex-col items-center">
      <div class="w-16 h-16 border-4 border-blue-600 border-t-transparent rounded-full loading-spinner"></div>

      <h3 class="mt-4 text-lg font-semibold text-gray-800">Registrando usuário...</h3>
    </div>
  </div>
  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Cadastrar Novo Usuário</h2>
        <a href="<?= base_url('admin/users') ?>" class="text-blue-600 hover:text-blue-800">Voltar para Lista</a>
      </div>

      <?php if (session()->getFlashdata('warning_username')): ?>
        <div id="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline"><?= session()->getFlashdata('warning_username') ?></span>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('warning_email')): ?>
        <div id="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline"><?= session()->getFlashdata('warning_email') ?></span>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('warning_passwords')): ?>
        <div id="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline"><?= session()->getFlashdata('warning_passwords') ?></span>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('admin/users/save_user') ?>" method="POST" enctype="multipart/form-data">
        <!-- Profile Photo Section -->
        <div class="mb-6 text-center">
          <div class="mb-4">
            <img class="w-32 h-32 rounded-full mx-auto" src="<?= base_url('public/uploads/profile_photos/default.png') ?>" alt="Profile photo">
          </div>
          <div class="flex items-center justify-center">
            <input type="file" name="profile_photo" id="profile_photo" class="hidden" accept="image/*">
            <label for="profile_photo" class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-blue-600">
              Escolher Foto
            </label>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- User Information -->
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Nome de Usuário</label>
              <input id="username" type="text" name="username" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 <?= session()->getFlashdata('warning_username') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : '' ?>">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Nome</label>
              <input type="text" name="first_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Sobrenome</label>
              <input type="text" name="last_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
          </div>

          <!-- Contact and Role -->
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Email</label>
              <input id="email" type="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 <?= session()->getFlashdata('warning_email') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : '' ?>">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Tipo de Usuário</label>
              <select name="role_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="1">Administrador</option>
                <option value="2">Corretor</option>
                <option value="3" selected>Cliente</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Status</label>
              <select name="is_deleted" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="0" selected>Ativo</option>
                <option value="1">Inativo</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Password Section -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
          <h3 class="text-lg font-medium text-gray-900 mb-4">Definir Senha</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Senha</label>
              <input type="password" name="password" id="password" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div id="confirm_password_div">
              <label class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
              <input type="password" name="password_confirm" id="confirm_password" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
              
              <p id="confirm_password_ok" class="mt-2 text-sm text-green-600 dark:text-green-500" style="display: none;">
                <span class="font-medium">Muito bem!</span> As senhas estão corretas.</p>
              <p id="confirm_password_not_ok" class="mt-2 text-sm text-red-600 dark:text-red-500" style="display: none;">
                <span class="font-medium">Oops!</span> As senhas estão diferentes!</p>
            </div>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div class="mt-6 flex justify-end space-x-3">
          <button type="button" onclick="window.location.href='<?= base_url('admin/users') ?>'"
            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Cancelar
          </button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Cadastrar Usuário
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/admin/create_user.js') ?>"></script>
</body>
</html>
