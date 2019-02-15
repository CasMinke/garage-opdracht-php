<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-read-auto.php</title>
</head>
<body>
<h1>garage read auto</h1>
<p>
    dit zijn alle gegevens uit de
    tabel autos van de database garage.
</p>
<?php
require_once "gar-connect.php";
$autos = $conn->prepare("select autokenteken, automerk, autotype, autokmstand, klant.klantnaam from auto inner join klant on auto.klantid = klant.klantid");

$autos->execute();

echo "<table>";
foreach ($autos as $auto){
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"]         . "</td>";
    echo "<td>" . $auto["automerk"]       . "</td>";
    echo "<td>" . $auto["autotype"]      . "</td>";
    echo "<td>" . $auto["autokmstand"]   . "</td>";
    echo "<td>" . $auto["klantnaam"]     . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>