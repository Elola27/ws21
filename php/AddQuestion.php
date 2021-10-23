<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
</head>
<body>
<?php include 'Menus.php'?>
  <section class="main" id="s1">
    <div>
      <?php
       /*$niresqli=new mysqli($zerbitzaria,$erabiltzailea,$gakoa,$db);
       if ($niresqli->connect_errno){
         die("Huts egin du konexioak MySQL-ra: (".$niresqli->connect_errno . ")". $niresqli->connect_error);
       }
       if(!$niresqli->query("INSERT INTO dbt51_questions (Eposta,Galdera,erZuzena,erOkerra1,erOkerra2,erOkerra3,Zailtasuna,Arloa) VALUES ('$_POST[eposta]','$_POST[galdera]','$_POST[zuzen]','$_POST[oker1]','$_POST[oker2]','$_POST[oker3]',$_POST[zailtasun],'$_POST[arlo]')")){
         echo "Errorea datuak sartzerako orduan:(".$niresqli->errno.")" .$niresqli->error;
       }
      echo "Erregistro berri bat sartu da datu basean \n";
      $niresqli->close();*/

if (isset($_POST)){
  $eposta=$_POST['eposta'];
  $galdera=$_POST['galdera'];
  $zuzen=$_POST['zuzen'];
  $oker1=$_POST['oker1'];
  $oker2=$_POST['oker2'];
  $oker3=$_POST['oker3'];
  $zailtasun=$_POST['zailtasun'];
  $arlo=$_POST['arlo'];

  $trimePosta = trim($eposta);
  $trimgTestua = trim($galdera);
  $trimeZuzena = trim($zuzen);
  $trimeOkerra1 = trim($oker1);
  $trimeOkerra2 = trim($oker2);
  $trimeOkerra3 = trim($oker3);
  $trimgZail = trim($zailtasun);
  $trimgArloa = trim($arlo);
 
  $patroia="/^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es) || [a-zA-Z]\.[a-zA-Z]+@ehu\.(eus|es)$/";
  preg_match('/^.+$/', $trimePosta, $matchesePosta);
  preg_match('^.{10}^', $trimgTestua, $matchesgTestua);
  preg_match('/^.+$/', $trimeZuzena, $matcheseZuzena);
  preg_match('/^.+$/', $trimeOkerra1, $matcheseOkerra1);
  preg_match('/^.+$/', $trimeOkerra2, $matcheseOkerra2);
  preg_match('/^.+$/', $trimeOkerra3, $matcheseOkerra3);
  preg_match('/[1-3]$/', $trimgZail, $matchesgZail);
  preg_match('/^.+$/', $trimgArloa, $matchesgArloa);  
  preg_match($patroia,$trimeposta,$matchesPostaPatroia); 
  
  

  if ($matchesePosta && $matchesgTestua && $matcheseZuzena && $matcheseOkerra1 && $matcheseOkerra2 && $matcheseOkerra3 && $matchesgZail && $matchesgArloa && strlen($trimgTestua)>9){
    if ($matchesPostaPatroia){
      if (strlen($trimgTestua)>9){
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
        echo nl2br("Erregistro berri bat XML fitxategian gehitu da");
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
        echo nl2br('<br>Erregistrio berri bat JSON fitxategian gehitu da<br>');
        }catch(Exception $e){
          echo"<script> alert('Error')</script>";
        } 
        include 'DbConfig.php';
        $niresqli=new mysqli($zerbitzari,$erabiltzailea,$gakoa,$db);
        if ($niresqli->connect_errno){
          echo"<script> alert('Konexioa ez da ireki') </script>";
          //echo ("die('Huts egin du konexioak MySQL-ra: ('.$niresqli->connect_errno . ')'. $niresqli->connect_error);");
        }
        if(!$niresqli->query("INSERT INTO dbt51_questions (Eposta,Galdera,erZuzena,erOkerra1,erOkerra2,erOkerra3,Zailtasuna,Arloa) VALUES ('$trimePosta','$trimgTestua','$trimeZuzena','$trimeOkerra1','$trimeOkerra2','$trimeOkerra3','$trimgZail','$trimgArloa')")){
          echo ("Sartu diren datuak okerrak dira");
          echo "Error:" . $niresqli->error;
        }else{
          echo ("Galdera berria gorde da!\n");
          $ePosta=$_GET['eposta'];
          echo nl2br ("\n\n");
          echo nl2br ("<a href = ShowQuestions.php?eposta=$ePosta>Ikusi dauden galdera guztiak irudi gabe.</a>\n");
          echo nl2br ("<a href = ShowQuestionsWithImage.php?eposta=$ePosta>Ikusi dauden galdera guztiak irudiekin.</a>\n");
          echo nl2br ("<a href = QuestionFormWithImage.php?eposta=$ePosta>Beste galdera bat egiteko.</a>\n");
          echo n12br ("Oraingoz goian agertzen diren estekek ez dute funtzionatzen eta beraz, gomendatzen da bertikaleko nabigazio-barrako estekak erabiltzea, arazoa konpontzen ari gara");
        }
        mysqli_close($niresqli);
      }else{
      echo"<script>alert('Galderaren luzerak gutxienez 10 karakterekoa izan behar du')</script>";
      }
    }else{
      echo"<script> alert('Posta elektronikoaren formatua ez da egokia')</script>";
    }

  }else{
      echo "<p> Datu batzuk hutsak aurkitzen dira, bete";
  }
                 
}
?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php
  /*if (isset($_POST['eposta']) && isset($_POST['galdera']) && isset($_POST['zuzen']) && isset($_POST['oker1']) && isset($_POST['oker2']) && isset($_POST['oker3']) && isset($_POST['zailtasun']) && isset($_POST['arlo'])){
    echo("KAIXO");
    $eposta=$_POST['eposta'];
    $galdera=$_POST['galdera'];
    $pattern= "/^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es) || [a-zA-Z]\.[a-zA-Z]+@ehu\.(eus|es)$/";
    $patternQuestion="/^[a-zA-Z0-9]+$/";
    if (preg_match($pattern,$eposta) && preg_match($patternQuestion,$galdera) && strlen($galdera)>=10){
        include 'DbConfig.php';
        $niresqli=new mysqli($zerbitzaria,$erabiltzailea,$gakoa,$db);
        if ($niresqli->connect_errno){
          echo ("die('Huts egin du konexioak MySQL-ra: ('.$niresqli->connect_errno . ')'. $niresqli->connect_error);");
        }
        if(!$niresqli->query("INSERT INTO dbt51_questions (Eposta,Galdera,erZuzena,erOkerra1,erOkerra2,erOkerra3,Zailtasuna,Arloa) VALUES ('$_POST[eposta]','$_POST[galdera]','$_POST[zuzen]','$_POST[oker1]','$_POST[oker2]','$_POST[oker3]',$_POST[zailtasun],'$_POST[arlo]')")){
          echo ("<script> alert('Errorea datuak sartzerako orduan:(.$niresqli->errno.).$niresqli->error') </script>");
        }else{
          echo ("<script> alert('Erregistro berri bat sartu da datu basean') </script>");
          echo"<script><a href=ShowQuestions.php?eposta=$_GET[eposta]> Gordeta dauden galderak konsultatzeko sakatu hemen (Irudirik gabe) </a></span><br></script>";
          echo"<a href=ShowQuestionsWithImage.php?eposta=$_GET[eposta]> Gordeta dauden galderak konsultatzeko sakatu hemen (Irudiak ikusgarri) </a></span><br></script>";
          echo"<a href=QuestionFormWithImage.php?eposta=$_GET[eposta]>Galdera berri bat sortzeko sakatu hemen </a></span></script>";
          
        }
        $niresqli->close();
    }else{
        echo ("<script> 
                alert('Galderak ez du luzera minimoa [gutxienez 10], edota eposta:') 
                </script>");
    }
  }else{
    echo ("'Sartu diren datuak ez dira egokiak ");
  }*/
?>
