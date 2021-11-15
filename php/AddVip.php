<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<?php include 'Menus.php'?>
  
  <section class="main" id="s1">
    <div>
    <h3> Erabiltzaile bat VIP zerrendara gehitzeko REST bezeroa</h3>
    <form id="addVIP" name="addVIP" action="" 
        method="post" enctype="multipart/form-data">
        <label for="konprobatu"> Sartu eposta: </label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Gehitu VIP">
    </form>
    <?php
    if (isset($_POST['id'])){
      $ch=curl_init();
      $url="https://sw.ikasten.io/~T51/REST/vipusers/";
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch,CURLOPT_POST,true);
      $data=array('id'=> $_POST['id']);
      curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
      $str=curl_exec($ch);
      //echo "<script> alert('.$str.') </script>";
      echo $str;
      curl_close($ch);
    }
    ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

