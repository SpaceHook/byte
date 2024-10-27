window.previewImage = (input, previewId) => {
    const file = input.files[0];
    const reader = new FileReader();
    const preview = document.getElementById(previewId);

    reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
    }

    if (file) {
        reader.readAsDataURL(file);
    }
}
