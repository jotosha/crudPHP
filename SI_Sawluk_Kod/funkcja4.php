<?php
$conn = new mysqli("localhost", "u665718551_user", "karol1234", "u665718551_db");
//$conn = new mysqli("localhost", "root", null, "u665718551_labki");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ip = $_SERVER['REMOTE_ADDR'];

$sql2 = "INSERT INTO ip (adres) VALUES ('".$ip."');";
if (!$conn->multi_query($sql2)) {
    echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
}

$sql1="SELECT Count( * ) as attempts
    FROM ip
    WHERE adres ='".$ip."'
    AND timestamp > DATE_ADD( now( ) , INTERVAL -1
    MINUTE ) ";

if (!$conn->multi_query($sql1)) {
    echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
}
$res = $conn->store_result();
$row=$res->fetch_assoc();
if($row["attempts"]<5)
{

$sql = "Call ramGoodRam3();";

if (!$conn->multi_query($sql)) {
    echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
}

$doc = new DOMDocument();
$xml_root = $doc->createElement("Lista_zestawow");
$doc->appendChild( $xml_root );

do {
    if ($res = $conn->store_result()) {
        $i=0;
        while($row = $res->fetch_assoc()) {
            $id = $doc->createElement("id".$i);
            $xml_fproc = $doc->createElement("Procesor");
            $xml_lgraf = $doc->createElement("KartaGraficzna");
            $xml_mobo = $doc->createElement("PlytaGlowna");
            $xml_mram = $doc->createElement("Ram");

            $xml_procesor = $doc->createTextNode($row["procesor"]);
            $xml_karta_graf = $doc->createTextNode($row["karta_graf"]);
            $xml_plyta_glowna = $doc->createTextNode($row["plyta_glowna"]);
            $xml_ram = $doc->createTextNode($row["ram"]);

            $id->appendChild( $xml_fproc );
            $xml_fproc->appendChild( $xml_procesor );

            $id->appendChild( $xml_lgraf );
            $xml_lgraf->appendChild( $xml_karta_graf );

            $id->appendChild( $xml_mobo );
            $xml_mobo->appendChild( $xml_plyta_glowna );

            $id->appendChild( $xml_mram );
            $xml_mram->appendChild( $xml_ram );

            $xml_root->appendChild( $id );

            $i=$i+1;
        }
        $res->free();
    } else {
        if ($conn->errno) {
            echo "Store failed: (" . $conn->errno . ") " . $conn->error;
        }
    }
} while ($conn->more_results() && $conn->next_result());

header('Content-Disposition: attachment;filename=ListaZestawowZGoodram.xml');
header('Content-Type: text/xml');
echo $doc->saveXML();
} else
{
    echo "Dostep do strony zostal zablokowany, z powodu zbyt wielu prob polaczen";
}
?>