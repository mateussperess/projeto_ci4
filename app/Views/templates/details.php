<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($announcement['title']) ?> - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('templates/header') ?>

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detalhes do Imóvel</h2>
        <a href="<?= base_url('houses' . session()->get('user_id')) ?>" class="text-blue-600 hover:text-blue-800 flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Voltar para lista
        </a>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Left Column -->
        <div class="space-y-6">
          <!-- Image Carousel -->
          <?= view('components/details/carousel'); ?>

          <!-- Property Information -->
          <?= view('components/details/ad_info'); ?>

        </div>

        <!-- Right Column -->
        <div class="space-y-6">

          <!-- Property Specifications -->
          <?= view('components/details/ad_specs'); ?>

          <!-- Location -->
          <?= view('components/details/location'); ?>

          <!-- Advertiser Information -->
          <?= view('components/details/ad_owner'); ?>

          <!-- Enhanced Contact CTA -->
          <?php if (!(session()->get('logged_in'))): ?>
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg p-6">
              <h2 class="text-xl font-semibold mb-4">Interessado neste imóvel?</h2>
              <p class="mb-4">Nossos corretores estão prontos para te ajudar a encontrar o imóvel ideal.</p>
              <div class="flex gap-4">
                <a href="<?= base_url('login') ?>" class="flex-1 bg-white text-blue-600 text-center px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                  Fazer Login
                </a>
                <a href="<?= base_url('register') ?>" class="flex-1 border border-white text-center px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                  Criar Conta
                </a>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

  <?= view('templates/footer') ?>

  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/index.js') ?>" async></script>
  <script src="<?= base_url('public/js/carousel.js') ?>" async></script>
</body>

</html>