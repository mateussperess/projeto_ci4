<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Peres Imóveis </title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">

  <script src="<?= base_url('public/js/index.js') ?>"></script>
</head>

<body class="bg-gray-100">

  <?= view('admin/templates/header') ?>

  <!-- Admin Stats Section -->
  <section class="bg-blue-600 text-white py-6">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Imóveis Ativos</h3>
          <p class="text-2xl font-bold">0</p>
        </div>
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Usuários</h3>
          <p class="text-2xl font-bold"> <?= $total_users; ?> </p>
        </div>
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Visitas Hoje</h3>
          <p class="text-2xl font-bold">0</p>
        </div>
        <div class="bg-blue-700 p-4 rounded-lg text-center">
          <h3 class="text-xl font-bold">Contatos</h3>
          <p class="text-2xl font-bold">0</p>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Botão de Voltar ao Topo -->
  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>
</body>

</html>