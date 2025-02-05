<div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300 group">
  <div class="relative">
    <img src="<?= base_url('public/uploads/property_photos/' . $house['main_photo']) ?>"
      alt="<?= esc($house['title']) ?>"
      class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
    <span class="absolute top-4 right-4 bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
      <?= $house['transaction_type'] === 'sale' ? 'Venda' : 'Aluguel' ?>
    </span>
  </div>

  <div class="p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition"><?= esc($house['title']) ?></h3>
    <p class="text-gray-600 mb-4 line-clamp-2"><?= esc($house['description']) ?></p>

    <div class="flex flex-wrap gap-4 mb-4">
      <span class="flex items-center text-gray-600">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        <?= $house['total_area'] ?>m²
      </span>
      <span class="flex items-center text-gray-600">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
        </svg>
        <?= $house['bedrooms'] ?> Quartos
      </span>
      <span class="flex items-center text-gray-600">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
        </svg>
        <?= $house['parking'] ?> Vagas
      </span>
    </div>

    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
      <span class="text-2xl font-bold text-blue-600">R$ <?= number_format($house['price'], 2, ',', '.') ?></span>
      <a href="<?= base_url('houses/' . $house['id']) ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        Ver Detalhes
      </a>
    </div>
  </div>
</div>