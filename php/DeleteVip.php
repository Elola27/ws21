<?php session_start(); 
    if (!isset($_SESSION['rola'])){
        echo "<script type='text/javascript'> window.location='Layout.php' </script>";
    }else{
        if ($_SESSION['rola']!="Irakaslea"){
            echo "<script type='text/javascript'> window.location='Layout.php' </script>";
        }
    }     
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<?php include 'Menus.php'?>
  
  <section class="main" id="s1">
    <div>
    <h3> Erabiltzaile bat VIP zerrendatik REST bezeroa</h3>
    <form id="begiratuVIP" name="begiratuVIP" action="" method="post" enctype="multipart/form-data">
        <label for="konprobatu"> Sartu eposta: </label>
        <input type="text" id="konprobatu" name="konprobatu">
        <input type="submit" value="VIP da?">
    </form>
<?php
  if (isset($_POST['konprobatu'])){
    if($_POST['konprobatu']!=""){
      $ch=curl_init();
      $url="http://localhost/REST/vipusers/".$_POST['konprobatu'];
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'BORRAR');
      $str=curl_exec($ch);
      echo "<script> alert('".$_POST['konprobatu']."') </script>";
      echo "<script> alert('".$str."') </script>";
      echo $str;
      curl_close($ch);
    }else{
      echo "Epostaren balioa hutsa eman da, beraz ezin da ezabatu VIP-ik";
    }
   
  }
?>

  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>