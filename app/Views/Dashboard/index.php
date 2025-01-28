<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">

</head>

<body class="bg-gray-100">

  <?= view('templates/header') ?>

  <!-- Catálogo de Imóveis -->
  <section id="catalogo" class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Catálogo</h2>
    <?= view('templates/carousel') ?>

    <h2 class="text-3xl font-bold text-center mb-8">Categorias</h2>
    <?= view('templates/categories_section') ?>
  </section>
  
  <?= view('templates/about') ?>
  <?= view('templates/contact') ?>
  <?= view('templates/footer') ?>

  <!-- Botão de Voltar ao Topo -->
  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>
  
  <script src="<?= base_url('public/js/index.js') ?>" async></script>
</body>

</html>