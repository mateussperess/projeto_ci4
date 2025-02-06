<div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-8">
  <div class="flex items-center gap-3 mb-6">
    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
    </svg>
    <h2 class="text-2xl font-bold text-gray-800">Especificações</h2>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <div class="p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
      <div class="flex flex-col items-center text-center space-y-2">
        <svg class="w-8 h-8 text-gray-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        <span class="text-2xl font-bold text-gray-800"><?= $announcement['total_area'] ?>m²</span>
        <span class="text-sm text-gray-600">Área Total</span>
      </div>
    </div>

    <div class="p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
      <div class="flex flex-col items-center text-center space-y-2">
        <svg class="w-8 h-8 text-gray-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="text-2xl font-bold text-gray-800"><?= $announcement['bedrooms'] ?></span>
        <span class="text-sm text-gray-600">Quartos</span>
      </div>
    </div>

    <div class="p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
      <div class="flex flex-col items-center text-center space-y-2">
        <svg class="w-8 h-8 text-gray-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
        </svg>

        <span class="text-2xl font-bold text-gray-800"><?= $announcement['parking'] ?></span>
        <span class="text-sm text-gray-600">Vagas</span>
      </div>
    </div>

    <div class="p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
      <div class="flex flex-col items-center text-center space-y-2">
        <svg class="w-8 h-8 text-gray-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 9a4 4 0 014-4h2a4 4 0 014 4v2h2v4c0 3-2.7 5-7 5s-7-2-7-5v-4h2V9z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 15h10" />
        </svg>
        <span class="text-2xl font-bold text-gray-800"><?= $announcement['bathrooms'] ?></span>
        <span class="text-sm text-gray-600">Banheiros</span>
      </div>
    </div>
  </div>
</div>