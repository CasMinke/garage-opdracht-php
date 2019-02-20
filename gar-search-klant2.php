<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-searcch-klant2.php</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="box">
<h1>garage zoek op klantid 2</h1>
<p>op klantid gegevens zoeken uit de tabel klanten van de database garage.</p>
<?php
$klantid = $_POST["klantidvak"];

require_once "gar-connect.php";
$klanten = $conn->prepare("select klantid, klantnaam, klantadres, klantpostcode, klantplaats from klant where klantid = :klantid");

$klanten->execute(["klantid" => $klantid]);

echo "<table>";
echo "<tr>";
echo "<td><u><b>id:</b></u></td>";
echo "<td><u><b>naam:</b></u></td>";
echo "<td><u><b>adres:</b></u></td>";
echo "<td><u><b>postcode:</b></u></td>";
echo "<td><u><b>plaats:</b></u></td>";
echo "</tr>";
foreach ($klanten as $klant){
    echo "<tr>";
    echo "<td>" . $klant["klantid"]         . "</td>";
    echo "<td>" . $klant["klantnaam"]       . "</td>";
    echo "<td>" . $klant["klantadres"]      . "</td>";
    echo "<td>" . $klant["klantpostcode"]   . "</td>";
    echo "<td>" . $klant["klantplaats"]     . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</div>
</body>
</html>