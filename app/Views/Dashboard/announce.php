<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anunciar Imóvel - Peres Imóveis</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('public/style/style_index.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('public/img/black_logo.png'); ?>" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <?= view('dashboard/templates/header') ?>

  <div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
      <h2 class="text-2xl font-bold mb-6 text-center">Anunciar Imóvel</h2>

      <form action="<?= base_url('dashboard/submit_announce') ?>" method="POST" enctype="multipart/form-data">
        <!-- Property Type Section -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-4">Tipo do Imóvel</h3>
          <select name="property_type_id" id="property_type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option value="">Selecione o tipo de imóvel</option>
            <?php foreach ($propertyTypes as $type): ?>
              <option value="<?= $type['id'] ?>"><?= esc($type['name']) ?></option>
            <?php endforeach; ?>
          </select>

          <div class="mb-6 mt-6">
            <h3 class="text-lg font-semibold mb-4">Título do Anúncio</h3>
            <input type="text" name="title" class="mt-1 block w-full rounded-md">
          </div>
        </div>

        <!-- Property Details -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-4">Detalhes do Imóvel</h3>

          <!-- Fields for Houses and Apartments -->
          <div id="house-apartment-fields" class="grid grid-cols-1 md:grid-cols-2 gap-4 hidden">
            <div>
              <label class="block text-sm font-medium text-gray-700">Quartos</label>
              <input type="number" name="bedrooms" class="mt-1 block w-full rounded-md">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Banheiros</label>
              <input type="number" name="bathrooms" class="mt-1 block w-full rounded-md">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Vagas de Garagem</label>
              <input type="number" name="parking" class="mt-1 block w-full rounded-md">
            </div>
          </div>

          <!-- Fields for Land -->
          <div id="land-fields" class="grid grid-cols-1 md:grid-cols-2 gap-4 hidden">
            <div>
              <label class="block text-sm font-medium text-gray-700">Topografia</label>
              <select name="topography" class="mt-1 block w-full rounded-md">
                <option value="flat">Plano</option>
                <option value="slope">Aclive/Declive</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Tipo de Solo</label>
              <input type="text" name="soil_type" class="mt-1 block w-full rounded-md">
            </div>
          </div>

          <!-- Common Fields for All Types -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Área Total (m²)</label>
              <input type="number" name="total_area" required class="mt-1 block w-full rounded-md">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Rua</label>
              <input type="text" name="address" class="mt-1 block w-full rounded-md">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"> Número </label>
              <input type="number" name="number" class="mt-1 block w-full rounded-md">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"> CEP </label>
              <input type="number" name="zip_code" class="mt-1 block w-full rounded-md">
            </div>
          </div>
        </div>

        <!-- Location -->

        <div class="mb-6">
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="state" id="state" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
              <option value="">Selecione o estado</option>
            </select>
          </div>
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Cidade</label>
            <select name="city" id="city" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" disabled>
              <option value="">Selecione primeiro o estado</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Bairro</label>
            <input type="text" name="neighborhood" class="mt-1 block w-full rounded-md">
          </div>
        </div>

        <!-- Price and Transaction -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-4">Valores e Tipo de Negócio</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Valor (R$)</label>
              <input type="number" name="price" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Tipo de Negócio</label>
              <select name="transaction_type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="sale">Venda</option>
                <option value="rent">Aluguel</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Description -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-4">Descrição do Imóvel</h3>
          <textarea name="description" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Descreva as características do imóvel..."></textarea>
        </div>

        <!-- Photos -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-4">Fotos do Imóvel</h3>
          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
              <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <div class="flex text-sm text-gray-600">
                <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                  <span>Upload de fotos</span>
                  <input id="photos" name="photos[]" type="file" class="sr-only" multiple accept="image/*" required>
                </label>
                <p class="pl-1">ou arraste e solte</p>
              </div>
              <p class="text-xs text-gray-500">PNG, JPG, GIF até 10MB</p>
            </div>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end space-x-4">
          <button type="button" onclick="window.location.href='<?= base_url('dashboard') ?>'" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Cancelar
          </button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Enviar Anúncio
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-4 right-4 p-2 rounded-full shadow-lg">
    <img src="<?= base_url('public/img/go_top.png') ?>" class="w-12 h-12" alt="Voltar ao topo">
  </button>

  <script src="<?= base_url('public/js/index.js') ?>" async></script>
  <script src="<?= base_url('public/js/announce.js') ?>" async></script>

</body>

</html>