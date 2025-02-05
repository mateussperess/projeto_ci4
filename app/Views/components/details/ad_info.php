<div class="space-y-8 bg-gray-50 p-4 rounded-lg shadow-sm">
  <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight hover:text-blue-600 transition-colors">
      <?= esc($announcement['title']) ?>
    </h1>
    <div class="flex items-center gap-4 rounded-full <?= $announcement['transaction_type'] === 'sale' ? 'bg-green-500' : 'bg-blue-500' ?> text-white px-4 py-2 rounded-full">
      <span class="inline-flex items-center gap-3 px-6 py-3 rounded-full font-semibold text-sm tracking-wider uppercase transform hover:scale-105 transition-all duration-300">
        <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <?php if ($announcement['transaction_type'] === 'sale'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          <?php else: ?>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          <?php endif; ?>
        </svg>
        <span class="font-semibold"><?= $announcement['transaction_type'] === 'sale' ? 'Venda' : 'Aluguel' ?></span>
      </span>
    </div>
  </div>

  <div class="bg-gray-50 p-4 rounded-lg">
    <p class="text-gray-600 text-lg leading-relaxed">
      <?= esc($announcement['description']) ?>
    </p>
  </div>

  <div class="flex flex-col md:flex-row items-center justify-between p-4 bg-blue-50 rounded-lg">
    <div class="flex items-baseline gap-2">
      <span class="text-4xl font-bold text-blue-600 hover:text-blue-700 transition-colors">
        R$ <?= number_format($announcement['price'], 2, ',', '.') ?>
      </span>
      <span class="text-gray-500 text-sm font-medium">
        <?= $announcement['transaction_type'] === 'sale' ? 'à vista' : 'por mês' ?>
      </span>
    </div>
    <?php if (session()->get('logged_in') && session()->get('user_id') != $announcement['user_id']): ?>
      <button class="mt-4 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        Entrar em contato
      </button>
    <?php endif; ?>
  </div>
</div>