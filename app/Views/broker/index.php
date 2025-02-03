<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validação de Anúncios - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('broker/templates/header') ?>

  <!-- Agent Stats Section -->
  <section class="text-white py-6">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Anúncios Pendentes</h3>
          <p class="text-2xl font-bold"> <?= esc($pending_ads) ?></p>
        </div>
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Aprovados Hoje</h3>
          <p class="text-2xl font-bold"> <?= esc($approved_today_ads) ?></p>
        </div>
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Reprovados</h3>
          <p class="text-2xl font-bold"> <?= esc($rejected_ads)?></p>
        </div>
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Total Validado</h3>
          <p class="text-2xl font-bold"> <?= esc($reviewed_ads)?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pending Reviews Section -->
  <section class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Últimas Submissões</h2>
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Usuário</th>
            <th scope="col" class="px-6 py-3">Tipo</th>
            <th scope="col" class="px-6 py-3">Endereço</th>
            <th scope="col" class="px-6 py-3">Data Submissão</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recent_ads as $ad): ?>
            <tr class="bg-white border-b hover:bg-gray-50">
              <td class="px-6 py-4"><?= esc($ad['id']) ?></td>
              <td class="px-6 py-4"><?= esc($ad['username']) ?></td>
              <td class="px-6 py-4"><?= esc($ad['property_type']) ?></td>
              <td class="px-6 py-4"><?= esc($ad['address']) ?></td>
              <td class="px-6 py-4"><?= date('d/m/Y H:i', strtotime($ad['created_at'])) ?></td>

              <td class="px-6 py-4">
                <?php if ($ad['status'] === 'pending'): ?>
                  <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Pendente</span>
                <?php elseif ($ad['status'] === 'approved'): ?>
                  <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Aprovado</span>
                <?php elseif ($ad['status'] === 'rejected'): ?>
                  <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Recusado</span>
                <?php endif; ?>
              </td>
              <td class="px-6 py-4">
                <a href="<?= base_url('broker/review/' . $ad['id']) ?>" class="font-medium text-blue-600 hover:underline mr-3">Revisar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <?php if (empty($recent_ads)): ?>
      <div class="text-center py-12">
        <p class="text-gray-600 text-lg"> Sem pré-anúncios recentes para revisão. </p>
        <a href="<?= base_url('broker/pending') ?>"
          class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
          Ver Anúncios Pendentes
        </a>
      </div>
    <?php endif; ?>
  </section>

  <!-- Quick Actions -->
  <section class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-4">Diretrizes</h3>
        <p class="text-gray-600 mb-4">Consulte as normas e diretrizes para validação</p>
        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Diretrizes</a>
      </div>

      <div class="bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-4">Relatórios</h3>
        <p class="text-gray-600 mb-4">Gere relatórios de validações</p>
        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Gerar Relatório</a>
      </div>

      <div class="bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-4">Suporte</h3>
        <p class="text-gray-600 mb-4">Contate o suporte para dúvidas</p>
        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Abrir Chamado</a>
      </div>
    </div>
  </section>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/index.js') ?>" async></script>
</body>

</html>