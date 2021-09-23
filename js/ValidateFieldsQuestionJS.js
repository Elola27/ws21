

/*window.onload=iniciar;
var formulario=document.getElementById("galderenF");
function iniciar(){
    document.getElementById("submit").addEventListener('click',Konprobaketa())
}*/

//formulario.addEventListener('submit',Konprobaketa())

function previewFile(){
    /*if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-preview");
      preview.src = src;
      //preview.style.display = "block";
    }*/
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
    /*eposta=document.forms["galderenF"]["eposta"].value;
    galdera=document.forms["galderenF"]["galdera"].value;
    zuzen=document.forms["galderenF"]["zuzen"].value;
    oker1document.forms["galderenF"]["oker1"].value;
    oker2=document.forms["galderenF"]["oker2"].value;
    oker3=document.forms["galderenF"]["oker3"].value;
    arlo=document.forms["galderenF"]["arlo"].value;*/
    eposta=document.getElementById("eposta").value;
    galdera=document.getElementById("galdera").value;
    zuzen=document.getElementById("zuzen").value;
    oker1=document.getElementById("oker1").value;
    oker2=document.getElementById("oker2").value;
    oker3=document.getElementById("oker3").value;
    arlo=document.getElementById("arlo").value;
    zailtasun=document.querySelector('input[name="zailtasun"]:checked');
    /*
    if (eposta === "" || galdera === "" || zuzen=== "" || oker1 === "" || oker2 === "" || oker3 === "" || arlo=== "" || zailtasun === null ){
            alert("Hutsuneak daude bete itzazu!")
            return false;
    }//else{
    const rikasle= new RegExp("^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$");
    //console.log(rikasle +  " " + rikasle.test(eposta) + " " + eposta)
    const rirakasle= new RegExp("^[a-z].?[a-z]+@ehu\.(eus|es)$");  
    //console.log(rirakasle +  " " + rirakasle.test(eposta) + " " + eposta) 
    if (!(rikasle.test(eposta)) && !(rirakasle.test(eposta))){
        alert("Erabilitako e-posta ez da egokia")
        return false;
    } // else{
    if (galdera.length<10){
        alert("Galdera motzegia egin duzu!");
        return false;
    } 
    //alert("Formularioa ongi betea dago");
    //else{
        //return true;
    //}
    console.log(true);
    return true;
    
    //this.submit();
       // }
    //}*/

    if (!(eposta === "" || galdera === "" || zuzen=== "" || oker1 === "" || oker2 === "" || oker3 === "" || arlo=== "" || zailtasun === null )){
        const rikasle= new RegExp("^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$");
        //console.log(rikasle +  " " + rikasle.test(eposta) + " " + eposta)
        const rirakasle= new RegExp("^[a-z].?[a-z]+@ehu\.(eus|es)$");  
        //console.log(rirakasle +  " " + rirakasle.test(eposta) + " " + eposta) 
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