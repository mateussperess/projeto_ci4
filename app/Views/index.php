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

  <script src="<?= base_url('public/js/index.js') ?>"></script>
</head>

<body class="bg-gray-100">

  <!-- Navbar -->
  <?php if (!(session()->get('user_id'))) : ?>
    <nav id="nav" class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="<?= base_url('public/img/blue_logo.png') ?>" class="h-14" alt="Peres Imóveis Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Peres Imóveis</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <form action="<?= base_url('public/login') ?>" method="get">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Entrar</button>
          </form>

          <button onclick="toggleMenu()" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="#" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
            </li>
            <li>
              <a href="#sobre" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sobre</a>
            </li>
            <li>
              <a href="#catalogo" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Catálogo</a>
            </li>
            <li>
              <a href="#contato" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <?php else: ?>

    <nav id="nav" class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="<?= base_url('public/img/blue_logo.png') ?>" class="h-14" alt="Peres Imóveis Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Peres Imóveis</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-12 h-12 rounded-full"
              <?php $profile_photo = session()->get('profile_photo'); ?>
              src="<?= isset($profile_photo) && $profile_photo ? base_url('public/uploads/profile_photos/' . esc($profile_photo['file_name'])) : base_url('public/uploads/profile_photos/default.png') ?>"
              alt="user photo">
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white"> <?= esc(session()->get('username')); ?> </span>
              <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"> <?= esc(session()->get('email')); ?></span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="<?= base_url('public/profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"> Perfil </a>
              </li>
              <li>
                <a href="<?= base_url('public/logout') ?>" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
              </li>
            </ul>
          </div>
          <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-red-500 rounded-lg md:hidden hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="#" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
            </li>
            <li>
              <a href="#sobre" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sobre</a>
            </li>
            <li>
              <a href="#catalogo" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Catálogo</a>
            </li>
            <li>
              <a href="#contato" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


  <?php endif; ?>

  <!-- Hero Section -->
  <section class="bg-blue-500 text-white py-20">
    <div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold mb-4">Bem-vindo à Peres Imóveis</h1>
      <p class="text-lg mb-8">Encontre o imóvel dos seus sonhos com a gente!</p>
      <a href="#catalogo" class="bg-white text-blue-500 px-6 py-3 rounded-full font-semibold">Ver Imóveis</a>
    </div>
  </section>

  <!-- Catálogo de Imóveis -->
  <section id="catalogo" class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Catálogo de Imóveis</h2>

    <!-- Carrossel -->
    <div id="default-carousel" class="mb-9 relative mx-auto max-w-8xl" data-carousel="slide">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-[2000ms] ease-in-out" data-carousel-item>
          <img src="<?= base_url('public/img/1.jpg') ?>" class="absolute block w-full h-full object-cover top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-[2000ms] ease-in-out" data-carousel-item>
          <img src="<?= base_url('public/img/2.jpg') ?>" class="absolute block w-full h-full object-cover top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-[2000ms] ease-in-out" data-carousel-item>
          <img src="<?= base_url('public/img/3.jpg') ?>" class="absolute block w-full h-full object-cover top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-[2000ms] ease-in-out" data-carousel-item>
          <img src="<?= base_url('public/img/4.jpg') ?>" class="absolute block w-full h-full object-cover top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-[2000ms] ease-in-out" data-carousel-item>
          <img src="<?= base_url('public/img/5.jpg') ?>" class="absolute block w-full h-full object-cover top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
      </div>
      <!-- Slider indicators -->
      <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card de Imóvel -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="<?= base_url('public/img/1.jpg') ?>" alt="Imóvel" class="w-full h-48 object-cover lazy">
        <div class="p-4">
          <h3 class="text-xl font-bold mb-2"> Casas </h3>
          <p class="text-gray-700 mb-4">Descrição breve do imóvel.</p>
          <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Ver Detalhes</a>
        </div>
      </div>
      <!-- Repetir os cards de imóveis conforme necessário -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="<?= base_url('public/img/2.jpg') ?>" alt="Imóvel" class="w-full h-48 object-cover lazy">
        <div class="p-4">
          <h3 class="text-xl font-bold mb-2"> Apartamentos </h3>
          <p class="text-gray-700 mb-4">Descrição breve do imóvel.</p>
          <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Ver Detalhes</a>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="<?= base_url('public/img/3.jpg') ?>" alt="Imóvel" class="w-full h-48 object-cover lazy">
        <div class="p-4">
          <h3 class="text-xl font-bold mb-2"> Terrenos </h3>
          <p class="text-gray-700 mb-4">Descrição breve do imóvel.</p>
          <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Ver Detalhes</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Sobre -->
  <section id="sobre" class="bg-gray-100 py-12">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-4">Sobre Nós</h2>
      <p class="text-gray-700 mb-8">A Peres Imóveis é uma empresa dedicada a ajudar você a encontrar o imóvel dos seus sonhos. Com anos de experiência no mercado, oferecemos um serviço personalizado e de alta qualidade.</p>

      <!-- Missão, Visão e Valores -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <div>
          <img src="<?= base_url('public/svg/vision.svg') ?>" alt="Ilustração de nossa missão: um aperto de mãos simbolizando confiança e parceria" class="w-64 h-64 mx-auto rounded-full mb-4">
          <h3 class="text-xl font-semibold mb-2">Missão</h3>
          <p class="text-gray-600">Nossa missão é proporcionar a melhor experiência na compra e venda de imóveis, com transparência e confiança.</p>
        </div>
        <div>
          <img src="<?= base_url('public/svg/mission.svg') ?>" alt="Ilustração de nossa missão: um aperto de mãos simbolizando confiança e parceria" class="w-64 h-64 mx-auto rounded-full mb-4">
          <h3 class="text-xl font-semibold mb-2">Visão</h3>
          <p class="text-gray-600">Ser a imobiliária de referência no mercado, reconhecida pela excelência no atendimento e inovação.</p>
        </div>
        <div>
          <img src="<?= base_url('public/svg/values.svg') ?>" alt="Ilustração de nossa missão: um aperto de mãos simbolizando confiança e parceria" class="w-64 h-64 mx-auto rounded-full mb-4">
          <h3 class="text-xl font-semibold mb-2">Valores</h3>
          <p class="text-gray-600">Compromisso, ética, transparência e respeito são os valores que guiam nossas ações e decisões.</p>
        </div>
      </div>

      <!-- Equipe -->
      <h3 class="text-2xl font-bold mb-4">Nossa Equipe</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
        <div class="bg-white rounded-lg shadow-lg p-4">
          <img src="https://via.placeholder.com/150" alt="Equipe 1" class="w-32 h-32 mx-auto rounded-full mb-4">
          <h4 class="text-xl font-semibold">João Silva</h4>
          <p class="text-gray-600">CEO</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-4">
          <img src="https://via.placeholder.com/150" alt="Equipe 2" class="w-32 h-32 mx-auto rounded-full mb-4">
          <h4 class="text-xl font-semibold">Maria Oliveira</h4>
          <p class="text-gray-600">Gerente de Vendas</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-4">
          <img src="https://via.placeholder.com/150" alt="Equipe 3" class="w-32 h-32 mx-auto rounded-full mb-4">
          <h4 class="text-xl font-semibold">Carlos Pereira</h4>
          <p class="text-gray-600">Consultor Imobiliário</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-4">
          <img src="https://via.placeholder.com/150" alt="Equipe 4" class="w-32 h-32 mx-auto rounded-full mb-4">
          <h4 class="text-xl font-semibold">Ana Costa</h4>
          <p class="text-gray-600">Assistente Administrativo</p>
        </div>
      </div>

      <!-- Botão de Contato -->
      <div class="flex justify-center">
        <a href="#contato" class="bg-blue-500 text-white px-6 py-3 rounded-full font-semibold">Entre em Contato</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-600 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2023 Peres Imóveis. Todos os direitos reservados.</p>
    </div>
  </footer>

  <!-- Botão de Voltar ao Topo -->
  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>
</body>

</html>