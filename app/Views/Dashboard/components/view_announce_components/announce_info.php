<div class="bg-gray-50 p-6 rounded-lg">
  <h3 class="text-2xl font-bold text-gray-900 mb-2"><?= esc($announcement['title']) ?></h3>
  <div class="grid grid-cols-2 gap-4 mt-4">
    <div class="bg-white p-4 rounded-lg">
      <p class="text-gray-600">Preço</p>
      <p class="text-xl font-bold text-blue-600">R$ <?= number_format($announcement['price'], 2, ',', '.') ?></p>
    </div>
    <div class="bg-white p-4 rounded-lg">
      <p class="text-gray-600">Tipo de Transação</p>
      <p class="font-semibold"><?= $announcement['transaction_type'] == 'sale' ? 'Venda' : 'Aluguel' ?></p>
    </div>
    <div class="bg-white p-4 rounded-lg">
      <p class="text-gray-600">Área Total</p>
      <p class="font-semibold"><?= esc($announcement['total_area']) ?> m²</p>
    </div>
    <div class="bg-white p-4 rounded-lg">
      <p class="text-gray-600">Tipo de Imóvel</p>
      <p class="font-semibold">
        <?php
        switch ($announcement['property_type_id']) {
          case 1:
            echo 'Apartamento';
            break;
          case 2:
            echo 'Casa';
            break;
          case 3:
            echo 'Terreno';
            break;
          case 4:
            echo 'Sala Comercial';
            break;
        }
        ?>
      </p>
    </div>
  </div>
  <!-- Description -->
  <div class="bg-gray-50 p-6 rounded-lg">
    <h4 class="text-lg font-semibold mb-4">Descrição</h4>
    <p class="text-gray-600"><?= esc($announcement['description']) ?></p>
  </div>
</div>