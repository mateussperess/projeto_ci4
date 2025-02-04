<div class="bg-gray-50 p-6 rounded-lg">
  <div class="flex items-center mb-4">
    <?php if ($announcement['status'] == 'approved'): ?>
      <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <h4 class="text-lg font-semibold">Anúncio Aprovado</h4>
    <?php elseif ($announcement['status'] == 'pending'): ?>
      <svg class="w-6 h-6 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <h4 class="text-lg font-semibold">Anúncio em Análise</h4>
    <?php else: ?>
      <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <h4 class="text-lg font-semibold">Anúncio Rejeitado</h4>
    <?php endif; ?>
  </div>

  <div class="bg-white p-4 rounded-lg">
    <?php if ($announcement['status'] == 'approved'): ?>
      <p class="text-gray-700">Este anúncio foi verificado e aprovado por nossa equipe. Entre em contato com o corretor para mais informações.</p>
    <?php elseif ($announcement['status'] == 'pending'): ?>
      <p class="text-gray-700">Este anúncio está sendo analisado por nossa equipe. Os dados de contato estarão disponíveis após a aprovação.</p>
    <?php else: ?>
      <p class="text-gray-700">Este anúncio foi revisado e não atende aos nossos critérios.</p>
    <?php endif; ?>

    <?php if ($announcement['broker_notes']): ?>
      <div class="mt-4 p-3 bg-gray-50 rounded-lg">
        <div class="flex items-start space-x-2">
          <svg class="w-5 h-5 text-gray-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <div>
            <p class="font-medium text-gray-700 mb-1">Observações do Corretor</p>
            <p class="text-gray-600"><?= esc($announcement['broker_notes']) ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>