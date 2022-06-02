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
            <span class="bigtitle">Dodawanie wizyt</span>
            <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>ID Pacjenta: </b><input type="text" name="id_pacjent" maxlength="11" placeholder="1" required></label><br>
                    <label><b>ID Lekarza: </b><input type="text" name="id_lekarz" maxlength="11" placeholder="1" required></label><br>
                    <label><b>Data: </b><input type="date" name="daty" required></label><br>
                    <label><b>Godzina: </b><input type="time" name="godzina" required></label><br>
                    <label><b>ID Gabinetu: </b><input type="text" name="id_gabinet"  maxlength="11" placeholder="1" required></label><br>
                    
                    
                    <?php
                        if (isset($_POST['Dodaj'])){
                            $db = mysqli_connect("localhost", "root", "", "przychodnia");
    
                            $id_pacjent = mysqli_real_escape_string($db, $_POST['id_pacjent']);
                            $id_lekarz = mysqli_real_escape_string($db, $_POST['id_lekarz']);
                            $daty = mysqli_real_escape_string($db, $_POST['daty']);
                            $godzina = mysqli_real_escape_string($db, $_POST['godzina']);
                            $id_gabinet = mysqli_real_escape_string($db, $_POST['id_gabinet']);
                            
                            if($db){
                                $zapytanie = "INSERT INTO wizyty VALUES (null, '$id_pacjent', '$id_lekarz', '$daty', '$godzina', '$id_gabinet')";
                                $query = mysqli_query($db, $zapytanie);

                                if (mysqli_affected_rows($db)>0){
                                    echo "<br>";
                                    echo "<b>Wizyta została zapisana w bazie danych.</b>";
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