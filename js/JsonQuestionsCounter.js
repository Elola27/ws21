

$(document).ready(function() { 
    setInterval(galderak,10000);
});


function galderak() {  
         $.ajax({
         url: '../json/Questions.json',
         dataType: 'json',
         cache:false,
         success: function(data) { 
            document.getElementById('galderak').innerHTML = ''
            //('#galderak').empty(); 
            guregalderak=0;
            galderatotalak=0;
            //eposta=$_GET['eposta'];
            //var $_GET= "<?php echo json_encode($_GET); ?>";
            //eposta=$_GET['eposta'];
            eposta=$(location). attr("href");
            balioa=eposta.split("=");
            epos=balioa[1].split("&");
            $.each(data.assessmentItems,function(key,value){
                galderatotalak+=1;
                if (value.author===epos[0]){
                    guregalderak+=1;
                }
            });
            testua=epos[0] + " erabiltzaileak sortutako galderak " + guregalderak + "/" + galderatotalak;
            $('#galderak').append(testua);
            //$('#galderak').append(eposta);
            //$('#galderak').append(balioa[1]);
                /*$.each(data.assessmentItems[key].itemBody,function(a,b){
                    balioa1=data.assessmentItems[key].itemBody[a].p;
                });
                $.each(data.assessmentItems[key].correctResponse,function(c,d){
                    balioa2=data.assessmentItems[key].correctResponse[c].response;
                });*/
                //row+=('<tr><td>'+ value.itemBody.p+'</td><td> ' +value.author +'</td><td>'+/*$.each(data.assessmentItems[key].correctResponse,function(c,d){
                     ///return data.assessmentItems[key].correctResponse[c].value;
                //})*/value.correctResponse.response+'</td></tr>');
            
              //items.push('<li id="' + key + '">' + val + '</li>');    
              //row+=$('<table><tr><td>'+ data.itemBody.p+'</td><td>'+data.author +  '</td><td>' +data.correctResponse.response +  '</td></tr>');
            ///row+=('</table>');
            //$('#erakutsi').append(row);
        },
        statusCode: {
           404: function() {
             alert('There was a problem with the server.  Try again soon!');
           }
        }
    });
};