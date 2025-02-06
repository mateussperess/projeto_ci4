<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casas - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?php
  if (session()->get('user_id')) {
    echo view('dashboard/templates/header');
  } else {
    echo view('templates/header');
  }
  ?>
  <!-- Houses Catalog Section -->
  <section class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8">
      <div class="flex flex-col gap-4 mb-8">
        <a href="<?= base_url() ?>" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition w-fit">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          <span>Voltar</span>
        </a>

        <div class="flex justify-between items-center">
          <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <h2 class="text-3xl font-bold text-gray-800">Terrenos Disponíveis</h2>
          </div>

          <!-- Filters -->
          <div class="flex gap-4">
            <select class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
              <option value="">Ordenar por</option>
              <option value="price_asc">Menor Preço</option>
              <option value="price_desc">Maior Preço</option>
              <option value="newest">Mais Recentes</option>
            </select>

            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
              Filtrar
            </button>
          </div>
        </div>
      </div>

      <?php if (!empty($lands)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php foreach ($lands as $land): ?>
            <?= view('components/ad_card', ['land' => $land]) ?>
          <?php endforeach; ?>
        </div>

      <?php else: ?>
        <div class="text-center py-12">
          <p class="text-gray-600 text-lg">Não há anúncios disponíveis.</p>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <?= view('templates/footer') ?>

  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/index.js') ?>" async></script>
</body>

</html>