
function previewFile(){
    var preview = document.querySelector('img');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
    preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}



document.addEventListener("DOMContentLoaded",function(){
    document.getElementById("galderenF").addEventListener("submit",Konprobaketa);});

function Konprobaketa(evento){
    var eposta,galdera,zuzen,oker1,oker2,oker3,zailtasun,arlo,file;
    eposta=document.getElementById("eposta").value;
    galdera=document.getElementById("galdera").value;
    zuzen=document.getElementById("zuzen").value;
    oker1=document.getElementById("oker1").value;
    oker2=document.getElementById("oker2").value;
    oker3=document.getElementById("oker3").value;
    arlo=document.getElementById("arlo").value;
    zailtasun=document.querySelector('input[name="zailtasun"]:checked');
    if (!(eposta === "" || galdera === "" || zuzen=== "" || oker1 === "" || oker2 === "" || oker3 === "" || arlo=== "" || zailtasun === null )){
        const rikasle= new RegExp("^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$");
        const rirakasle= new RegExp("^[a-z].?[a-z]+@ehu\.(eus|es)$");  
        if ((rikasle.test(eposta)) || (rirakasle.test(eposta))){   
            if (galdera.length>10){
                alert("Formularioa ondo beteta dago");
                return true;
            }else{
                alert("Galderak gutxienez 10 karakterekoa izan behar dira");
                return false;
            }
        }else{
            alert("Erabilitako e-posta elektronikoa ez da egokia");
            return false;
        }
    }else{
        alert("Hutsuneak daude bete itzazu!");
        return false;
    }
}