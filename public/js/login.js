document.addEventListener("DOMContentLoaded", (e) => {
  e.preventDefault();

  let error_warning = document.getElementById("error");

  if(error_warning !== null) {
    setTimeout(() => {
      error_warning.style.display = "none";
    }, 5000);
  }
})