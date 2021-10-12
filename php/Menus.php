<div id='page-wrap'>
<header class='main' id='h1'>
  <?php
  error_reporting(0);
  $eposta=$_GET['eposta']; 
  if ($eposta==null){
    echo "<span class='right'><a href='SignUp.php'>Erregistratu</a></span> &nbsp;";
    echo "<span class='right'><a href='LogIn.php'>Login</a></span>";
    echo "&nbsp; Anonimoa";
  }else{
    echo "<span class='right'><a href='LogOut.php'>Saioa itxi</a></span>";
    echo "&nbsp; $eposta";
  }
  //echo "<span class="right"><a href="SignUp.php">Erregistratu</a></span>";
  //echo "<span class="right"><a href="LogIn.php">Login</a></span>"
  ?>
</header>

<nav class='main' id='n1' role='navigation'>
<?php
$eposta=$_GET['eposta'];
if ($eposta==null){
  echo"<span><a href='Layout.php'>Hasiera</a></span>";
  echo"<span><a href='Credits.php'>Kredituak</a></span>";
  //<span><a href='QuestionFormWithImage.php'> Galdera sortu </a></span><!-- Kautotutako erabiltzailea behar-->
  //<span><a href='AddQuestion.php'>Galderak</a></span><!-- Kautotutako erabiltzailea behar-->
}else{
  echo"<span><a href=Layout.php?eposta=$eposta>Hasiera</a></span>";
  echo"<span><a href=QuestionFormWithImage.php?eposta=$eposta> Galdera sortu </a></span>";
  echo"<span><a href=ShowQuestions.php?eposta=$eposta>Galderak ikusi</a></span>";
  echo"<span><a href=Credits.php?eposta=$eposta>Kredituak</a></span>";
}
?>   
</nav>