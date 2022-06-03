<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Przychodnia "Zdrowie"</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../logo/logo.png" type="image/x-icon" />
    <meta name="description" content="Najlepsi w branży projektowej!" />
    <meta name="keywords" content="projekt" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Wiktor Patajewicz" />
    <meta name="reply-to" content="wg833@zs1.lublin.eu" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/nav.css">
</head>
    <body>
        <div class="menu">
            <nav class="nav">
                <a href="./login.php">Zaloguj się</a>
                <a href="./rejestracjaP.php">Zarejestruj się</a>
                <a href="./rejestracjaW.php">Zarejestruj Wizyte</a>
                <a href="../index.html">Strona główna</a>
            </nav>
            <header class="header">
                <h1>Przychodnia</h1>
            </header>
        </div>    
        <div id="content">
            <span class="bigtitle">Logowanie do Panelu</span>
            <div style="height: 15px;"></div>
            <div id="form">
                <form method="post">
                    <label><b>Login: </b><input type="text" name="login" maxLength="15" placeholder="lekarz1"></label><br>
                    <label><b>Hasło: <b><input type="password" name="haslo" maxLength="50" placeholder="Password"></label>
                        <br>
                    <input type="submit" name="zaloguj" value="Zaloguj">
                </form>
            </div>
                <?php
                    if (isset($_POST['zaloguj'])){
                        $db = mysqli_connect("localhost", "root", "", "przychodnia");
                        $login = mysqli_real_escape_string($db, $_POST['login']);
                        $haslo = mysqli_real_escape_string($db, $_POST['haslo']);
                        $haslo = sha1($haslo);

                        $zapytanie = "SELECT * FROM lekarz WHERE login = '$login' and haslo = '$haslo'";
                        $query = mysqli_query($db, $zapytanie);
                        
                        
                        if (mysqli_num_rows($query)>0){
                            $_SESSION['zalogowany'] = $login;
                            header("Location: ./lekarze/index_dodaj.php");
                        }else{
                            echo "<br>";
                            echo "<b>Błędny login lub hasło!</b>";
                        }
                        mysqli_close($db);
                    }
                ?>
        </div>
    </body>
</html>