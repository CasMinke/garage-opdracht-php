<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-create-klant2.php</title>
</head>
<body>
<h1>garage create klant 2</h1>
<p>
    een klant toevoegen aan de tabel
    klant in de database garage.
</p>
<?php
$klantid            = NULL;
$klantnaam          = $_POST["klantnaamvak"];
$klantadres         = $_POST["klantadresvak"];
$klantpostcode      = $_POST["klantpostcodevak"];
$klantplaats        = $_POST["klantplaatsvak"];

require_once "gar-connect.php";

$sql = $conn->prepare("insert into klant values (:klantid, :klantnaam, :klantadres, :klantpostcode, :klantplaats)");

$sql->bindParam(":klantid",$klantid);
$sql->bindParam(":klantnaam",$klantnaam);
$sql->bindParam(":klantadres",$klantadres);
$sql->bindParam(":klantpostcode",$klantpostcode);
$sql->bindParam(":klantplaats",$klantplaats);

$sql->execute();

echo "de klant is toegevoegd<br>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>

</body>
</html>