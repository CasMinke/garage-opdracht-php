<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>autogegevens wijzigen in de tabel auto van de database garage.</p>
<?php
$autokenteken = $_POST["autokentekenvak"];
$automerk = $_POST["automerkvak"];
$autotype = $_POST["autotypevak"];
$autokmstand = $_POST["autokmstandvak"];
$klantid = $_POST["klantidvak"];

require_once "gar-connect.php";

$sql = $conn->prepare("update auto set automerk = :automerk, autotype = :autotype, autokmstand = :autokmstand, klantid = :klantid where autokenteken = :autokenteken");

$sql->execute([
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokmstand" => $autokmstand,
    "klantid" => $klantid
]);

echo "de auto is gewijzigd.<br>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>