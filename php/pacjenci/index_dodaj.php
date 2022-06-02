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
</head>
    <body>
        <div id="content">
            <span class="bigtitle">Dodawanie danych pacjentów</span>
            <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>Imię: </b><input type="text" name="imie" maxlength="30" placeholder="Jan" required></label><br>
                    <label><b>Nazwisko: </b><input type="text" name="nazwisko"   maxlength="30" placeholder="Kowalski" required></label><br>
                    <label><b>PESEL: </b><input type="text" name="pesel" maxlength="11" placeholder="00000000000" required></label><br>
                    <label><b>Miejscowość: </b><input type="text" name="miejscowosc"  maxlength="30" placeholder="Warszawa" required></label><br>
                    <label><b>Kod Pocztowy: </b><input type="text" name="pocztowy"  maxlength="6" placeholder="00-000" pattern="[0-9]{2}-[0-9]{3}"  required></label><br>
                    <label><b>Ulica: </b><input type="text" name="ulica"  maxlength="30" placeholder="Szkolna" required></label><br>
                    <label><b>Numer domu: </b><input type="number" name="nr_domu"  maxlength="5" placeholder="1" required></label><br>
                    <label><b>Numer mieszkania: </b><input type="number" name="nr_mieszkania"  maxlength="5" placeholder="12"></label><br>
                    <label><b>Telefon: </b><input type="tel" name="telefon"  maxlength="11" placeholder="000-000-000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required></label><br>
                    <?php
                        if (isset($_POST['Dodaj'])){
                            $db = mysqli_connect("localhost", "root", "", "przychodnia");
    
                            $imie = mysqli_real_escape_string($db, $_POST['imie']);
                            $nazwisko = mysqli_real_escape_string($db, $_POST['nazwisko']);
                            $pesel = mysqli_real_escape_string($db, $_POST['pesel']);
                            $miejscowosc = mysqli_real_escape_string($db, $_POST['miejscowosc']);
                            $pocztowy = mysqli_real_escape_string($db, $_POST['pocztowy']);
                            $ulica = mysqli_real_escape_string($db, $_POST['ulica']);
                            $nr_domu = mysqli_real_escape_string($db, $_POST['nr_domu']);
                            $nr_mieszkania = mysqli_real_escape_string($db, $_POST['nr_mieszkania']);
                            $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
                            
                            if($db){
                                $zapytanie = "INSERT INTO pacjent VALUES (null, '$imie', '$nazwisko', '$pesel', '$miejscowosc', '$pocztowy', '$ulica', '$nr_domu', '$nr_mieszkania', '$telefon')";
                                $query = mysqli_query($db, $zapytanie);

                                if (mysqli_affected_rows($db)>0){
                                    echo "<br>";
                                    echo "<b>Dane pacjenta zostały zapisane w bazie danych.</b>";
                                }else{
                                    echo "<b>Błąd zapisu danych!</b>";
                                }
                            }else{
                                echo "<b>Błąd połączenia z bazą danych</b>";
                            }   
                            mysqli_close($db);
                        }
                    ?>
                    <br><br><input type="submit" name="Dodaj" value="Dodaj">     
                </form>
            </div>   
        </div>
    </body>
</html>