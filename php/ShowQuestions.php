<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	
	  DBeko galderak taula batean erakusteko PHP kodea <br/>
      Taulan ez dago irudirik
	  

      <?php 
      $niremysqli= new mysqli("localhost","root","","dbt51_quiz");
      $giz=$niremysqli->query("select * from dbt51_questions" );

      echo '<table border=1> <tr> <th>GALDERAID<th>EPOSTA</th> <th>GALDERA</th> <th>ERANTZUN ZUZENA</th> <th>ERANTZUN OKERRA 1</th> <th>ERANTZUN OKERRA 2</th> <th>ERANTZUN OKERRA 3</th> <th>ZAILTASUNA</th> <th>ARLOA</th>';
      $giz->data_seek(0);
      while ($row=$giz->fetch_assoc()) {
        echo '<tr><td>'.$row['GalderaID'].'</td> <td>'.$row->['Eposta'].'</td> <td>'.$row['Galdera'].'</td> <td>'.$row['erZuzena'].'</td> <td>'.$row['erOkerra1'].'</td> <td>'.$row['erOkerra2'].'</td> <td>'.$row['erOkerra3'].'</td> <td>'.$row['Zailtasuna'].'</td> <td>'.$row['Arloa'].'</td> </tr>';
      }

      echo'</table>';
      $giz->close();
      $niremysqli->close();
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
