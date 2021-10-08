<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
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
      ?>
      <br>
      <a href='ShowQuestions.php'> Gordeta dauden galderak konsultatzeko sakatu hemen (Irudirik gabe) </a></span><br>
      <a href='ShowQuestionsWithImage.php'> Gordeta dauden galderak konsultatzeko sakatu hemen (Irudiak ikusgarri) </a></span><br>
      <a href='QuestionFormWithImage.php'> Galdera berri bat sortzeko sakatu hemen </a></span>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php
  if (isset($_POST['eposta']) && isset($_POST['galdera']) && isset($_POST['zuzen']) && isset($_POST['oker1']) && isset($_POST['oker2']) && isset($_POST['oker3']) && isset($_POST['zailtasun']) && isset($_POST['arlo'])){
    //echo ("<script> alert('.$_POST['oker3'].') </script>");
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
          echo ("<script> alert('Errorea datuak sartzerako orduan:('.$niresqli->errno.')' .$niresqli->error') </script>");
        }else{
          echo ("<script> alert('Erregistro berri bat sartu da datu basean') </script>");
          
        }
        $niresqli->close();
    }else{
        echo ("<script> 
                alert('Galderak ez du luzera minimoa [gutxienez 10], edota eposta') 
                </script>");
    }
  }else{
    #echo ("<script> alert('Arazoa dago, ez dira hutsune guztiak bete') </script>");
  }
?>
