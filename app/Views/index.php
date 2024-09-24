<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Peres Imóveis </title>
  <link href="/css/output.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

  <!-- Cabeçalho -->
  <header class="bg-blue-600 text-white">
    <div class="max-w-7xl mx-auto p-6 flex justify-between items-center">
      <h1 class="text-3xl font-bold"> PERES IMÓVEIS </h1>
      <nav>
        <a href="#servicos" class="px-4 py-2 hover:bg-blue-500 rounded">Serviços</a>
        <a href="#galeria" class="px-4 py-2 hover:bg-blue-500 rounded">Galeria</a>
        <a href="#contato" class="px-4 py-2 hover:bg-blue-500 rounded">Contato</a>
      </nav>
    </div>
  </header>

  <!-- Seção de Apresentação -->
  <section class="bg-white py-20">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-4xl font-bold mb-4">Encontre a Casa dos Seus Sonhos</h2>
      <p class="text-gray-600 mb-8">Oferecemos as melhores opções de imóveis para você e sua família.</p>
      <a href="#galeria" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500">Veja Nossas Propriedades</a>
    </div>
  </section>

  <!-- Seção de Serviços -->
  <section id="servicos" class="py-20 bg-gray-200">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-8">Nossos Serviços</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-xl font-semibold mb-2">Compra de Imóveis</h3>
          <p class="text-gray-600">Ajudamos você a encontrar o imóvel perfeito para compra.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-xl font-semibold mb-2">Aluguel</h3>
          <p class="text-gray-600">Oferecemos uma ampla gama de opções para aluguel.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-xl font-semibold mb-2">Consultoria</h3>
          <p class="text-gray-600">Nossos especialistas estão aqui para ajudá-lo a tomar as melhores decisões.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Seção de Galeria -->
  <section id="galeria" class="py-20">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-8">Galeria de Propriedades</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg overflow-hidden shadow">
          <img src="https://via.placeholder.com/400" alt="Propriedade 1" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="font-semibold">Casa na Praia</h3>
            <p class="text-gray-600">R$ 1.200.000</p>
          </div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow">
          <img src="https://via.placeholder.com/400" alt="Propriedade 2" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="font-semibold">Apartamento na Cidade</h3>
            <p class="text-gray-600">R$ 800.000</p>
          </div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow">
          <img src="https://via.placeholder.com/400" alt="Propriedade 3" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="font-semibold">Chácara no Interior</h3>
            <p class="text-gray-600">R$ 500.000</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Rodapé -->
  <footer id="contato" class="bg-blue-600 text-white py-6">
    <div class="max-w-7xl mx-auto text-center">
      <p>Entre em contato: contato@imobiliariaxyz.com</p>
      <p>&copy; 2024 Imobiliária XYZ. Todos os direitos reservados.</p>
    </div>
  </footer>

</body>

</html>