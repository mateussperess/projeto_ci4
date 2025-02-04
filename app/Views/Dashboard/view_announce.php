<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizar Anúncio - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('dashboard/templates/header') ?>

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detalhes do Imóvel</h2>
        <a href="<?= base_url('dashboard/announcements/' . session()->get('user_id')) ?>" class="text-blue-600 hover:text-blue-800 flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Voltar para lista
        </a>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Left Column -->
        <div class="space-y-6">

          <!-- Carousel wrapper -->
          <?= view('dashboard/components/view_announce_components/carousel'); ?>

          <!-- Property Information -->
          <?= view('dashboard/components/view_announce_components/announce_info'); ?>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">

          <!-- Property Specifications -->
          <?= view('dashboard/components/view_announce_components/announce_specs'); ?>
          
          <!-- Location Details -->
          <?= view('dashboard/components/view_announce_components/location_details'); ?>
          
          <!-- Stats Details -->
          <?= view('dashboard/components/view_announce_components/stats'); ?>
          
          <!-- Stats Details -->
           <?= view('dashboard/components/view_announce_components/contact'); ?>

        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>