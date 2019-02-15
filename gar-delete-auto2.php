<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<h1>garage delete auto 2</h1>
<p>op autokenteken gegevens zoeken uit de tabel autos van de database garage zodat ze verwijderd kunnen worden.</p>
<?php
$autokenteken = $_POST["autokentekenvak"];

require_once "gar-connect.php";

$autos = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto where autokenteken = :autokenteken");

$autos->execute(["autokenteken" => $autokenteken]);

echo "<table>";
foreach ($autos as $auto){
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "</tr>";
}
echo "</table><br>";

echo "<form action='gar-delete-auto3.php' method='post'>";
echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "verwijder deze auto.<br>";
echo "<input type='submit'>";
echo "</form>";
?>
</body>
</html>