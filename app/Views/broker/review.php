<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Revisão do Anúncio - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('broker/templates/header') ?>

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-8">

      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Revisão do Anúncio</h2>
        <a href="<?= base_url('broker/pending') ?>" class="text-blue-600 hover:text-blue-800 flex items-center">
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
          <div class="bg-gray-50 p-4 rounded-lg">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
              <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <?php foreach ($ad_photos as $index => $photo): ?>
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="<?= base_url($photo['file_path']) ?>"
                      class="absolute block w-full h-full object-cover top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                      alt="Imagem do imóvel <?= $index + 1 ?>">
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- Slider indicators -->
              <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <?php foreach ($ad_photos as $index => $photo): ?>
                  <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="<?= $index ?>"></button>
                <?php endforeach; ?>
              </div>

              <!-- Slider controls -->
              <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                  <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                  </svg>
                  <span class="sr-only">Previous</span>
                </span>
              </button>
              <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                  <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                  </svg>
                  <span class="sr-only">Next</span>
                </span>
              </button>
            </div>
          </div>

          <!-- Property Information -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-2"><?= esc($announcement['title']) ?></h3>
            <div class="grid grid-cols-2 gap-4 mt-4">
              <div class="bg-white p-4 rounded-lg">
                <p class="text-gray-600">Preço</p>
                <p class="text-xl font-bold text-blue-600">R$ <?= number_format($announcement['price'], 2, ',', '.') ?></p>
              </div>
              <div class="bg-white p-4 rounded-lg">
                <p class="text-gray-600">Tipo de Transação</p>
                <p class="font-semibold"><?= $announcement['transaction_type'] == 'sale' ? 'Venda' : 'Aluguel' ?></p>
              </div>
              <div class="bg-white p-4 rounded-lg">
                <p class="text-gray-600">Área Total</p>
                <p class="font-semibold"><?= esc($announcement['total_area']) ?> m²</p>
              </div>
              <div class="bg-white p-4 rounded-lg">
                <p class="text-gray-600">Tipo de Imóvel</p>
                <p class="font-semibold">
                  <?php
                  switch ($announcement['property_type_id']) {
                    case 1:
                      echo 'Apartamento';
                      break;
                    case 2:
                      echo 'Casa';
                      break;
                    case 3:
                      echo 'Terreno';
                      break;
                    case 4:
                      echo 'Sala Comercial';
                      break;
                  }
                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
          <!-- Property Specifications -->

          <div class="bg-gray-50 p-6 rounded-lg">
            <h4 class="text-lg font-semibold mb-4">Especificações</h4>
            <div class="grid grid-cols-2 gap-4">
              <?php if ($announcement['property_type_id'] == 1 || $announcement['property_type_id'] == 2): ?>
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Quartos</p>
                  <p class="font-semibold"><?= esc($announcement['bedrooms']) ?></p>
                </div>
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Banheiros</p>
                  <p class="font-semibold"><?= esc($announcement['bathrooms']) ?></p>
                </div>
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Vagas</p>
                  <p class="font-semibold"><?= esc($announcement['parking']) ?></p>
                </div>
              <?php endif; ?>

              <?php if ($announcement['property_type_id'] == 3): ?>
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Topografia</p>
                  <p class="font-semibold"><?= $announcement['topography'] == 'flat' ? 'Plano' : 'Aclive/Declive' ?></p>
                </div>
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Topografia</p>
                  <p class="font-semibold"><?= esc($announcement['soil_type']) ?></p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Location Details -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <h4 class="text-lg font-semibold mb-4">Localização</h4>
            <div class="space-y-3">
              <p><span class="text-gray-600">Endereço:</span> <?= esc($announcement['address']) ?></p>
              <p><span class="text-gray-600">Bairro:</span> <?= esc($announcement['neighborhood']) ?></p>
              <p><span class="text-gray-600">Cidade:</span> <?= esc($announcement['city']) ?></p>
              <p><span class="text-gray-600">Estado:</span> <?= esc($announcement['state']) ?></p>
              <p><span class="text-gray-600">CEP:</span> <?= esc($announcement['zip_code']) ?></p>
            </div>
          </div>

          <!-- Advertiser Information -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <h4 class="text-lg font-semibold mb-4">Informações do Anunciante</h4>
            <div class="flex items-center p-4 bg-white rounded-lg">
              <img class="h-16 w-16 rounded-full border-2 border-blue-500"
                src="<?= !empty($user_profile_photo['file_path']) ? base_url($user_profile_photo['file_path']) : base_url('public/uploads/profile_photos/default.png') ?>"
                alt="Perfil">
              <div class="ml-4">
                <p class="text-lg font-semibold"><?= esc($user_data['first_name']) ?> <?= esc($user_data['last_name']) ?></p>
                <p class="text-gray-600"><?= esc($user_data['email']) ?></p>
                <p class="text-sm text-gray-500">Membro desde: <?= date('d/m/Y', strtotime($user_data['created_at'])) ?></p>
              </div>
            </div>
          </div>

          <!-- Description -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <h4 class="text-lg font-semibold mb-4">Descrição</h4>
            <p class="text-gray-600"><?= esc($announcement['description']) ?></p>
          </div>

          <!-- Broker Notes -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <h4 class="text-lg font-semibold mb-4">Anotações do Corretor</h4>
            <textarea class="w-full p-3 rounded-lg border" rows="4" placeholder="Adicione suas observações aqui..." style="resize: none; height: 12rem;"><?= esc($announcement['broker_notes']) ?></textarea>
          </div>

          <!-- Action Buttons -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <div class="flex space-x-4">
              <button onclick="approveAd(<?= $announcement['id'] ?>)"
                class="flex-1 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Aprovar
              </button>
              <button onclick="rejectAd(<?= $announcement['id'] ?>)"
                class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Recusar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>