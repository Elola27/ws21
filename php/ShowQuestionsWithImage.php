<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1" style="display: flex">
        <div style="overflow-y: scroll; overflow-x: scroll">
            <table style="width:100%; border-collapse:collapse;" >
                <thead>
                    <th>Eposta</th>
                    <th>Galdera</th>
                    <th>Erantzun zuzena</th>
                    <th>Erantzun okerra (1)</th>
                    <th>Erantzun okerra (2)</th>
                    <th>Erantzun okerra (3)</th>
                    <th>Zailtasuna</th>
                    <th>Gaia</th>
                    <th>Irudia</th>
                </thead>
                <tbody>
                    <?php include 'DbConfig.php';
                    function taulaSortu() {
                        global $zerbitzaria, $erabiltzailea, $gakoa, $db;
                        $nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

                        if($nireSQLI->connect_error) {
                            die("DB-ra konexio bat egitean errore bat egon da: " . $nireSQLI->connect_error);
                        }

                        $ema = $nireSQLI->query("SELECT Eposta, Galdera, erZuzena, erOkerra1, erOkerra2, erOkerra3, Zailtasuna, Arloa, Argazkia
                            FROM dbt51_questions");

                        for ($x = 0; $x < $ema->num_rows; $x++){
                            $ema->data_seek($x);
                            $datuak = $ema->fetch_assoc();
                            echo "<tr>";
                            echo "<td>" . $datuak['Eposta'] . "</td>";
                            echo "<td>" . $datuak['Galdera'] . "</td>";
                            echo "<td>" . $datuak['erZuzena'] . "</td>";
                            echo "<td>" . $datuak['erOkerra1'] . "</td>";
                            echo "<td>" . $datuak['erOkerra2'] . "</td>";
                            echo "<td>" . $datuak['erOkerra3'] . "</td>";
                            echo "<td>" . $datuak['Zailtasuna'] . "</td>";
                            echo "<td>" . $datuak['Arloa'] . "</td>";
                            if ($datuak['Argazkia'] != "") {
                                echo "<td>" . '<img src="data:image/*;base64,' . base64_encode($datuak['Argazkia']) . '" height=75 width=75"/>' . "</td>";
                            } else {
                                echo "<td>" . '<img src="../images/default_argazkia.png" height=75 width=75"/>' . "</td>";
                            }

                            echo "</tr>";
                        }
                    }
                    taulaSortu();
                    ?>
                </tbody>
            </table>
        </div> 
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
