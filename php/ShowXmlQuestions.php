<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
</head>
<body>
  <?php include 'Menus.php' ?>
  <section class="main" id="s1">
    <div>
	
	  DBeko galderak taula batean erakusteko PHP kodea <br/>
      Taulan ez dago irudirik
	  

      <?php 
      $xml=simplexml_load_file('../xml/Questions.xml');
      echo '<table border=1> <tr> <th>GALDERA<th>EPOSTA</th><th>ERANTZUN ZUZENA</th>';
      foreach($xml->assessmentItem as $galdera){
        echo '<tr><td>'.$galdera->itemBody->p.'</td> <td>'.$galdera['author'].'</td> <td>'.$galdera->correctResponse->response.'</td></tr>';
      }
      echo'</table>';
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
