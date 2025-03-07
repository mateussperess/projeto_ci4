<div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-8">
  <div class="flex items-center gap-3 mb-6">
    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
    <h2 class="text-2xl font-bold text-gray-800">Anunciante</h2>
  </div>

  <div class="flex items-center gap-6">
    <div class="relative">
      <img src="<?= isset($user_data['profile_photo']) && isset($user_data['profile_photo']['file_path']) ? base_url($user_data['profile_photo']['file_path']) : base_url('public/uploads/profile_photos/default.png') ?>"
        alt="Profile Photo"
        class="w-20 h-20 rounded-full object-cover ring-4 ring-blue-100">
    </div>

    <div class="space-y-2">
      <p class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
        <?= esc($announcement['first_name'] . ' ' . $announcement['last_name']) ?>
      </p>
      <div class="flex items-center gap-2 text-gray-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
        <span class="text-sm hover:text-blue-600 transition-colors">
          <?= esc($announcement['email']) ?>
        </span>
      </div>
    </div>
  </div>
</div>