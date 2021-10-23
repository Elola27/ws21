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
      Taulak DBeko irudiak ditu <br/>

      Une honetan garapen fasean aurkitzen den atala da, bitartean galderak kontsultatzeko joan hona:<br/>
    <a href="ShowQuestions.php?eposta=<?php echo $_GET['eposta']?>"> Galderak irudirik gabe </a></span><br>



	  
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
