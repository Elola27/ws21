<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script language="JavaScript">
          $(document).ready(function(){
                    $.betetadagoen = function()
                    {   
                        if (($("#eposta").val().length>0) && ($("#deitura").val().length>0) && ($("#pasahitz").val().length>0) && ($("#pasahitzerrepikapen").val().length>0) &&  ($('input[name=mota]').is(":checked")))
                        {
                            return true;
                        } 
                        else 
                        {
                            return false;
                        }
                    }
                    $.epostakonprobatu = function()
                    {
                        var balioa= $("#eposta").val();
                        if (balioa.match((/^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/)) || balioa.match((/^[a-zA-Z]\.[a-zA-Z]+@ehu\.(eus|es)$/)))
                        {
                            return true;
                        } 
                        else 
                        {
                            return false;
                        }
                    }
                    $.deiturak = function(){
                      var deitura=$("#deitura").val();
                      console.log(deitura);
                      if (deitura.match(/^([A-Z]([a-z]+)(\s[A-Z]([a-z]+)\s?)+)+$/)){
                        return true;
                      }else{
                        return false;
                      }
                    }

                    $('#submit').click(function(){
                        if ($.betetadagoen()){
                            if ($.epostakonprobatu()){ 
                              if ($.deiturak()){
                                return true;  
                              } else{
                                alert("Deituren formatua ez da egokia");
                                return false;
                              }     
                            }else {
                                alert("Erabilitako e-posta elektronikoa okerra da");
                                return false;
                            }
                        }else {
                            alert("Hutsuneak daude, bete itzazu!");
                            return false;
                        }});
              })
</script>
</head>
<body> 
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="register" name="register" action="" method="post">
          <h1> Sartu beharrezko datuak erregistroa burutzeko mesedez </h1>
          <p> Erabiltzaile mota(*): 
        <input type="radio" id="irakasle" name="mota" value="Irakaslea">
        <label for="irakasle">Irakaslea</label>
        <input type="radio" id="ikasle" name="mota" value="Ikaslea">
        <label for="ikasle">Ikaslea</label> </br>
        <label for="eposta"> Eposta (*): </label>
        <input type="text" id="eposta" name="eposta"><br>
        <label for="deitura"> Deitura [izen-abizenak] (*): </label>
        <input type="text" id="deitura" name="deitura"><br>
        <label for="pasahitz"> Pasahitza (*): </label>
        <input type="password" id="pasahitz" name="pasahitz"><br>
        <label for="pasahitzerrepikapen"> Pasahitza errepikatu (*): </label>
        <input type="password" id="pasahitzerrepikapen" name="pasahitzerrepikapen"><br>
        <input type="reset" value="Hustu" id="reset">
        <input type="submit" value="Igorri galdera" id="submit" >
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php
if (isset($_POST['eposta'])){
  $pasahitz=$_POST['pasahitz'];
  $pasahitzerrepikatu=$_POST['pasahitzerrepikapen'];
  if (strlen($pasahitz)>=8){
    if (strcmp($pasahitz,$pasahitzerrepikatu)==0){
    include 'DbConfig.php';
    $niresqli=new mysqli($zerbitzari,$erabiltzailea,$gakoa,$db);
    if ($niresqli->connect_errno){
      echo"<script> alert('Konexioa ez da ireki') </script>";
      //echo ("die('Huts egin du konexioak MySQL-ra: ('.$niresqli->connect_errno . ')'. $niresqli->connect_error);");
    }
    if(!$niresqli->query("INSERT INTO dbt51_user(Eposta,Deiturak,Pasahitza,Mota) VALUES ('$_POST[eposta]','$_POST[deitura]','$_POST[pasahitz]','$_POST[mota]')")){
      echo"<script> alert('BOBO')</script>";  
      //echo "<script> alert('Dagoeneko posta horretarako erabiltzailea sortuta dago') </script>";
    }else{
      echo "<script> alert('Erabiltzaile berria sortuta') </script>";
    }
    mysqli_close($niresqli);
    }else{
      echo "<script> alert('Emandako bi pasahitzak ezberdinak dira')</script>";
    }
  }else{
    echo "<script> alert('Emandako pasahitzaren luzera 8 baino txikiagoa da') </script>";
  }
  
}
/*if (isset($_POST['mota']) && isset($_POST['eposta']) && isset($_POST['deitura']) && isset($_POST['pasahitz']) && isset($_POST['pasahitzerrepikapen'])){
    $pasahitz=$_POST['pasahitz'];
    $pasahitzerrepikatu=$_POST['pasahitzerrepikapen'];
    //$preg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    if(strcmp($pasahitz,$pasahitzerrepikatu)==0 && strlen($pasahitz)>=8){
      include 'DbConfig.php';
      $niresqli=new mysqli($zerbitzari,$erabiltzailea,$gakoa,$db);
      if ($niresqli->connect_errno){
        echo"<script> alert('Konexioa ez da ireki') </script>";
        //echo ("die('Huts egin du konexioak MySQL-ra: ('.$niresqli->connect_errno . ')'. $niresqli->connect_error);");
      }
      $sql_Quiz = "SELECT * FROM dbt51_user WHERE Eposta='$eposta'";

      $ema = $esteka-> query($sql_Quiz);

      if ($ema->num_rows==0){
        if(!$niresqli->query("INSERT INTO dbt51_user(Eposta,Deiturak,Pasahitza,Mota) VALUES ('$_POST[eposta]','$_POST[deitura]','$_POST[pasahitz]','$_POST[mota]')")){
          echo "<script> alert('Errorea datuak sartzerako orduan:('.$niresqli->errno.')' .$niresqli->error') </script>";
        }else{
          //phpAlert("Erabiltailea sortu da, ongi etorri!");
          header('location:Layout.php');
          echo "<script> alert('Ongi etorri!, hemen sakatu hasierako orrira joateko') </script>";
          echo "<p><a href='layout.html'> Home </a>";
			    mysqli_close($esteka);
        }
      }else{
        echo"<script>alert'Dagoeneko erabiltzailea sortuta dago'</script>";
      }
    }else{
    echo "<script> echo'Pasahitzak 8ko luzera izan behar du, eta gutxienez letra xehe bat, larri bat eta zenbaki bat eraman behar ditu' </script>";
    }
}/*else{
    echo "<script> alert('Arazoa dago, ez dira hutsune guztiak bete') </script>";
}*/
?>