
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
        
        <div id="container">
            <span class="bigtitle">Edytowanie danych pacjentów</span>
            <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>ID Pacjenta: </b><input type="text" name="id_pacjent" maxlength="11" placeholder="1" required></label><br>
                    <label><b>Imię: </b><input type="text" name="imie" maxlength="30" placeholder="Jan"></label><br>
                    <label><b>Nazwisko: </b><input type="text" name="nazwisko"   maxlength="30" placeholder="Kowalski"></label><br>
                    <label><b>PESEL: </b><input type="text" name="pesel" maxlength="11" placeholder="00000000000"></label><br>
                    <label><b>Miejscowość: </b><input type="text" name="miejscowosc"  maxlength="30" placeholder="Warszawa"></label><br>
                    <label><b>Kod Pocztowy: </b><input type="text" name="pocztowy"  maxlength="6" placeholder="00-000" pattern="[0-9]{2}-[0-9]{3}"></label><br>
                    <label><b>Ulica: </b><input type="text" name="ulica"  maxlength="30" placeholder="Szkolna"></label><br>
                    <label><b>Numer domu: </b><input type="number" name="nr_domu"  maxlength="5" placeholder="1"></label><br>
                    <label><b>Numer mieszkania: </b><input type="number" name="nr_mieszkania"  maxlength="5" placeholder="12"></label><br>
                    <label><b>Telefon: </b><input type="tel" name="telefon"  maxlength="11" placeholder="000-000-000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"></label><br>
                    <?php
                        if (isset($_POST['Edytuj'])){
                            $db = mysqli_connect("localhost", "root", "", "przychodnia");
                            
                            $i = 0;
                            $id_pacjent = mysqli_real_escape_string($db, $_POST['id_pacjent']);
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
                                $zapytanie1 = "SELECT * FROM pacjent";
                                $query2 = mysqli_query($db,$zapytanie1);

                                while ($row = mysqli_fetch_array($query2)){

                                    if($row['id_pacjent'] == $id_pacjent){

                                        if (!empty($_POST['imie'])){
                                            $imie = $_POST['imie'];  
                                        }else{
                                            $imie = $row['imie'];
                                        }

                                        if(!empty($_POST['nazwisko'])){
                                            $nazwisko = $_POST['nazwisko'];
                                        }else{
                                            $nazwisko = $row['nazwisko'];
                                        }
                                        
                                        if(!empty($_POST['pesel'])){
                                            $pesel = $_POST['pesel'];
                                        }else{
                                            $pesel = $row['pesel'];
                                        }

                                        if (!empty($_POST['miejscowosc'])){
                                            $miejscowosc = $_POST['miejscowosc'];
                                        }else{
                                            $miejscowosc = $row['miejscowosc'];
                                        }

                                        if (!empty($_POST['pocztowy'])){
                                            $pocztowy = $_POST['pocztowy'];
                                        }else{
                                            $pocztowy = $row['pocztowy'];
                                        }

                                        if (!empty($_POST['ulica'])){
                                            $ulica = $_POST['ulica'];
                                        }else{
                                            $ulica = $row['ulica'];
                                        }

                                        if (!empty($_POST['nr_domu'])){
                                            $nr_domu = $_POST['nr_domu'];
                                        }else{
                                            $nr_domu = $row['nr_domu'];
                                        }

                                        if (!empty($_POST['nr_mieszkania'])){
                                            $nr_mieszkania = $_POST['nr_mieszkania'];
                                        }else{
                                            $nr_mieszkania = $row['nr_mieszkania'];
                                        }

                                        if (!empty($_POST['telefon'])){
                                            $telefon = $_POST['telefon'];
                                        }else{
                                            $telefon = $row['telefon'];
                                        }

                                        $i += 1;

                                        $zapytanie = "UPDATE pacjent SET imie ='$imie', nazwisko ='$nazwisko', pesel = '$pesel', miejscowosc = '$miejscowosc', pocztowy = '$pocztowy', ulica = '$ulica', nr_domu = '$nr_domu', nr_mieszkania = '$nr_mieszkania', telefon = '$telefon' WHERE id_pacjent = '$id_pacjent'";
                                        $query = mysqli_query($db, $zapytanie);
                                        echo "<b>Dane pacjenta zostały zmodyfikowane</b>";
                                    } 
                                }  
                                if ($i == 0){
                                    echo "<b>W bazie nie ma pacjenta o podanym ID</b>";
                                }             
                            }else{
                                echo "Błąd połączenia z bazą danych";
                            }
                        }
                    ?>
                    <br><br><input type="submit" name="Edytuj" value="Edytuj">     
                </form>
            </div>
        </div>
    </body>
</html>