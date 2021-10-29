<?php
//echo"<script> Hemen doa </script>";
  $eposta=$_POST['eposta'];
  $galdera=$_POST['galdera'];
  $zuzen=$_POST['erzuzen'];
  $oker1=$_POST['eroker1'];
  $oker2=$_POST['eroker2'];
  $oker3=$_POST['eroker3'];
  $zailtasun=$_POST['zail'];
  $arlo=$_POST['arlo'];

  $trimePosta = trim($eposta);
  $trimgTestua = trim($galdera);
  $trimeZuzena = trim($zuzen);
  $trimeOkerra1 = trim($oker1);
  $trimeOkerra2 = trim($oker2);
  $trimeOkerra3 = trim($oker3);
  $trimgZail = trim($zailtasun);
  $trimgArloa = trim($arlo);
        //xml
  try{
        $xml=simplexml_load_file("../xml/Questions.xml");
        $galdera=$xml->addChild('assessmentItem');
        $galdera->addAttribute('author',$trimePosta);
        $galdera->addAttribute('subject',$trimgArloa);
        $galderatestu=$galdera->addChild('itemBody');
        $galderatestu->addChild('p',$trimgTestua);
        $erantzunzuzen=$galdera->addChild('correctResponse');
        $erantzunzuzen->addChild('response',$trimeZuzena);
        $erantzunoker=$galdera->addChild('incorrectResponses');
        $erantzunoker->addChild('response',$trimeOkerra1);
        $erantzunoker->addChild('response',$trimeOkerra2);
        $erantzunoker->addChild('response',$trimeOkerra3);  
        //echo $xml->asXML();
        $xml->asXML('../xml/Questions.xml');
        //echo nl2br("Erregistro berri bat XML fitxategian gehitu da");
        $irteera="XML fitxategian ongi sortu da erregistro berria";
        }catch(Exception $e){
          echo"Errorea";
        }

  
        //json
        try{
        $data=file_get_contents("../json/Questions.json");
        $array=json_decode($data);
        $galdera=new stdClass();
        $galdera->subject=$trimgArloa;
        $galdera->author=$trimePosta;
        $galdera->itemBody= array("p" => $trimgTestua);
        $galdera->correctResponse= array("response"=> $trimeZuzena);
        $galdera->incorrectResponses=array("response" => array($trimeOkerra1,$trimeOkerra2,$trimeOkerra3));
        $arra[0]=$galdera;
        array_push($array->assessmentItems,$arra[0]);
        $jsonData = json_encode($array);
        $jsonData = str_replace('{', '{'.PHP_EOL, $jsonData);
        $jsonData = str_replace(',', ','.PHP_EOL, $jsonData);
        $jsonData = str_replace('}', PHP_EOL.'}', $jsonData);
        file_put_contents("../json/Questions.json",$jsonData);
        //echo nl2br('<br>Erregistrio berri bat JSON fitxategian gehitu da<br>');
        $irteera.="/n JSON fitxategian ongi sortu da erregistro berria";
        }catch(Exception $e){
          echo"<script> alert('Error')</script>";
        } 
        include 'DbConfig.php';
        $niresqli=new mysqli($zerbitzaria,$erabiltzailea,$gakoa,$db);
        /*echo"Erregistro berri bat sartu da Datu-basean";
        $niresqli->query("INSERT INTO dbt51_questions (Eposta,Galdera,erZuzena,erOkerra1,erOkerra2,erOkerra3,Zailtasuna,Arloa,Argazkia) VALUES ('$trimePosta','$trimgTestua','$trimeZuzena','$trimeOkerra1','$trimeOkerra2','$trimeOkerra3','$trimgZail','$trimgArloa',NULL)");*/
        if ($niresqli->connect_errno){
        echo"<script> alert('Konexioa ez da ireki') </script>";
        //echo ("die('Huts egin du konexioak MySQL-ra: ('.$niresqli->connect_errno . ')'. $niresqli->connect_error);");
      }
      if(!$niresqli->query("INSERT INTO dbt51_questions (Eposta,Galdera,erZuzena,erOkerra1,erOkerra2,erOkerra3,Zailtasuna,Arloa,Argazkia) VALUES ('$trimePosta','$trimgTestua','$trimeZuzena','$trimeOkerra1','$trimeOkerra2','$trimeOkerra3','$trimgZail','$trimgArloa','NULL')")){
        echo ("Sartu diren datuak okerrak dira");
        echo "Error:" . $niresqli->error;
      }else{
        $irteera.="/n Datu basean ongi sortu da erregistro berria";
        echo $irteera;
        //echo ("Galdera berria gorde da!\n");
        //$ePosta=$_GET['eposta'];
        /*echo nl2br ("\n\n");
        echo nl2br ("<a href = ShowQuestions.php?eposta=$ePosta>Ikusi dauden galdera guztiak irudi gabe.</a>\n");
        echo nl2br ("<a href = ShowQuestionsWithImage.php?eposta=$ePosta>Ikusi dauden galdera guztiak irudiekin.</a>\n");
        echo nl2br ("<a href = QuestionFormWithImage.php?eposta=$ePosta>Beste galdera bat egiteko.</a>\n");
        echo n12br ("Oraingoz goian agertzen diren estekek ez dute funtzionatzen eta beraz, gomendatzen da bertikaleko nabigazio-barrako estekak erabiltzea, arazoa konpontzen ari gara");*/
      }
        mysqli_close($niresqli);
      
        //echo"Ongi burutu dira operazio guztiak";*/
?>
