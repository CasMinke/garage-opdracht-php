<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-create-auto2.php</title>
</head>
<body>
<h1>garage create auto 2</h1>
<p>
    een auto toevoegen aan de tabel
    auto in de database garage.
</p>
<?php
$autokenteken            = NULL;
$automerk          = $_POST["automerkvak"];
$autotype         = $_POST["autotypevak"];
$autokmafstand      = $_POST["autokmafstandvak"];
$klantid        = $_POST["klantidvak"];

require_once "gar-connect.php";

$sql = $conn->prepare("insert into auto values (:autokenteken, :automerk, :autotype, :autokmafstand, :klantid)");

$sql->bindParam(":autokenteken",$autokenteken);
$sql->bindParam(":automerk",$automerk);
$sql->bindParam(":autotype",$autotype);
$sql->bindParam(":autokmafstand",$autokmafstand);
$sql->bindParam(":klantid",$klantid);

$sql->execute();

echo "de auto is toegevoegd<br>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>

</body>
</html>