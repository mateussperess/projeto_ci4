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

  <!-- apartments Catalog Section -->
  <section class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Apartamentos Disponíveis</h2>

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

      <!-- apartments Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- House Card -->
        <?php foreach ($apartments as $apartment): ?>
          <?= view('components/ad_card', ['apartment' => $apartment]) ?>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

  <?= view('templates/footer') ?>

  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/index.js') ?>" async></script>
</body>

</html>