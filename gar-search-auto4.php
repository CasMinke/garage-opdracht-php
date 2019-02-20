<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-searcch-auto4.php</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="box">
    <h1>garage zoek op autotype 2</h1>
    <p>op autotype gegevens zoeken uit de tabel autos van de database garage.</p>
    <?php
    $autotype = $_POST["autotypevak"];

    require_once "gar-connect.php";
    $autos = $conn->prepare("select autokenteken, automerk, autotype, autokmstand, klant.klantnaam, klant.klantadres, klant.klantpostcode, klant.klantplaats from auto inner join klant where autotype = :autotype and klant.klantid = auto.klantid");

    $autos->execute(["autotype" => $autotype]);

    echo "<table>";
    echo "<tr>";
    echo "<td><u><b>kenteken:</b></u></td>";
    echo "<td><u><b>merk:</b></u></td>";
    echo "<td><u><b>type:</b></u></td>";
    echo "<td><u><b>kmstand:</b></u></td>";
    echo "</tr>";
    foreach ($autos as $auto){
        echo "<tr>";
        echo "<td>" . $auto["autokenteken"]  . "</td>";
        echo "<td>" . $auto["automerk"]       . "</td>";
        echo "<td>" . $auto["autotype"]      . "</td>";
        echo "<td>" . $auto["autokmstand"] . "</td>";
        echo "</tr>";
        }
        $autos->execute(["autotype" => $autotype]);
    echo "<tr>";
    echo "<td><u><b>naam:</b></u></td>";
    echo "<td><u><b>adres:</b></u></td>";
    echo "<td><u><b>postcode:</b></u></td>";
    echo "<td><u><b>plaats:</b></u></td>";
    echo "</tr>";
    foreach ($autos as $auto){
        echo "<tr>";
        echo "<td>" . $auto["klantnaam"]   . "</td>";
        echo "<td>" . $auto["klantadres"]   . "</td>";
        echo "<td>" . $auto["klantpostcode"]   . "</td>";
        echo "<td>" . $auto["klantplaats"]   . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
    ?>
</div>
</body>
</html>