<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script>
    function toggleMenu() {
      const menu = document.getElementById('navbar-cta');
      menu.classList.toggle('hidden');
    }

    function toggleDropdown() {
      const dropdown = document.getElementById('user-dropdown');
      dropdown.classList.toggle('hidden');
    }
  </script>
</head>

<body class="bg-gray-100">
  <!-- Navbar -->

  <?php if (!(session()->get('user_id'))) : ?>

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
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

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="<?= base_url('public/img/blue_logo.png') ?>" class="h-14" alt="Peres Imóveis Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Peres Imóveis</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <form action="<?= base_url('public/profile') ?>" method="get">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Perfil </button>
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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card de Imóvel -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="https://via.placeholder.com/400x300" alt="Imóvel" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-bold mb-2">Imóvel 1</h3>
          <p class="text-gray-700 mb-4">Descrição breve do imóvel.</p>
          <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Ver Detalhes</a>
        </div>
      </div>
      <!-- Repetir os cards de imóveis conforme necessário -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="https://via.placeholder.com/400x300" alt="Imóvel" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-bold mb-2">Imóvel 2</h3>
          <p class="text-gray-700 mb-4">Descrição breve do imóvel.</p>
          <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Ver Detalhes</a>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="https://via.placeholder.com/400x300" alt="Imóvel" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-bold mb-2">Imóvel 3</h3>
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
</body>

</html>