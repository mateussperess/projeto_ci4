<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-xl w-full sm:w-96">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Criar Conta</h2>
    <form action="<?= base_url('public/register') ?>" method="POST" enctype="multipart/form-data">

      <!-- Nome de Usuário -->
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">Nome de Usuário</label>
        <input type="text" name="username" id="username" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <?php
        if (isset($_GET['code']) && (int)$_GET['code'] === 409) {
          ?>
          <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <span class="font-medium">Este nome de usuário </span> já está em uso!
          </div>
          <?php
        }
      ?>

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

      <?php
        if (isset($_GET['code']) && (int)$_GET['code'] === 422) {
          ?>
          <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <span class="font-medium">O email fornecido</span> já está em uso!
          </div>
          <?php
        }
      ?>

      <!-- Senha -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
        <input type="password" name="password" id="password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Foto de Perfil -->
      <div class="mb-4">
        <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
        <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Botão de Registro -->
      <div class="mb-4 text-center">
        <button type="submit"
          class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
          Registrar
        </button>
      </div>

    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Já tem uma conta? <a href="/login" class="text-indigo-600 hover:text-indigo-800">Entrar</a>
    </p>
  </div>

</body>

</html>