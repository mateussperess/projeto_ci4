<div class="bg-gray-50 p-6 rounded-lg">
  <div class="flex items-center gap-3 mb-6">
    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    <h2 class="text-2xl font-bold text-gray-800">Localização</h2>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white p-4 rounded-lg shadow-sm">
      <span class="text-sm text-gray-500">Endereço</span>
      <p class="font-medium mt-1"><?= esc($announcement['address']) ?></p>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
      <span class="text-sm text-gray-500">Bairro</span>
      <p class="font-medium mt-1"><?= esc($announcement['neighborhood']) ?></p>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
      <span class="text-sm text-gray-500">Cidade</span>
      <p class="font-medium mt-1"><?= esc($announcement['city']) ?></p>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
      <span class="text-sm text-gray-500">Estado</span>
      <p class="font-medium mt-1"><?= esc($announcement['state']) ?></p>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm md:col-span-2">
      <span class="text-sm text-gray-500">CEP</span>
      <p class="font-medium mt-1"><?= esc($announcement['zip_code']) ?></p>
    </div>
  </div>
</div>