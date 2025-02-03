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

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
      <!-- Profile Header -->
      <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <h1 class="text-2xl font-bold">Meu Perfil</h1>
        <p class="text-blue-100">Gerencie suas informações pessoais</p>
      </div>

      <div class="p-6">
        <div class="flex flex-col md:flex-row gap-8">

          <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
              <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
            </div>
          <?php endif; ?>

          <div class="md:w-1/3">
            <div class="text-center">
              <img class="w-48 h-48 rounded-full mx-auto border-4 border-white shadow-lg object-cover"
                src="<?= base_url('public/uploads/profile_photos/' . (session()->get('profile_photo') ? esc(session()->get('profile_photo')['file_name']) : 'default.png')) ?>"
                alt="Foto do perfil">
              <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Alterar Foto
              </button>
            </div>
          </div>

          <!-- Right Column - Info -->
          <div class="md:w-2/3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700">Nome</label>
                  <input type="text" value="<?= esc($firstname) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" readonly>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Sobrenome</label>
                  <input type="text" value="<?= esc($lastname) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" readonly>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="email" value="<?= esc(session()->get('email')) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" readonly>
                </div>
              </div>

              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700">CRECI</label>
                  <input type="text" value="<?= esc(session()->get('creci')) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" readonly>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Status da Conta</label>
                  <?php if ($is_deleted != null) : ?>
                    <span class="inline-flex mt-1 px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                      Ativo
                    </span>
                  <?php else : ?>
                    <span class="inline-flex mt-1 px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                      Inativo
                    </span>
                  <?php endif; ?>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Data de Registro</label>
                  <input type="text" value="<?= date('d/m/Y', strtotime($created_at)) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" readonly>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
              <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Alterar Senha
              </button>
              <button class="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Editar Perfil
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?= view('templates/footer') ?>

</body>

</html>