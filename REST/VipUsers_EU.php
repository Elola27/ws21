<?php

// Datuak eskuratzeko konstanteak ...
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "8080");
DEFINE("_USERNAME_", "T51");
DEFINE("_DATABASE_", "db_T51");
DEFINE("_PASSWORD_", "sRuYH1dCR4HVd");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

    $cnx = Database::Konektatu();
    switch ($method) {
        case 'GET':
           	if(isset($_GET['id']))
			{
            $datuak = "";
            $id = $_GET['id'];
			$sql = "SELECT * FROM dbt51_vipusers WHERE Eposta='".$id."';";
            echo $sql .' kontsulta exekutatzen dut <p>';
            $data = Database::GauzatuKontsulta($cnx, $sql);
			if (isset($data[0])){echo "<br><br><b>ZORIONAK ".$id." VIPa da </b>";break;}
			else {echo "<br><br><b>SENTITZEN DUT ".$id." Ez da VIPa</b>";
			break;}
			}
			else
			{
				// Vipak zerrendatzeko zerbitzua (parametro gabeko GETa)
                $sql="SELECT * FROM dbt51_vipusers";
                echo "<br>";
                echo $sql .' kontsulta exekutatzen dut <p>';
                $data = Database::GauzatuKontsulta($cnx, $sql);
                foreach ($data as $datavalor){
                    echo "<br>".$datavalor['Eposta']."</br>";        
                }
                break;
			}
			break;
        case 'POST':
             // VIPa gehitzeko
             if(isset($_POST['id']))
             {
                $arguments = $_POST;
                $result = 0;
                $id= $arguments['id'];
                $sql = "INSERT INTO dbt51_vipusers (Eposta) VALUES('$id');";
                echo $sql .' kontsulta exekutatzen dut <p>';
                $num=Database::GauzatuEzKontsulta($cnx, $sql);
                if ($num==0){echo "BDan jada dago";}
                else {echo json_encode(array('insertedId' => $id));}
                break;
             }
        case 'PUT':
             // hau ez da inplementatu behar
        case 'DELETE':
             // VIP erabiltzailea ezabatzeko
    
	}
    Database::Deskonektatu($cnx);
	
?>