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

              <!-- Slider controls -->
              <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                  <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                  </svg>
                </span>
              </button>
              <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                  <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                  </svg>
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

                <!-- Status Section -->
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Status do Anúncio</p>

                  <div class="flex flex-col space-y-4">
                    <!-- Status Badge -->
                    <div class="flex items-center">
                      <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 rounded-full 
          <?php switch ($announcement['status']) {
                  case 'pending':
                    echo 'bg-yellow-500';
                    break;
                  case 'approved':
                    echo 'bg-green-500';
                    break;
                  case 'rejected':
                    echo 'bg-red-500';
                    break;
                } ?>">
                        </div>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold
          <?php switch ($announcement['status']) {
                  case 'pending':
                    echo 'bg-yellow-100 text-yellow-800';
                    break;
                  case 'approved':
                    echo 'bg-green-100 text-green-800';
                    break;
                  case 'rejected':
                    echo 'bg-red-100 text-red-800';
                    break;
                } ?>">
                          <?php switch ($announcement['status']) {
                            case 'pending':
                              echo 'Em Análise';
                              break;
                            case 'approved':
                              echo 'Aprovado';
                              break;
                            case 'rejected':
                              echo 'Rejeitado';
                              break;
                          } ?>
                        </span>
                      </div>
                    </div>

                  </div>
                </div>

              <?php endif; ?>



              <?php if ($announcement['property_type_id'] == 3): ?>
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Topografia</p>
                  <p class="font-semibold"><?= $announcement['topography'] == 'flat' ? 'Plano' : 'Aclive/Declive' ?></p>
                </div>
                <div class="bg-white p-4 rounded-lg">
                  <p class="text-gray-600">Tipo de Solo</p>
                  <p class="font-semibold"><?= esc($announcement['soil_type']) ?></p>
                </div>
              <?php endif; ?>
            </div>

            <!-- Broker Notes -->
            <?php if ($announcement['broker_notes']): ?>
              <div class="bg-white mt-4 p-4 rounded-lg">
                <div class="flex items-start space-x-2">
                  <svg class="w-5 h-5 text-gray-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  <div>
                    <p class="font-medium text-gray-700 mb-1">Observações do Corretor</p>
                    <p class="text-gray-600"><?= esc($announcement['broker_notes']) ?></p>
                  </div>
                </div>
              </div>
            <?php endif; ?>
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

          <!-- Description -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <h4 class="text-lg font-semibold mb-4">Descrição</h4>
            <p class="text-gray-600"><?= esc($announcement['description']) ?></p>
          </div>

          <?php
          switch ($announcement['status']) {
            case 'approved':
              echo '<div class="bg-gray-50 p-6 rounded-lg">
                      <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold">Anúncio Aprovado</h4>
                      </div>
                      <div class="bg-white p-4 rounded-lg">
                        <p class="text-gray-700">Este anúncio foi verificado e aprovado por nossa equipe. Entre em contato com o corretor para mais informações.</p>
                      </div>
                      </div>';
              break;

            case 'pending':
              echo '<div class="bg-gray-50 p-6 rounded-lg">
                      <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold">Anúncio em Análise</h4>
                      </div>
                      <div class="bg-white p-4 rounded-lg">
                        <p class="text-gray-700">Este anúncio está sendo analisado por nossa equipe. Os dados de contato estarão disponíveis após a aprovação.</p>
                      </div>
                    </div>';
              break;

            case 'rejected':
              echo '<div class="bg-gray-50 p-6 rounded-lg">
                      <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold">Anúncio Rejeitado</h4>
                      </div>
                      <div class="bg-white p-4 rounded-lg">
                        <p class="text-gray-700">Este anúncio foi revisado e não atende aos nossos critérios.</p>
                        <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                          <p class="text-sm text-gray-600"><span class="font-medium">Feedback do corretor:</span> ' . esc($announcement['broker_notes']) . '</p>
                        </div>
                      </div>
                    </div>';
              break;
          }
          ?>

          <div class="space-y-6">
            <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
              <div class="flex items-center space-x-4">
                <div class="relative">
                  <img class="h-16 w-16 rounded-full border-2 border-blue-500 object-cover"
                    src="<?= base_url($broker_data['profile_photo']['file_path']) ?>"
                    alt="Corretor <?= esc($broker_data['first_name']) ?>">
                </div>
                <div>
                  <p class="font-semibold text-gray-800 text-lg"><?= esc($broker_data['first_name']) ?> <?= esc($broker_data['last_name']) ?></p>
                  <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span>Corretor Responsável</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <a href="tel:<?= esc($broker_data['telefone']) ?>"
                class="flex items-center justify-center px-6 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                <svg class="w-5 h-5 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                Ligar Agora
              </a>

              <a href="mailto:<?= esc($broker_data['email']) ?>"
                target="_blank"
                class="flex items-center justify-center px-6 py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 group">
                <svg class="w-5 h-5 mr-3 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Email
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</body>

</html>