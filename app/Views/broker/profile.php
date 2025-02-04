<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Corretor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-50">

  <?= view('broker/templates/header') ?>
  <form action="<?= base_url('broker/update_profile') ?>" method="POST" enctype="multipart/form-data">
    <div class="container mx-auto px-4 py-8">
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Profile Header -->
        <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
          <h1 class="text-2xl font-bold">Meu Perfil</h1>
          <p class="text-blue-100">Gerencie suas informações pessoais</p>
        </div>

        <div class="p-6">

          <?php if (session()->getFlashdata('success')): ?>
            <div id="success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
              <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
            </div>
          <?php endif; ?>

          <?php if (session()->getFlashdata('error')): ?>
            <div id="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
              <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
            </div>
          <?php endif; ?>

          <div class="flex flex-col md:flex-row gap-8">
            <!-- Photo section -->
            <div class="md:w-1/3">
              <div class="text-center">
                <img class="w-48 h-48 rounded-full mx-auto border-4 border-white shadow-lg object-cover"
                  src="<?= base_url('public/uploads/profile_photos/' . ($profile_photo ? esc($profile_photo['file_name']) : 'default.png')) ?>"
                  alt="Foto do perfil">
                <input type="file" name="profile_photo" id="profile_photo" class="hidden">
                <label for="profile_photo" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition cursor-pointer inline-block">
                  Alterar Foto
                </label>
              </div>
            </div>

            <!-- Info section -->
            <div class="md:w-2/3">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Nome de Usuário</label>
                    <input type="text" name="username" value="<?= esc($username) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="first_name" value="<?= esc($firstname) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Sobrenome</label>
                    <input type="text" name="last_name" value="<?= esc($lastname) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="<?= esc(session()->get('email')) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  </div>

                </div>

                <div class="space-y-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Data de Registro</label>
                    <input type="text" value="<?= date('d/m/Y', strtotime($created_at)) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" readonly>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Nova Senha</label>
                    <input type="password" name="new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700">Confirmar Nova Senha</label>
                    <input type="password" name="confirm_new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Mensagem/Bio</label>
                    <textarea
                      id="bio"
                      name="bio"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                      style="resize: none; height: 4rem;"
                      maxlength="50"
                      oninput="updateCounter()"> <?= esc($message) ?>
                  </textarea>
                    <!-- Contador -->
                    <div class="text-sm text-gray-600 mt-1" id="charCounterDiv">
                      <span id="charCounter">0</span>/50 caracteres
                    </div>
                  </div>
                </div>
              </div>


              <!-- Action Buttons -->
              <div class="mt-8 flex justify-end space-x-4">
                <a href="<?= base_url('/') ?>" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  Voltar
                </a>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  Salvar Alterações
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </form>

  <script src="<?= base_url('public/js/broker/edit_profile.js') ?>" async></script>

  <script>
    function updateCounter() {
      const bioInput = document.getElementById('bio');
      const charCounter = document.getElementById('charCounter');
      const charCounterDiv = document.getElementById('charCounterDiv');
      charCounter.textContent = bioInput.value.length;

      if (bioInput.value.length === 50) {
        charCounterDiv.style.color = 'red';
      } else {
        charCounterDiv.style.color = 'black';
      }
    }
  </script>
</body>

</html>