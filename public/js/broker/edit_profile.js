document.addEventListener('DOMContentLoaded', function () {
  const profilePhotoInput = document.getElementById('profile_photo');
  const profilePhotoPreview = document.querySelector('.w-48.h-48.rounded-full.mx-auto.border-4.border-white.shadow-lg.object-cover');

  profilePhotoInput.addEventListener('change', function (e) {
    const file = e.target.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        profilePhotoPreview.src = e.target.result;
      }

      reader.readAsDataURL(file);
    }
  });

  function updateCounter() {
    const bioInput = document.getElementById('bio');
    const charCounter = document.getElementById('charCounter');
    const charCounterDiv = document.getElementById('charCounterDiv');
    charCounter.textContent = bioInput.value.length;
  
    if (bioInput.value.length === 50) {
      charCounterDiv.style.color = 'red';
    } else {
      charCounterDiv.style.color = 'black';
    }
  }

});

let error_warning = document.getElementById("error");
let success_message = document.getElementById("success");

if(error_warning !== null) {
  setTimeout(() => {
    error_warning.style.display = "none";
  }, 5000);
}

if(success_message !== null) {
  setTimeout(() => {
    success_message.style.display = "none";
  }, 5000);
}

