document.addEventListener("DOMContentLoaded", (e) => {
  e.preventDefault();

  let error_message = document.getElementById("error");
  let warning_message = document.getElementById("warning");
  let success_message = document.getElementById("success");

  if(error_message !== null) {
    setTimeout(() => {
      error_message.style.display = "none";
    }, 5000);
  }
  
  if(warning_message !== null) {
    setTimeout(() => {
      warning_message.style.display = "none";
    }, 5000);
  }
  
  if(success_message !== null) {
    setTimeout(() => {
      success_message.style.display = "none";
    }, 5000);
  }

  let username = document.getElementById("username");

  username.addEventListener("focus", (e) => {
    e.preventDefault();
    username.classList.remove('bg-red-50', 'border', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500');
  });
})