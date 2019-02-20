<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-searcch-auto2.php</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="box">
<h1>garage zoek op autokenteken 2</h1>
<p>op autokenteken gegevens zoeken uit de tabel autos van de database garage.</p>
<?php
$autokenteken = $_POST["autokentekenvak"];

require_once "gar-connect.php";
$autos = $conn->prepare("select autokenteken, automerk, autotype, autokmstand, klant.klantnaam from auto inner join klant where autokenteken = :autokenteken and auto.klantid = klant.klantid");

$autos->execute(["autokenteken" => $autokenteken]);

echo "<table>";
echo "<tr>";
echo "<td><u><b>kenteken:</b></u></td>";
echo "<td><u><b>merk:</b></u></td>";
echo "<td><u><b>type:</b></u></td>";
echo "<td><u><b>kmstand:</b></u></td>";
echo "<td><u><b>klantnaam:</b></u></td>";
echo "</tr>";
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
</div>
</body>
</html>