<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-50 transition-colors">
    <div class="flex items-center">
      <div class="p-3 bg-blue-100 rounded-full">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
      </div>
      <div class="ml-4">
        <h2 class="text-gray-600 text-sm">Total Usuários</h2>
        <p class="text-2xl font-semibold text-gray-800"><?= $total_users ?></p>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-green-50 transition-colors">
    <div class="flex items-center">
      <div class="p-3 bg-green-100 rounded-full">
        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <div class="ml-4">
        <h2 class="text-gray-600 text-sm">Anúncios Ativos</h2>
        <p class="text-2xl font-semibold text-gray-800"><?= $activated_announces; ?></p>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-purple-50 transition-colors">
    <div class="flex items-center">
      <div class="p-3 bg-purple-100 rounded-full">
        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
      </div>
      <div class="ml-4">
        <h2 class="text-gray-600 text-sm">Corretores Ativos</h2>
        <p class="text-2xl font-semibold text-gray-800"> <?= $activated_brokers; ?></p>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-yellow-50 transition-colors">
    <div class="flex items-center">
      <div class="p-3 bg-yellow-100 rounded-full">
        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <div class="ml-4">
        <h2 class="text-gray-600 text-sm">Pendentes Revisão</h2>
        <p class="text-2xl font-semibold text-gray-800"> <?= esc($pending_announces); ?></p>
      </div>
    </div>
  </div>
</div>