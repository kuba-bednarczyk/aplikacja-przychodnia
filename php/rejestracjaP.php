<?php
    // session_start();

    // if(!isset($_SESSION['admin'])){
    //     session_destroy();
    //     header("Location: index.php");
    // }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja Pacjenta</title>

</head>
<body>
    <div class="center">
    <div class="back-button" onclick="document.location = '../index.html'">Powrót</div>
        <div class="header"><p>Zarejestruj się</p></div>
        <form action="#" method="POST">
            <div class="input-container first"><label>Imię: <input type="text" class="input-text" name="Imie"></label></div>
            <div class="input-container"><label>Nazwisko: <input type="text" class="input-text" name="Nazwisko"></label></div>
            <div class="input-container"><label>Numer PESEL: <input type="text" class="input-text" name="Pesel"></label></div>
            <div class="input-container"><label>Miejscowość: <input type="text" class="input-text" name="Miejscowosc"></label></div>
            <div class="input-container"><label>Kod pocztowy: <input type="text" class="input-text" name="Kod_pocztowy"></label></div>
            <div class="input-container"><label>Ulica: <input type="text" class="input-text" name="Ulica"></label></div>
            <div class="input-container"><label>Nr domu: <input type="text" class="input-text" name="Nr_domu"></label></div>
            <div class="input-container"><label>Nr telefonu: <input type="text" class="input-text" name="Nr_telefonu"></label></div>
                
        <?php
            $db = mysqli_connect("localhost", "root", "", "przychodnia");
            $sql = "SELECT * from zespol_pracownikow";
            if(mysqli_connect_errno()==0){
                $query = mysqli_query($db, $sql);
                while($wiersz=mysqli_fetch_array($query)){
                    $id = $wiersz['ID_zespolu'];
                    echo "<option value='$id'>$id</option>";
                }

                mysqli_close($db);
            }
        ?>
            </select></label></div>
            <div class="input-container"><input type="submit" value="Dodaj" class="input-button" name="submit"></div>
        </form>
    </div>

    <?php
        if(isset($_POST["submit"])){
            $imie = $_POST['Imie'];
            $nazwisko = $_POST['Nazwisko'];
            $PESEL = $_POST['Pesel'];
            $miejscowosc = $_POST['Miejscowosc'];
            $kod_pocztowy = $_POST['Kod_pocztowy'];
            $ulica = $_POST['Ulica'];
            $nr_domu = $_POST['Nr_domu'];
            $nr_telefonu = $_POST['Nr_telefonu'];
            $db = mysqli_connect("localhost", "root", "", "projekt");
            $sql = "INSERT INTO pracownicy VALUES (null, '$zespol', '$PESEL', '$imie', '$nazwisko', '$miejscowosc', '$ulica', '$kod_pocztowy', '$nr_domu', '$login', '$haslo', '$nr_telefonu', '$administrator')";
                $query = mysqli_query($db, $sql);

            mysqli_close($db);
        }
    ?>
</body>
</html>