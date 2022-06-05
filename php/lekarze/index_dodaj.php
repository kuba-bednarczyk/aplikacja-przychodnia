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
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/add.css">
</head>
    <body>
        <a href="../adm.php" class="goback">Powrót</a>
            <div id="content">
                <h1 class="bigtitle">Dodawanie danych lekarzy</h1>
                <div style="height: 15px;"></div>
                <div id="form1">
                    <form method="POST">
                    <div class="grid">
                        <label><b>Tytuł: </b></label>
                        <input type="text" name="tytul" placeholder="Lek. med." maxlength="20" required>
                        <label><b>Imię: </b></label>
                        <input type="text" name="imie" maxlength="30" placeholder="Jan" required>
                        <label><b>Nazwisko: </b></label>
                        <input type="text" name="nazwisko"   maxlength="30" placeholder="Kowalski" required>
                        <label><b>Specjalizacja: </b></label>
                        <input type="text" name="specjalizacja" maxlength="30" placeholder="chirurg" required>
                        <label><b>Login: </b></label>
                        <input type="text" name="login"  maxlength="15" placeholder="admin" required>
                        <label><b>Hasło: </b></label>
                        <input type="password" name="haslo"  maxlength="50" placeholder="password" required>
                        <input type="submit" name="Dodaj" value="Dodaj">
                        </div>    
                        <?php
                            if (isset($_POST['Dodaj'])){
                                $db = mysqli_connect("localhost", "root", "", "przychodnia");
        
                                $tytul = mysqli_real_escape_string($db, $_POST['tytul']);
                                $imie = mysqli_real_escape_string($db, $_POST['imie']);
                                $nazwisko = mysqli_real_escape_string($db, $_POST['nazwisko']);
                                $specjalizacja = mysqli_real_escape_string($db, $_POST['specjalizacja']);
                                $login = mysqli_real_escape_string($db, $_POST['login']);
                                $haslo = mysqli_real_escape_string($db, $_POST['haslo']);
                                $haslo = sha1($haslo);

                                
                                if($db){
                                    $zapytanie = "INSERT INTO lekarz VALUES (null, '$tytul', '$imie', '$nazwisko', '$specjalizacja', '$login', '$haslo')";
                                    $query = mysqli_query($db, $zapytanie);

                                    if (mysqli_affected_rows($db)>0){
                                        echo "<br>";
                                        echo "<b>Dane lekarza zostały zapisane w bazie danych.</b>";
                                    }else{
                                        echo "<b>Błąd zapisu danych!</b>";
                                    }
                                }else{
                                    echo "<b>Błąd połączenia z bazą danych</b>";
                                }   
                                mysqli_close($db);
                            }
                        ?>
                    </form>
                </div>   
            </div>

    </body>
</html>