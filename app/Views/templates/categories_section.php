<div class="container mx-auto px-6 py-2">
  <div class="bg-white rounded-lg shadow-lg p-6 mb-8">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card Casa -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
        <img src="<?= base_url('public/img/1.jpg') ?>" alt="Casas" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-3">Casas</h3>
          <p class="text-gray-600 mb-4">Encontre a casa dos seus sonhos com os melhores preços e localizações.</p>
          <a href="<?= session()->get('logged_in') ? base_url('dashboard/houses') : base_url('houses') ?>"
            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Ver Casas
          </a>
        </div>
      </div>

      <!-- Card Apartamento -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
        <img src="<?= base_url('public/img/2.jpg') ?>" alt="Apartamentos" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-3">Apartamentos</h3>
          <p class="text-gray-600 mb-4">Apartamentos modernos e bem localizados para seu conforto.</p>
          <a href="<?= session()->get('logged_in') ? base_url('dashboard/apartments') : base_url('apartments') ?>" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Ver Apartamentos
          </a>
        </div>
      </div>

      <!-- Card Terreno -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
        <img src="<?= base_url('public/img/3.jpg') ?>" alt="Terrenos" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-3">Terrenos</h3>
          <p class="text-gray-600 mb-4">Terrenos em áreas estratégicas para seu investimento ou construção.</p>
          <a href="<?= session()->get('logged_in') ? base_url('dashboard/lands') : base_url('lands') ?>" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Ver Terrenos
          </a>
        </div>
      </div>
    </div>
  </div>
</div>