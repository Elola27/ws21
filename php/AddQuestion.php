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
			Irudirik gabeko galdera bat gehitzeko PHP kodea </br>
      
      <?php
      /*if $niresqli->connect_errno){
        die ("Errorea datuak sartzerako orduan");
      }*/
        $niresqli=new mysqli($zerbitzaria,$erabiltzailea,$gakoa,$db) or die ("Errorea datubasearekin konexioa egiterako orduan: %s", $niresqli->connect_error);

        //$sql="INSERT INTO dbt51_questions (Eposta,Galdera,erZuzena,erOkerra1,erOkerra2,erOkerra3,Zailtasuna,Arloa) VALUES
        //    ('$_POST[eposta]','$_POST[galdera]','$_POST[zuzen]','$_POST[oker1]','$_POST[oker2]','$_POST[oker3]',$_POST[zailtasun],'$_POST[arlo]')";

        //if (!$niresqli->query($sql)){
        if(!$niresqli->query("INSERT INTO dbt51_questions (Eposta,Galdera,erZuzena,erOkerra1,erOkerra2,erOkerra3,Zailtasuna,Arloa) VALUES ('$_POST[eposta]','$_POST[galdera]','$_POST[zuzen]','$_POST[oker1]','$_POST[oker2]','$_POST[oker3]',$_POST[zailtasun],'$_POST[arlo]')")){
          die("Errorea datuak sartzerako orduan: %s", $niresqli->error);
        }

        echo "Erregistro berri bat sartu da datu basean";
        $niresqli->close();
      ?>
      <span><a href='ShowQuestions.php'> Gordeta dauden galderak konsultatzeko sakatu hemen </a></span>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
