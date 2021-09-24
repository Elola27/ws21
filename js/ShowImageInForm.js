function previewFile(){
    var preview = document.querySelector('img');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();
                
    reader.onloadend = function () {
    preview.src = reader.result;
    preview.style.height='100px';
    preview.style.width='100px';
    }
                
    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
     }
}

function ezabatuigotakoirudia(){
    var img=document.getElementById('igotakoirudia');
    img.style.display="none";
}