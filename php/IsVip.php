<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<?php include 'Menus.php'?>
  
  <section class="main" id="s1">
    <div>
    <h3> Erabiltzaile bat VIP den identifikatzeko REST bezeroa</h3>
    <form id="begiratuVIP" name="begiratuVIP" action="" method="post" enctype="multipart/form-data">
        <label for="konprobatu"> Sartu eposta: </label>
        <input type="text" id="konprobatu" name="konprobatu">
        <input type="submit" value="VIP da?">
    </form>
<?php
  if (isset($_POST['konprobatu'])){
    $ch=curl_init();
    $url="https://sw.ikasten.io/~T51/REST/vipusers/".$_POST['konprobatu'];
    echo "<script> alert('$url') </script>";
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $str=curl_exec($ch);
    //echo "<script> alert('.$str.') </script>";
    echo $str;
  }
?>

  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>


    