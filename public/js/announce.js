document.addEventListener('DOMContentLoaded', function () {
  const propertyTypeSelect = document.getElementById('property_type');
  const houseApartmentFields = document.getElementById('house-apartment-fields');
  const landFields = document.getElementById('land-fields');

  propertyTypeSelect.addEventListener('change', function () {
    // Get the selected option's text to check property type
    const selectedType = this.options[this.selectedIndex].text.toLowerCase();

    if (selectedType === 'terreno') {
      houseApartmentFields.classList.add('hidden');
      landFields.classList.remove('hidden');
    } else if (selectedType === 'casa' || selectedType === 'apartamento') {
      houseApartmentFields.classList.remove('hidden');
      landFields.classList.add('hidden');
    } else {
      // Hide both sections for other property types
      houseApartmentFields.classList.add('hidden');
      landFields.classList.add('hidden');
    }
  });

  const stateSelect = document.getElementById('state');
  const citySelect = document.getElementById('city');
  const cepInput = document.getElementById('zip_code');
  const cityLoading = document.getElementById('cityLoading');

  if (!stateSelect || !citySelect) return;

  // Get states from Brasil API
  fetch('https://brasilapi.com.br/api/ibge/uf/v1')
    .then(response => response.json())
    .then(states => {
      stateSelect.innerHTML = '<option value="">Selecione o estado</option>';
      states.sort((a, b) => a.nome.localeCompare(b.nome)).forEach(state => {
        stateSelect.innerHTML += `<option value="${state.sigla}">${state.nome}</option>`;
      });
    });

  // Get cities when state changes
  stateSelect.addEventListener('change', function () {
    const state = this.value;
    citySelect.innerHTML = '<option value="">Carregando cidades...</option>';

    if (state) {
      if (cityLoading) {
        cityLoading.classList.remove('hidden');
      }

      fetch(`https://brasilapi.com.br/api/ibge/municipios/v1/${state}`)
        .then(response => response.json())
        .then(cities => {
          citySelect.innerHTML = '<option value="">Selecione a cidade</option>';
          cities.sort((a, b) => a.nome.localeCompare(b.nome)).forEach(city => {
            citySelect.innerHTML += `<option value="${city.nome}">${city.nome}</option>`;
          });
          citySelect.removeAttribute('disabled');
        })
        .finally(() => {
          if (cityLoading) {
            cityLoading.classList.add('hidden');
          }
        });
    } else {
      citySelect.innerHTML = '<option value="">Selecione primeiro o estado</option>';
      citySelect.setAttribute('disabled', true);
    }
  });
});

document.getElementById('photos').addEventListener('change', function (event) {
  const container = document.getElementById('imagePreviewContainer');
  container.innerHTML = '';

  for (const file of event.target.files) {
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      const previewDiv = document.createElement('div');
      const text_upload = document.getElementById('text_upload');
      text_upload.style.display = 'none';
      previewDiv.className = 'relative';


      reader.onload = function (e) {
        previewDiv.innerHTML = `
                  <img src="${e.target.result}" class="w-full h-48 object-cover rounded-lg">
                  <div class="absolute top-2 right-2">
                      <button type="button" onclick="event.preventDefault();" class="bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                      </button>
                  </div>
              `;

        const removeButton = previewDiv.querySelector('button');
        removeButton.addEventListener('click', function (e) {
          e.preventDefault();
          e.stopPropagation();
          previewDiv.remove();
          text_upload.style.display = 'block';
        });
      };

      reader.readAsDataURL(file);
      container.appendChild(previewDiv);
    }
  }
});

function updateCounter() {
  const descriptionInput = document.getElementById('description');
  const charCounter = document.getElementById('charCounter');
  const charCounterDiv = document.getElementById('charCounterDiv');
  charCounter.textContent = descriptionInput.value.length;

  if (descriptionInput.value.length === 500) {
    charCounterDiv.style.color = 'red';
  } else {
    charCounterDiv.style.color = 'black';
  }
}

document.getElementById('zip_code').addEventListener('input', function (e) {
  let value = e.target.value;
  value = value.replace(/\D/g, '');
  value = value.replace(/^(\d{5})(\d)/, '$1-$2');
  e.target.value = value;
});

document.getElementById('price').addEventListener('input', function (e) {
  let value = e.target.value;
  value = value.replace(/\D/g, '');
  value = (Number(value) / 100).toLocaleString('pt-BR', {
    style: 'currency',
    currency: 'BRL'
  });
  e.target.value = value;
});
