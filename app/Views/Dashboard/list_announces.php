<!DOCTYPE html>
<html lang="pt-BR">

<?php
// var_dump($announcements);
// exit;
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meus Anúncios - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('dashboard/templates/header') ?>

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Meus Anúncios</h2>
        <div class="flex space-x-4">
          <div class="relative">
            <input type="text" placeholder="Buscar anúncios..."
              class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <a href="<?= base_url('dashboard/announce') ?>"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Novo Anúncio
          </a>
        </div>
      </div>

      <div class="container mx-auto px-4 py-8">
        <?php if (session()->getFlashdata('success')): ?>
          <div id="success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($announcements as $announcement): ?>
          <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition">
            <img src="<?= base_url('public/uploads/property_photos/' . $announcement['main_photo']); ?>"
              alt="<?= esc($announcement['title']) ?>"
              class="w-full h-48 object-cover">

            <div class="p-4">
              <div class="flex justify-between items-start mb-2">
                <h3 class="text-xl font-semibold text-gray-800"><?= esc($announcement['title']) ?></h3>
                <span class="px-2 py-1 text-sm rounded-full <?= $announcement['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' ?>">
                  <?= $announcement['status'] === 'pending' ? 'Pendente' : 'Aprovado' ?>
                </span>
              </div>

              <p class="text-gray-600 mb-4"><?= substr(esc($announcement['description']), 0, 100) ?>...</p>

              <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-blue-600">
                  R$ <?= number_format($announcement['price'], 2, ',', '.') ?>
                </span>
                <div class="flex space-x-2">
                  <button class="text-blue-600 hover:text-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if (empty($announcements)): ?>
        <div class="text-center py-12">
          <p class="text-gray-600 text-lg">Você ainda não possui nenhum anúncio.</p>
          <a href="<?= base_url('dashboard/announce') ?>"
            class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            Criar Primeiro Anúncio
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/index.js') ?>" async></script>
  <script src="<?= base_url('public/js/announcements.js') ?>" async></script>
</body>

</html>