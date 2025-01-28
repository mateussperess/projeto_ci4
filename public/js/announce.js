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
