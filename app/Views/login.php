<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Link para o Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
    <?php if (session()->getFlashdata('error')): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
      </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Entrar</h2>

    <!-- Formulário de login -->
    <form action="<?= base_url('public/login') ?>" method="POST">
      <div class="mb-4">
        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
        <input type="text" id="email" name="email" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div class="mb-6">
        <label for="password" class="block text-sm font-semibold text-gray-700">Senha</label>
        <input type="password" id="password" name="password" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>

      <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Entrar</button>
    </form>

    <!-- Link para recuperação de senha (opcional) -->
    <div class="text-center mt-4">
      <a href="#" class="text-sm text-blue-500 hover:underline">Esqueceu a senha?</a>
    </div>

    <!-- Link para criar conta (opcional) -->
    <div class="text-center mt-4">
      <span>Não possui uma conta? </span><a href="register" class="text-sm text-blue-500 hover:underline">Criar agora!</a>
    </div>
  </div>

</body>

</html>