<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<h1>garage update auto2</h1>
<p>dit formulier wordt gebruikt om autogegevens te wijzigen in de tabel auto van de database garage.</p>
<?php
$autokenteken = $_POST["autokentekenvak"];

require_once "gar-connect.php";
$autos = $conn->prepare("select autokenteken, automerk, autotype, autokmstand, klantid from auto where autokenteken = :autokenteken");

$autos->execute(["autokenteken" => $autokenteken]);

echo "<form action='gar-update-auto3.php' method='post'>";
foreach ($autos as $auto) {
    echo "autokenteken:" . $auto["autokenteken"];
    echo "<input type='hidden' name='autokentekenvak' value='".$auto["autokenteken"]."'><br>";

    echo "automerk: ";
    echo "<input type='text' name='automerkvak' value=' ".$auto["automerk"]."'><br>";

    echo "autotype: ";
    echo "<input type='text' name='autotypevak' value=' ".$auto["autotype"]."'><br>";

    echo "autokmstand: ";
    echo "<input type='text' name='autokmstandvak' value=' ".$auto["autokmstand"]."'><br>";

    echo "klantid: ";
    echo "<input type='text' name='klantidvak' value=' ".$auto["klantid"]."'><br>";
}
echo "<input type='submit'>";
echo "</form>";
?>
</body>
</html>