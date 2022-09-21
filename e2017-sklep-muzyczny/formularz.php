<?php
    $missing = false;

    $form["checkbox"] = $_POST["checkbox"] ?? "off";

    foreach($_POST as $key => $value){
        $form[$key] = $value;

        if (empty($form[$key])) $missing = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="muzyka.css">
    <title>Sklep Muzyczny</title>
</head>
<body>
    <div class="banner">
        <h1>SKLEP MUZYCZNY</h1>
    </div>
    <div class="container">
        <div class="leftPanel">
            <h2>NASZA OFERTA</h2>
            <ol>
                <li>Instrumenty muzyczne</li>
                <li>Sprzęt audio</li>
                <li>Płyty CD</li>
            </ol>
        </div>
        <div class="rightPanel">
            <?php
                if($missing) {
                    echo "<p>Nie podano wszystkch danych</p>";
                }
                else {
                    $conn = mysqli_connect("localhost", "root", "", "sklep", 3306);

                    $zap1 = "INSERT INTO Uzytkownicy (imie, nazwisko, adres, telefon) VALUES ('".$form['name']."','".$form['surname']."','".$form['address']."','".$form['phone']."');";
                    $zap2 = "INSERT INTO Konta (login, haslo) VALUES ('".$form['login']."', '".$form['password']."');";

                    $query = mysqli_query($conn, $zap1);
                    $query = mysqli_query($conn, $zap2);

                    echo "<p>Konto ".$form["name"]." ".$form["surname"]." zostało zarejestrowane w sklepie muzycznym</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>

<!-- 
zapytanie 1: INSERT INTO `uzytkownicy` (`imie`, `nazwisko`, `adres`, `telefon`) VALUES ('Jan', 'Nowak', 'Warszawa, Kopernika 4', '608111222');
zapytanie 2: INSERT INTO `konta` (`login`, `haslo`) VALUES ('janNowak', 'qwerty');
zapytanie 3: SELECT `imie`, `nazwisko` FROM `uzytkownicy`; -->