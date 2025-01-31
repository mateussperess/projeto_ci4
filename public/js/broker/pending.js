document.addEventListener("DOMContentLoaded", (e) => {
  e.preventDefault();

  let success_message = document.getElementById("success");

  if(success_message !== null) {
    setTimeout(() => {
      success_message.style.display = "none";
    }, 5000);
  }
})