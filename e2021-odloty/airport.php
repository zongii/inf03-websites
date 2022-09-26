<?php
    setcookie("hasVisited", "true", time() + 3600, '/');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty Samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <div class="banner">
        <div class="bannerText">
            <h2>Odloty z lotniska</h2>
        </div>
        <div class="bannerLogo">
            <img src="./zad6.png" alt="logotyp"></img>
        </div>
    </div>
    <div class="mainContainer">
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>LP.</th>
                <th>NUMER REJSU</th>
                <th>CZAS</th>
                <th>KIERUNEK</th>
                <th>STATUS</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'odloty', 3306);

                $zap = "SELECT id,nr_rejsu,czas,kierunek,status_lotu FROM odloty ORDER BY czas DESC";

                $query = mysqli_query($conn, $zap);

                while($line = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$line["id"]."</td>";
                    echo "<td>".$line["nr_rejsu"]."</td>";
                    echo "<td>".$line["czas"]."</td>";
                    echo "<td>".$line["kierunek"]."</td>";
                    echo "<td>".$line["status_lotu"]."</td>";
                    echo "</tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </div>
    <div class="footer">
        <div class="footerBlock1">
            <a href="./kw1.jpg" download="">Pobierz obraz</a>
        </div>
        <div class="footerBlock2">
            <?php
                if(isset($_COOKIE["hasVisited"]))
                {
                    echo "<p><b>Miło nam, że znowu nas odwiedziłeś</b></p>";
                }
                else {
                    echo "<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>";
                }
            ?>
        </div>
        <div class="footerBlock3">
            Autor: 01234567890
        </div>
    </div>
</body>
</html>