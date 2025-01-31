<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anúncios Revisados - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('broker/templates/header') ?>

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Anúncios Revisados</h2>
        <div class="flex space-x-4">
          <div class="relative">
            <input type="text" placeholder="Buscar anúncios..."
              class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <select class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="all">Todos os Status</option>
            <option value="approved">Aprovados</option>
            <option value="rejected">Recusados</option>
          </select>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imóvel</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Revisão</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php foreach ($announcements as $announcement): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                  <div class="flex items-center">
                    <img class="h-16 w-16 rounded-lg object-cover"
                      src="<?= base_url($announcement['photos'][0]['file_path']) ?>"
                      alt="<?= esc($announcement['title']) ?>">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900"><?= esc($announcement['title']) ?></div>
                      <div class="text-sm text-gray-500"><?= esc($announcement['address']) ?></div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full"
                      src="<?= base_url($announcement['user_photo']) ?>"
                      alt="<?= esc($announcement['first_name']) ?> <?= esc($announcement['last_name']) ?>">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        <?= esc($announcement['first_name']) ?> <?= esc($announcement['last_name']) ?>
                      </div>
                      <div class="text-sm text-gray-500">
                        <?= esc($announcement['email']) ?>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    <?= $announcement['status'] === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                    <?= $announcement['status'] === 'approved' ? 'Aprovado' : 'Recusado' ?>
                  </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  R$ <?= number_format($announcement['price'], 2, ',', '.') ?>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  <?= date('d/m/Y H:i', strtotime($announcement['updated_at'])) ?>
                </td>
                <td class="px-6 py-4">
                  <button onclick="window.location.href='<?= base_url('broker/details/' . $announcement['id']) ?>'"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Detalhes
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <?php if (empty($announcements)): ?>
        <div class="text-center py-12">
          <p class="text-gray-600 text-lg">Não há anúncios revisados.</p>
        </div>
      <?php endif; ?>

      <!-- Pagination -->
      <div class="flex items-center justify-between mt-6">
        <div class="flex items-center">
          <span class="text-sm text-gray-700">
            Mostrando <span class="font-medium">1</span> até <span class="font-medium">10</span> de <span class="font-medium"><?= count($announcements) ?></span> resultados
          </span>
        </div>
        <div class="flex space-x-2">
          <button class="px-3 py-1 border rounded-md hover:bg-gray-100">Anterior</button>
          <button class="px-3 py-1 border rounded-md bg-blue-600 text-white">1</button>
          <button class="px-3 py-1 border rounded-md hover:bg-gray-100">2</button>
          <button class="px-3 py-1 border rounded-md hover:bg-gray-100">Próximo</button>
        </div>
      </div>
    </div>
  </div>

  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/index.js') ?>" async></script>
</body>

</html>