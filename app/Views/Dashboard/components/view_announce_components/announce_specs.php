<div class="bg-gray-50 p-6 rounded-lg">
  <h4 class="text-lg font-semibold mb-4">Especificações</h4>
  <div class="grid grid-cols-2 gap-4">
    <?php if ($announcement['property_type_id'] == 1 || $announcement['property_type_id'] == 2): ?>
      <div class="bg-white p-4 rounded-lg">
        <p class="text-gray-600">Quartos</p>
        <p class="font-semibold"><?= esc($announcement['bedrooms']) ?></p>
      </div>
      <div class="bg-white p-4 rounded-lg">
        <p class="text-gray-600">Banheiros</p>
        <p class="font-semibold"><?= esc($announcement['bathrooms']) ?></p>
      </div>
      <div class="bg-white p-4 rounded-lg">
        <p class="text-gray-600">Vagas</p>
        <p class="font-semibold"><?= esc($announcement['parking']) ?></p>
      </div>

      <!-- Status Section -->
      <div class="bg-white p-4 rounded-lg">
        <p class="text-gray-600">Status do Anúncio</p>

        <div class="flex flex-col space-y-4">
          <!-- Status Badge -->
          <div class="flex items-center">
            <div class="flex items-center space-x-2">
              <div class="w-2 h-2 rounded-full 
                          <?php switch ($announcement['status']) {
                            case 'pending':
                              echo 'bg-yellow-500';
                              break;
                            case 'approved':
                              echo 'bg-green-500';
                              break;
                            case 'rejected':
                              echo 'bg-red-500';
                              break;
                          } ?>">
              </div>
              <span class="px-4 py-2 rounded-full text-sm font-semibold
                          <?php switch ($announcement['status']) {
                            case 'pending':
                              echo 'bg-yellow-100 text-yellow-800';
                              break;
                            case 'approved':
                              echo 'bg-green-100 text-green-800';
                              break;
                            case 'rejected':
                              echo 'bg-red-100 text-red-800';
                              break;
                          } ?>">
                <?php switch ($announcement['status']) {
                  case 'pending':
                    echo 'Em Análise';
                    break;
                  case 'approved':
                    echo 'Aprovado';
                    break;
                  case 'rejected':
                    echo 'Rejeitado';
                    break;
                } ?>
              </span>
            </div>
          </div>

        </div>
      </div>

    <?php endif; ?>

    <?php if ($announcement['property_type_id'] == 3): ?>
      <div class="bg-white p-4 rounded-lg">
        <p class="text-gray-600">Topografia</p>
        <p class="font-semibold"><?= $announcement['topography'] == 'flat' ? 'Plano' : 'Aclive/Declive' ?></p>
      </div>
      <div class="bg-white p-4 rounded-lg">
        <p class="text-gray-600">Tipo de Solo</p>
        <p class="font-semibold"><?= esc($announcement['soil_type']) ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>