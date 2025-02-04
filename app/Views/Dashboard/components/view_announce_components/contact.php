<?php if ($announcement['status'] !== 'pending') : ?>
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
<?php endif; ?>