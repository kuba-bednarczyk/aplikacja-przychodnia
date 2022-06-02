
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
            <span class="bigtitle">Edytowanie wizyt</span>
            <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>ID Wizyty: </b><input type="text" name="id_wizyty" maxlength="11" placeholder="1" required></label><br>
                    <label><b>ID Pacjenta: </b><input type="text" name="id_pacjent" maxlength="11" placeholder="1" ></label><br>
                    <label><b>ID Lekarza: </b><input type="text" name="id_lekarz" maxlength="11" placeholder="1"></label><br>
                    <label><b>Data: </b><input type="date" name="daty"></label><br>
                    <label><b>Godzina: </b><input type="time" name="godzina"></label><br>
                    <label><b>ID Gabinetu: </b><input type="text" name="id_gabinet" maxlength="11" placeholder="1"></label><br>
                    <?php
                        if (isset($_POST['Edytuj'])){
                            $db = mysqli_connect("localhost", "root", "", "przychodnia");
                            
                            $i = 0;
                            $id_wizyty = mysqli_real_escape_string($db, $_POST['id_wizyty']);
                            $id_pacjent = mysqli_real_escape_string($db, $_POST['id_pacjent']);
                            $id_lekarz = mysqli_real_escape_string($db, $_POST['id_lekarz']);
                            $daty = mysqli_real_escape_string($db, $_POST['daty']);
                            $godzina = mysqli_real_escape_string($db, $_POST['godzina']);
                            $id_gabinet = mysqli_real_escape_string($db, $_POST['id_gabinet']);
                            
                            if($db){
                                $zapytanie1 = "SELECT * FROM wizyty";
                                $query2 = mysqli_query($db,$zapytanie1);

                                while ($row = mysqli_fetch_array($query2)){

                                    if($row['id_wizyty'] == $id_wizyty){

                                        if (!empty($_POST['id_pacjent'])){
                                            $id_pacjent = $_POST['id_pacjent'];
                                        }else{
                                            $id_pacjent = $row['id_pacjent'];
                                        }

                                        if (!empty($_POST['id_lekarz'])){
                                            $id_lekarz = $_POST['id_lekarz'];  
                                        }else{
                                            $id_lekarz = $row['id_lekarz'];
                                        }

                                        if(!empty($_POST['daty'])){
                                            $daty = $_POST['daty'];
                                        }else{
                                            $daty = $row['daty'];
                                        }
                                        
                                        if(!empty($_POST['godzina'])){
                                            $godzina = $_POST['godzina'];
                                        }else{
                                            $godzina = $row['godzina'];
                                        }

                                        if(!empty($_POST['id_gabinet'])){
                                            $id_gabinet = $_POST['id_gabinet'];
                                        }else{
                                            $id_gabinet = $row['id_gabinet'];
                                        }

                                        $i += 1;

                                        $zapytanie = "UPDATE wizyty SET  id_pacjent = '$id_pacjent', id_lekarz ='$id_lekarz', daty ='$daty', godzina = '$godzina', id_gabinet = '$id_gabinet' WHERE id_wizyty = '$id_wizyty'";
                                        $query = mysqli_query($db, $zapytanie);
                                        echo "<b>Wizyta została zmodyfikowana</b>";
                                    } 
                                }  
                                if ($i == 0){
                                    echo "<b>W bazie nie ma wizyty o podanym ID</b>";
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