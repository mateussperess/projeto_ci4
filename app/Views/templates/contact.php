<!-- Seção de Contato -->
<section class="bg-gray-100 my-12">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Entre em Contato</h2>
    <div class="bg-white rounded-lg shadow-md p-8 max-w-2xl mx-auto">
      <form action="/send-contact" method="POST" class="space-y-6">
        <!-- Nome -->
        <div>
          <label for="name" class="block text-gray-700 font-medium mb-2">Nome</label>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Digite seu nome completo"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent transition-shadow duration-200"
            required>
        </div>
        <!-- Email -->
        <div>
          <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Digite seu email"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent transition-shadow duration-200"
            required>
        </div>
        <!-- Mensagem -->
        <div>
          <label for="message" class="block text-gray-700 font-medium mb-2">Mensagem</label>
          <textarea
            id="message"
            name="message"
            placeholder="Escreva sua mensagem aqui..."
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent transition-shadow duration-200"
            rows="4"
            maxlength="500"
            oninput="updateCounter()"
            required></textarea>
          <!-- Contador -->
          <div class="text-sm text-gray-600 mt-1" id="charCounterDiv">
            <span id="charCounter">0</span>/500 caracteres
          </div>
        </div>
        <!-- Botão -->
        <div class="text-center">
          <button
            type="submit"
            class="bg-blue-700 text-white px-8 py-3 rounded-full font-medium shadow-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-700 focus:ring-opacity-50 transition-all duration-300">
            Enviar
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  function updateCounter() {
    const messageInput = document.getElementById('message');
    const charCounter = document.getElementById('charCounter');
    const charCounterDiv = document.getElementById('charCounterDiv');
    charCounter.textContent = messageInput.value.length;

    if (messageInput.value.length === 500) {
      charCounterDiv.style.color = 'red';
    } else {
      charCounterDiv.style.color = 'black';
    }
  }
</script>