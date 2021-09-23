<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?> 
  <!--<script src='../js/ValidateFieldsQuestionJS.js'></script>-->
  <script src='../js/jquery-3.4.1.min.js'></script>
  <script src='../js/ValidateFieldsQuestionJQ.js'></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="galderenF" name="galderenF" action="AddQuestion.php" method="post">
        <label for="eposta"> Galdera egilearen e-posta (*): </label>
        <input type="text" id="eposta" name="eposta"><br>
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
        Irudia(Hautazkoa): <input type="file" name="irudia" id="irudia" accept="image/*" onchange="previewFile();"/> <br>
        <img id="igotakoirudia" src="" />
        <input type="reset" value="Hustu" id="reset" onclick="ezabatuigotakoirudia();">
        <input type="submit" value="Igorri galdera" id="submit">
        
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
