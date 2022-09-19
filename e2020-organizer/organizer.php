<?php
    $conn = mysqli_connect('localhost', 'root', '', 'egzamin6', 3306);

    $text = $_POST["textbox"] ?? "";
    
    $zap = "UPDATE zadania SET wpis = '$text' WHERE dataZadania = '2020-08-27'";

    $query = mysqli_query($conn, $zap);

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Organizer</title>
</head>
<body>
    <div class="banner">
        <div class="box">
            <h2>MÓJ ORGANIZER</h2>
        </div>
        <div class="box">
            <form action="#" method="POST">
                <label>Wpis wydarzenia</label>
                <input type="text" name="textbox">
                <input type="submit" value="ZAPISZ">
            </form>
        </div>
        <div class="logo">
            <img src="./logo2.png" alt="logo">
        </div>
        
    </div>
    <div class="container">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin6', 3306);

            $zap2 = "SELECT dataZadania, miesiąc, wpis FROM zadania WHERE miesiąc = 'sierpień'";
            
            $query = mysqli_query($conn, $zap2);

            while($var = mysqli_fetch_array($query)) {
                echo "<div class='card'><h6>".$var['dataZadania'].", ".$var['miesiąc']."</h6><p>".$var['wpis']."</p></div>";
            }

            mysqli_close($conn);
        ?>
    </div>
    <dic class="footer">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin6', 3306);

            $zap = "SELECT miesiąc, rok FROM zadania WHERE dataZadania = '2020-08-01'";

            $query = mysqli_query($conn, $zap);

            $var = mysqli_fetch_array($query);

            echo "<h1>miesiąc: ".$var['miesiąc'].", rok: ".$var['rok']."</h1>";

            mysqli_close($conn);
        ?>
        <p>Stronę Wykonał: Sebastian Golba</p>
    </dic>
</body>
</html>