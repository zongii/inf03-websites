<?php 
    $con = mysqli_connect("localhost", "root", "", "komis", 3306);


    $zap1 = mysqli_query($con, "SELECT id,marka,model FROM samochody;");
    $zap2 = mysqli_query($con, "SELECT Samochody_id, Klient FROM zamowienia;");
    $zap3 = mysqli_query($con, "SELECT * FROM samochody WHERE marka='Fiat';");


    mysqli_close($con);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Komis Samochodowy</title>
        <link rel="stylesheet" href="auto.css" type="text/css">

    </head>
    <body>
        <div id="baner">
            <h1>Samochody</h1>
        </div>
        <div id="panel_lewy">
            <h2>Wykaz samochodów:</h2>
            <ul>
                
                
                
                <?php
                    while($dane1 = mysqli_fetch_array($zap1)) {
                        echo "<li>".$dane1['id']." ".$dane1['marka']." ".$dane1['model']."</li>";
                    }
                ?>
            </ul> 
            <h2>Zamówienia:</h2>
            <?php
                    $numFields = mysqli_num_fields($zap2);
                    
                    while($dane2 = mysqli_fetch_array($zap2)) {
                        echo "<li>";
                        for($i = 0; $i < $numFields; $i++) {
                            echo $dane2[$i]." ";
                        }
                        echo "</li>";
                    }
                ?>
        </div>

        <div id="panel_prawy">
            <h2>Pełne dane: Fiat</h2>
            <?php
                $numFields = mysqli_num_fields($zap3);

                while($dane3 = mysqli_fetch_array($zap3)) {
                    for($i = 0; $i < $numFields; $i++) {
                        echo $dane3[$i]." / ";
                    }
                    echo "<br>";
                }
            ?>
        </div>

        <div id="stopka">
            <table>
                <tr>
                    <td>
                        <a href="kwerendy.txt">Kwerendy</a>
                    </td>
                    <td>Autor: ************</td><td><img src="auto.png" alt="komis samochodowy"></td>
                </tr>
            </table>
        </div>
    </body>

</html>