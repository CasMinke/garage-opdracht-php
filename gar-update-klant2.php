<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-update-klant2.php</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="box">
<h1>garage update klant2</h1>
<p>dit formulier wordt gebruikt om klantgegevens te wijzigen in de tabel klant van de database garage.</p>
<?php
$klantid = $_POST["klantidvak"];

require_once "gar-connect.php";
$klanten = $conn->prepare("select klantid, klantnaam, klantadres, klantpostcode, klantplaats from klant where klantid = :klantid");

$klanten->execute(["klantid" => $klantid]);

echo "<form action='gar-update-klant3.php' method='post'>";
foreach ($klanten as $klant) {
    echo "klantid:" . $klant["klantid"];
    echo "<input type='hidden' name='klantidvak' value='".$klant["klantid"]."'><br>";

    echo "klantid: ";
    echo "<input type='text' name='klantnaamvak' value=' ".$klant["klantnaam"]."'><br>";

    echo "klantadres: ";
    echo "<input type='text' name='klantadresvak' value=' ".$klant["klantadres"]."'><br>";

    echo "klantpostcode: ";
    echo "<input type='text' name='klantpostcodevak' value=' ".$klant["klantpostcode"]."'><br>";

    echo "klantplaats: ";
    echo "<input type='text' name='klantplaatsvak' value=' ".$klant["klantplaats"]."'><br>";
}
echo "<input type='submit'>";
echo "</form>";
?>
</div>
</body>
</html>