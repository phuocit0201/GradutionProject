$('#summernote').summernote()
$(document).ready(function(){
    const input = document.getElementById('file-input');
    const image = document.getElementById('img-preview');
  
    input.addEventListener('change', (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            image.src = src;
            console.log(src);
        } else {
            const src = "";
            image.src = src;
        }
    });
});