function approveAd(adId) {
  document.getElementById('adIdToUpdate').value = adId;
  document.getElementById('actionType').value = 'approve';
  document.getElementById('modalText').textContent = 'Tem certeza que deseja aprovar este anúncio?';
  document.getElementById('confirmButton').textContent = 'Sim, aprovar';

  const modal = document.getElementById('actionModal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function rejectAd(adId) {
  document.getElementById('adIdToUpdate').value = adId;
  document.getElementById('actionType').value = 'reject';
  document.getElementById('modalText').textContent = 'Tem certeza que deseja recusar este anúncio?';
  document.getElementById('confirmButton').textContent = 'Sim, recusar';

  const modal = document.getElementById('actionModal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

window.addEventListener('DOMContentLoaded', () => {
  const $targetEl = document.getElementById('actionModal');
  const $triggerEl = document.getElementById('defaultModalButton');
  const $closeEl = document.getElementById('closeModal');

  const options = {
    placement: 'center',
    backdrop: 'dynamic',
    backdropClasses: 'bg-gray-900/50 fixed inset-0 z-40',
    closable: true,
  };

  const modal = new Modal($targetEl, options);

  // listeners para os botões de fechar
  const closeButtons = document.querySelectorAll('[data-modal-hide="actionModal"]');
  closeButtons.forEach(button => {
    button.addEventListener('click', () => {
      modal.hide();
    });
  });

  const errorMessage = document.getElementById('error');
  if (errorMessage) {
    setTimeout(() => {
      errorMessage.style.display = 'none';
    }, 5000);
  }
});