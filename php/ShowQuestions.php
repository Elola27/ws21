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
	
	  DBeko galderak taula batean erakusteko PHP kodea <br/>
      Taulan ez dago irudirik
	  

      <?php 
      $niresqli= new mysqli($zerbitzaria,$erabiltzailea,$gakoa,$db);
      if ($niresqli->connect_errno){
        die("Huts egin du konexioak MySQL-ra: (".$niresqli->connect_errno . ")". $niresqli->connect_error);
      }
      $giz=$niresqli->query("SELECT * FROM dbt51_questions");
      if (!$niresqli->query('SELECT * FROM dbt51_questions')){
        echo "Errorea datuak sartzerako orduan:(".$niresqli->errno.")" .$niresqli->error;
      }
      

      echo '<table border=1> <tr> <th>GALDERAID<th>EPOSTA</th> <th>GALDERA</th> <th>ERANTZUN ZUZENA</th> <th>ERANTZUN OKERRA 1</th> <th>ERANTZUN OKERRA 2</th> <th>ERANTZUN OKERRA 3</th> <th>ZAILTASUNA</th> <th>ARLOA</th>';
      $giz->data_seek(0);
      while ($row=$giz->fetch_assoc()) {
        echo '<tr><td>'.$row['GalderaID'].'</td> <td>'.$row['Eposta'].'</td> <td>'.$row['Galdera'].'</td> <td>'.$row['erZuzena'].'</td> <td>'.$row['erOkerra1'].'</td> <td>'.$row['erOkerra2'].'</td> <td>'.$row['erOkerra3'].'</td> <td>'.$row['Zailtasuna'].'</td> <td>'.$row['Arloa'].'</td> </tr>';
      }

      echo'</table>';
      $giz->close();
      $niresqli->close();
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
