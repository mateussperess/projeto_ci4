document.addEventListener('DOMContentLoaded', () => {
  let username = document.getElementById("username");
  let email = document.getElementById("email");
  let error_message = document.getElementById("error");

  username.addEventListener("focus", (e) => {
    e.preventDefault();
    username.classList.remove('bg-red-50', 'border', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500');
  });

  email.addEventListener("focus", (e) => {
    e.preventDefault();
    username.classList.remove('bg-red-50', 'border', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500');
  });

  if(error_message !== null) {
    setTimeout(() => {
      error_message.style.display = "none";
    }, 5000);
  }

  form.addEventListener('submit', (e) => {
    if (confirm_password.value !== password.value) {
      e.preventDefault();
      alert("As senhas não coincidem.");
    } else {
      loadingScreen.classList.remove('hidden');
      loadingScreen.classList.add('flex');
    }
  });
})