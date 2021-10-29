<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
<script src='../js/jquery-3.4.1.min.js'></script>
 <!--<script src='../js/ValidateFieldsQuestionJQ.js'></script>
  <script src='../js/ValidateFieldsQuestionJS.js'></script>
  <script src='../js/ShowImageInForm.js'></script>-->
  <script type="text/javascript" src='../js/ShowQuestionAjax.js'></script>
  <script type="text/javascript" src='../js/AddQuestionAjax.js'></script>
</head>
<body>
<?php include "Menus.php" ?>
  <section class="main" id="s1">
    <div id="form">      
    <h5>Irudia duen galdera baten datuak erabiltzaileak sar ditzan <br/>
	  Irudia eta galdera erlazionatuta egon behar dute<br/></h5>
    <form id="galderenF" name="galderenF">
        <label for="eposta"> Galdera egilearen e-posta (*): </label>
        <input type="text" id="eposta" name="eposta" value=<?php echo $_GET['eposta']?>><br>
        <label for="galdera"> Galdera testua (*): </label>
        <input type="text" id="galdera" name="galdera"><br>
        <label for="zuzen"> Erantzun zuzena (*): </label>
        <input type="text" id="zuzen" name="zuzen"><br>
        <label for="oker1"> Erantzun okerra 1 (*): </label>
        <input type="text" id="oker1" name="oker1"><br>
        <label for="oker2"> Erantzun okerra 2 (*): </label>
        <input type="text" id="oker2" name="oker2"><br>
        <label for="oker3"> Erantzun okerra 3 (*): </label>
        <input type="text" id="oker3" name="oker3"><br>
        <p> Galdera zailtasuna(*): 
        <input type="radio" id="txiki" name="zailtasun" value="1">
        <label for="txiki">Txikia</label>
        <input type="radio" id="ertain" name="zailtasun" value="2">
        <label for="ertain">Ertaina</label>
        <input type="radio" id="handi" name="zailtasun" value="3">
        <label for="handi">Handia</label></p>
        <label for="arlo"> Galderaren arloa(*): </label>
        <input type="text" id="arlo" name="arlo"><br>
        Irudia(Hautazkoa): <input type="file" name="irudia" id="irudia" accept="image/*" onchange="previewFile(event);"/><br>
        <img id="igotakoirudia" src="" /></br>
        <input type="reset" value="Hustu" id="reset" > 
      </form>
      <input type="button" value="Add Questions" id="add" onclick="bidaliDatuak()">
      <input type="button" value="Show Questions" id="show">
    </div>
    <div id="emaitza">
      <p> Galdera berria gehitzearen emaitzak argitaratzeko...</p>
    </div>
    <div id="erakutsi">
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>