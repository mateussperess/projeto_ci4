document.addEventListener('DOMContentLoaded', function () {
  const profilePhotoInput = document.getElementById('profile_photo');
  const profilePhotoPreview = document.querySelector('.rounded-full.shadow-md.w-full.h-full.object-cover');

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
});
