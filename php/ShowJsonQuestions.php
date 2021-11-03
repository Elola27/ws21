<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
</head>
<body>
  <?php include 'Menus.php' ?>
  <section class="main" id="s1">
  <div style="overflow-y: scroll;">
      <?php 
      $data = file_get_contents("../json/Questions.json");
      $array=json_decode($data);
      
      echo '<table border=1 style="width:100%; margin-left:auto; margin-right:auto;"> <tr> <th>GALDERA<th>EPOSTA</th><th>ERANTZUN ZUZENA</th>';
      foreach($array->assessmentItems as $galdera){
        echo '<tr><td>'.$galdera->itemBody->p.'</td> <td>'.$galdera->author.'</td> <td>'.$galdera->correctResponse->response.'</td></tr>';
      }

      echo'</table>';
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
