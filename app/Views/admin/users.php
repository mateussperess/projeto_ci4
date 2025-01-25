<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciar Usuários - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
  <script src="<?= base_url('public/js/index.js') ?>"></script>
</head>

<body class="bg-gray-100">
  <?= view('admin/templates/header') ?>

  <!-- Users Management Section -->
  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <!-- Header and Search -->
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Gerenciar Usuários</h2>
        <div class="flex space-x-4">
          <div class="relative">
            <input type="text" placeholder="Buscar usuários..."
              class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Adicionar Usuário
          </button>
        </div>
      </div>

      <!-- Users Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Usuário
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tipo
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ações
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php foreach ($users as $user): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full"
                      src="<?= isset($profile_photos[$user['id']]) ? base_url('public/uploads/profile_photos/' . $profile_photos[$user['id']]['file_name']) : base_url('public/uploads/profile_photos/default.png') ?>"
                      alt="<?= esc($user['username']) ?>">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        <?= esc($user['username']) ?>
                      </div>
                      <div class="text-sm text-gray-500">
                        <?= esc($user['first_name']) ?> <?= esc($user['last_name']) ?>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?= $user['role_id'] == 1 ? 'bg-purple-100 text-purple-800' : ($user['role_id'] == 2 ? 'bg-green-100 text-green-800' :
                                      'bg-blue-100 text-blue-800') ?>">
                    <?= $user['role_id'] == 1 ? 'Admin' : ($user['role_id'] == 2 ? 'Corretor' : 'Cliente') ?>
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= esc($user['email']) ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?= $user['is_deleted'] ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' ?>">
                    <?= $user['is_deleted'] ? 'Inativo' : 'Ativo' ?>
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex space-x-2">
                    <form action="<?= base_url('admin/edit_user/' . $user['id'])?>" method="GET" class="inline-flex">
                      <button class="text-blue-600 hover:text-blue-900">Editar</button>
                    </form>
                    <button type="button" data-modal-target="deactivateModal" data-modal-toggle="deactivateModal" onclick="showStatusModal(<?= $user['id'] ?>, <?= $user['is_deleted'] ?>)" class="text-red-600 hover:text-red-900">
                      <?= $user['is_deleted'] ? 'Ativar' : 'Desativar' ?>
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex items-center justify-between mt-6">
        <div class="flex items-center">
          <span class="text-sm text-gray-700">
            Mostrando <span class="font-medium">1</span> até <span class="font-medium"><?= min(10, count($users)) ?></span> de <span class="font-medium"><?= count($users) ?></span> resultados
          </span>
        </div>
        <?php if (count($users) > 25): ?>
          <div class="flex space-x-2">
            <button class="px-3 py-1 border rounded-md hover:bg-gray-100">Anterior</button>
            <button class="px-3 py-1 border rounded-md bg-blue-600 text-white">1</button>
            <button class="px-3 py-1 border rounded-md hover:bg-gray-100">2</button>
            <button class="px-3 py-1 border rounded-md hover:bg-gray-100">Próximo</button>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <!-- Modal -->
  <div id="deactivateModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="deactivateModal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
        </button>
        <div class="p-4 md:p-5 text-center">
          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500" id="modalText"></h3>
          <form id="statusForm" action="<?= base_url('admin/toggle_user_status') ?>" method="POST" class="inline-flex">
            <input type="hidden" name="user_id" id="userIdToToggle">
            <input type="hidden" name="current_status" id="currentStatus">
            <button type="submit" id="confirmButton" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
              Sim, continuar
            </button>
            <button data-modal-hide="deactivateModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
              Não, cancelar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript for modal handling -->
  <script>
    function showStatusModal(userId, isDeleted) {
      document.getElementById('userIdToToggle').value = userId;
      document.getElementById('currentStatus').value = isDeleted;
      document.getElementById('modalText').textContent = isDeleted ?
        'Tem certeza que deseja ativar este usuário?' :
        'Tem certeza que deseja desativar este usuário?';
      document.getElementById('confirmButton').textContent = isDeleted ?
        'Sim, ativar' :
        'Sim, desativar';

      const modal = document.getElementById('deactivateModal');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }
  </script>
</body>

</html>