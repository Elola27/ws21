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
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php
if (isset($_POST['eposta'])&& isset($_POST['pasahitz'])){
    $pasahitz=$_POST['pasahitz'];
    $pasahitzerrepikatu=$_POST['pasahitzerrepikapen'];
    $preg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    if(preg_match($preg,$pasahitz)){
        if (strcmp($pasahitz,$pasahitzerrepikatu)==0){

        }else{
            echo ("<script> alert('Emandako bi pasahitzak ez dira berdinak') </script>");
        }
    }else{
    echo ("<script> alert('Pasahitzak 8ko luzera izan behar du, eta gutxienez letra xehe bat, larri bat eta zenbaki bat eraman behar ditu') </script>");
    }
}else{
    echo ("<script> echo Datuak ez dira egokiak' </script>");
}
?>