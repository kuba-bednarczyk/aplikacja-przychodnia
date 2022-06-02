
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
            <span class="bigtitle">Edytowanie danych lekarzy</span>
            <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>ID Lekarza </b><input type="text" name="id_lekarz" maxlength="10" placeholder="1" required></label><br>
                    <label><b>Tytuł: </b><input type="text" name="tytul" placeholder="Lek. med." maxlength="20"></label><br>
                    <label><b>Imię: </b><input type="text" name="imie" maxlength="30" placeholder="Jan"></label><br>
                    <label><b>Nazwisko: </b><input type="text" name="nazwisko"   maxlength="30" placeholder="Kowalski"></label><br>
                    <label><b>Specjalizacja: </b><input type="text" name="specjalizacja" maxlength="30" placeholder="chirurg"></label><br>
                    <?php
                        if (isset($_POST['Edytuj'])){
                            $db = mysqli_connect("localhost", "root", "", "przychodnia");
                            
                            $i = 0;
                            $id_lekarz = mysqli_real_escape_string($db, $_POST['id_lekarz']);
                            $tytul = mysqli_real_escape_string($db, $_POST['tytul']);
                            $imie = mysqli_real_escape_string($db, $_POST['imie']);
                            $nazwisko = mysqli_real_escape_string($db, $_POST['nazwisko']);
                            $specjalizacja = mysqli_real_escape_string($db, $_POST['specjalizacja']);
                            
                            if($db){
                                $zapytanie1 = "SELECT * FROM lekarz";
                                $query2 = mysqli_query($db,$zapytanie1);

                                while ($row = mysqli_fetch_array($query2)){

                                    if($row['id_lekarz'] == $id_lekarz){

                                        if (!empty($_POST['tytul'])){
                                            $tytul = $_POST['tytul'];
                                        }else{
                                            $tytul = $row['tytul'];
                                        }

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
                                        
                                        if(!empty($_POST['specjalizacja'])){
                                            $specjalizacja = $_POST['specjalizacja'];
                                        }else{
                                            $specjalizacja = $row['specjalizacja'];
                                        }

                                        $i += 1;

                                        $zapytanie = "UPDATE lekarz SET  tytul = '$tytul', imie ='$imie', nazwisko ='$nazwisko', specjalizacja = '$specjalizacja' WHERE id_lekarz = '$id_lekarz'";
                                        $query = mysqli_query($db, $zapytanie);
                                        echo "<b>Dane lekarza zostały zmodyfikowane</b>";
                                    } 
                                }  
                                if ($i == 0){
                                    echo "<b>W bazie nie ma lekarza o podanym ID</b>";
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