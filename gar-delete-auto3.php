<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-auto3.php</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<h1>garage delete auto 3</h1>
<p>op autokenteken gegevens zoeken uit de tabel autos van de database garage zodat ze verwijderd kunnen worden.</p>
<?php
$autokenteken = $_POST["autokentekenvak"];
$verwijderen = $_POST["verwijdervak"];

if($verwijderen){
    require_once "gar-connect.php";

    $sql = $conn->prepare("delete from auto where autokenteken = :autokenteken");

    $sql->execute(["autokenteken" => $autokenteken]);

    echo "de gegevens zijn verwijderd.<br>";
}
else{
    echo "de gegevens zijn niet verwijderd.<br>";
}

echo "<a href='gar-menu.php'>terug naar het menu.</a>";
?>
</body>
</html>