<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
  <!-- Recent Users -->
  <div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-xl font-bold text-gray-800">Últimos Usuários</h3>
      <a href="<?= base_url('admin/users') ?>" class="text-blue-600 hover:text-blue-800 text-sm">Ver todos</a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuário</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach ($recent_users as $user): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4">
                <div class="flex items-center">
                  <img class="h-10 w-10 rounded-full object-cover"
                    src="<?= base_url($user['profile_photo'] ? $user['profile_photo'] : 'public/uploads/profile_photos/default.png') ?>"
                    alt="<?= esc($user['username']) ?>">

                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900"><?= esc($user['first_name']) ?> <?= esc($user['last_name']) ?></div>
                    <div class="text-sm text-gray-500"><?= esc($user['email']) ?></div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                <?= $user['role_id'] == 1 ? 'bg-purple-100 text-purple-800' : ($user['role_id'] == 2 ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800') ?>">
                  <?= $user['role_id'] == 1 ? 'Admin' : ($user['role_id'] == 2 ? 'Corretor' : 'Cliente') ?>
                </span>
              </td>
              <td class="px-6 py-4 text-sm text-gray-500">
                <?= date('d/m/Y', strtotime($user['created_at'])) ?>
              </td>
              <td class="px-6 py-4">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                <?= $user['is_deleted'] ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' ?>">
                  <?= $user['is_deleted'] ? 'Inativo' : 'Ativo' ?>
                </span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Recent Announcements -->
  <div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-xl font-bold text-gray-800">Últimos Anúncios</h3>
      <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Ver todos</a>
    </div>

    <div class="space-y-4">
      <?php foreach ($recent_announcements as $announcement): ?>
        <div class="flex items-center p-4 border rounded-lg hover:bg-gray-50">
          <img class="h-16 w-16 rounded-lg object-cover"
            src="<?= base_url('public/uploads/property_photos/' . $announcement['main_photo']) ?>"
            alt="<?= esc($announcement['title']) ?>">
          <div class="ml-4 flex-1">
            <div class="flex justify-between items-start">
              <div>
                <h4 class="text-sm font-medium text-gray-900"><?= esc($announcement['title']) ?></h4>
                <p class="text-sm text-gray-500"><?= esc($announcement['address']) ?></p>
              </div>
              <span class="px-2 py-1 text-xs font-semibold rounded-full 
                <?php
                    switch ($announcement['status']) {
                      case 'approved':
                        echo 'bg-green-100 text-green-800';
                        break;
                      case 'rejected':
                        echo 'bg-red-100 text-red-800';
                        break;
                      default:
                        echo 'bg-yellow-100 text-yellow-800';
                    }
                ?>">
                <?php
                  switch ($announcement['status']) {
                    case 'approved':
                      echo 'Aprovado';
                      break;
                    case 'rejected':
                      echo 'Rejeitado';
                      break;
                    default:
                      echo 'Pendente';
                  }
                ?>
              </span>
            </div>
            <div class="mt-2 flex justify-between items-center">
              <span class="text-sm font-medium text-gray-900">
                R$ <?= number_format($announcement['price'], 2, ',', '.') ?>
              </span>
              <span class="text-sm text-gray-500">
                <?= date('d/m/Y', strtotime($announcement['created_at'])) ?>
              </span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>