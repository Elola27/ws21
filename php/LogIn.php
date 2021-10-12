<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?> 
</head>
<body>
 
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="login" name="login" action="" method="post">
        <label for="eposta"> Eposta (*): </label>
        <input type="text" id="eposta" name="eposta"><br>
        <label for="pasahitz"> Pasahitza (*): </label>
        <input type="password" id="pasahitz" name="pasahitz"><br>
        <input type="reset" value="Hustu" id="reset">
        <input type="submit" value="Igorri galdera" id="submit"> 
        <script>
        $(document).ready(function(){
          $('#register').submit(function(){
            if (($("#eposta").val().length>0) && ($("#pasahitz").val().length>0)){
              return true;
            }else{
              alert("Datuak bete");
              return false;
            } 
          })
        })
      </script>
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php

if (isset($_POST['eposta'])&& isset($_POST['pasahitz'])){
  $eposta=$_POST['eposta'];
  $pasahitz=$_POST['pasahitz'];
  include 'DbConfig.php';
  $esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
  if ($esteka->connect_error) {
    die("Errorea konektatzerakoan: " . $esteka->connect_error);
  }
  $sql_Quiz = "SELECT * FROM dbt51_user WHERE Eposta='$eposta' AND Pasahitza='$pasahitz'";

  $ema = $esteka-> query($sql_Quiz);

  if (!($ema)){
    echo "Errorea kontsultan<br >". $ema->error;
    echo "<script> alert('BOBO') </script>";
  }else{
    $rows_cnt = $ema->num_rows;
    mysqli_close($esteka);
    if ($rows_cnt==1){$rows_cnt=0;
        echo "<script> alert('Ongi etorri webgunera') </script>";
        header('location:Layout.php?eposta='.$eposta);                  
    }else{
        echo "<script> alert('Pasahitza ez da zuzena. Saiatu berriro') </script>";
    }
  }
}
?>