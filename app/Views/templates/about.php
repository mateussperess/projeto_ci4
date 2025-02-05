<section id="sobre" class="container mx-auto px-6 py-2">
  <div class="bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Sobre Nós</h2>
    <p class="text-gray-600 text-lg leading-relaxed mb-12 max-w-4xl mx-auto">
      A Peres Imóveis é uma empresa dedicada a ajudar você a encontrar o imóvel dos seus sonhos. Com anos de experiência no mercado, oferecemos um serviço personalizado e de alta qualidade. Conosco, tornamos fácil e rápido o que, às vezes, pode ser um desafio.
    </p>

    <!-- Missão, Visão e Valores -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
      <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 hover:shadow-lg transition duration-300">
        <img src="<?= base_url('public/svg/mission.svg') ?>" alt="Missão" class="w-24 h-24 mx-auto mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Missão</h3>
        <p class="text-gray-600">Nossa missão é proporcionar a melhor experiência na compra e venda de imóveis, com transparência e confiança.</p>
      </div>

      <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 hover:shadow-lg transition duration-300">
        <img src="<?= base_url('public/svg/vision.svg') ?>" alt="Visão" class="w-24 h-24 mx-auto mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Visão</h3>
        <p class="text-gray-600">Ser a imobiliária de referência no mercado, reconhecida pela excelência no atendimento e inovação.</p>
      </div>

      <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 hover:shadow-lg transition duration-300">
        <img src="<?= base_url('public/svg/values.svg') ?>" alt="Valores" class="w-24 h-24 mx-auto mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Valores</h3>
        <p class="text-gray-600">Compromisso, ética, transparência e respeito são os valores que guiam nossas ações e decisões.</p>
      </div>
    </div>

    <!-- Team Section -->
    <?php if (!empty($admins) && $admins != null): ?>
      <div class="bg-gray-50 rounded-lg p-8">
        <!-- Administrators -->
        <div class="mb-12">
          <h3 class="text-3xl font-bold text-gray-800 text-center mb-8">Nossa Equipe</h3>
          <h4 class="text-2xl font-semibold text-gray-700 text-center mb-6">Administração</h4>
          <div class="flex flex-wrap justify-center gap-8">
            <?php foreach ($admins as $admin): ?>
              <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 hover:shadow-lg transition duration-300 w-full max-w-sm">
                <img src="<?= base_url('public/uploads/profile_photos/' . ($admin['profile_photo']['file_name'] ?? 'default.png')) ?>"
                  alt="<?= esc($admin['firstname'] . ' ' . $admin['lastname']) ?>"
                  class="w-32 h-32 mx-auto rounded-full mb-4 object-cover border-4 border-blue-100">

                <h4 class="text-xl font-bold text-gray-800 mb-2 text-center">
                  <?= esc($admin['firstname'] . ' ' . $admin['lastname']) ?>
                </h4>

                <p class="text-blue-600 font-medium text-center"><?= esc($admin['role']['description']) ?></p>
                <p class="text-gray-600 text-sm text-center mt-2"><?= esc($admin['email']) ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Brokers -->
        <?php if (!empty($brokers) && $brokers != null): ?>
          <div>
            <h4 class="text-2xl font-semibold text-gray-700 text-center mb-6">Corretores</h4>
            <div class="flex flex-wrap justify-center gap-8">
              <?php foreach ($brokers as $broker): ?>
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 hover:shadow-lg transition duration-300 w-full max-w-sm">
                  <img src="<?= base_url('public/uploads/profile_photos/' . ($broker['profile_photo']['file_name'] ?? 'default.png')) ?>"
                    alt="<?= esc($broker['firstname'] . ' ' . $broker['lastname']) ?>"
                    class="w-32 h-32 mx-auto rounded-full mb-4 object-cover border-4 border-blue-100">

                  <h4 class="text-xl font-bold text-gray-800 mb-2 text-center">
                    <?= esc($broker['firstname'] . ' ' . $broker['lastname']) ?>
                  </h4>

                  <p class="text-blue-600 font-medium text-center"><?= esc($broker['role']['description']) ?></p>
                  <p class="text-gray-600 text-sm text-center mt-2"><?= esc($broker['email']) ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>