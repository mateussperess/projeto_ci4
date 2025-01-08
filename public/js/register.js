document.addEventListener('DOMContentLoaded', () => {
  const password = document.getElementById("password");
  const confirm_password = document.getElementById("confirm_password");
  const confirm_password_div = document.getElementById("confirm_password_div");
  const submit_button = document.getElementById("submit_button");
  const form = document.querySelector('form');

  const confirm_password_ok = document.getElementById('confirm_password_ok');
  const confirm_password_not_ok = document.getElementById('confirm_password_not_ok');

  const loadingScreen = document.getElementById('loading-screen');

  let span = document.createElement('span');

  confirm_password.addEventListener('input', (e) => {
    if (confirm_password.value !== password.value) {
      confirm_password.classList.add('bg-red-50', 'border', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500');
      confirm_password.classList.remove('bg-green-50', 'border', 'border-green-500', 'text-green-500', 'focus:ring-indigo-500', 'focus:border-indigo-500');

      confirm_password_not_ok.style.display = 'block';
      confirm_password_ok.style.display = 'none';

      span.classList.add('text-red-600', 'dark:text-red-500');
      span.classList.remove('text-green-600', 'dark:text-green-500');

      confirm_password_div.appendChild(span);
      submit_button.setAttribute('disabled', 'disabled');
      submit_button.classList.add('bg-gray-600', 'hover:bg-gray-700', 'focus:ring-gray-500');
      submit_button.classList.remove('bg-indigo-600', 'hover:bg-indigo-700', 'focus:ring-indigo-500');
    } else {
      confirm_password.classList.remove('bg-red-50', 'border', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500');
      confirm_password.classList.add('bg-green-50', 'border', 'border-green-500', 'text-green-500', 'focus:ring-indigo-500', 'focus:border-indigo-500');

      confirm_password_ok.style.display = 'block';
      confirm_password_not_ok.style.display = 'none';

      span.classList.add('text-green-600', 'dark:text-green-500');
      span.classList.remove('text-red-600', 'dark:text-red-500');

      confirm_password_div.appendChild(span);
      submit_button.removeAttribute('disabled');
      submit_button.classList.add('bg-indigo-600', 'hover:bg-indigo-700', 'focus:ring-indigo-500');
      submit_button.classList.remove('bg-gray-600', 'hover:bg-gray-700', 'focus:ring-gray-500');
    }
  });

  form.addEventListener('submit', (e) => {
    if (confirm_password.value !== password.value) {
      e.preventDefault();
      alert("As senhas não coincidem.");
    } else {
      loadingScreen.classList.remove('hidden');
      loadingScreen.classList.add('flex');
    }
  });
});