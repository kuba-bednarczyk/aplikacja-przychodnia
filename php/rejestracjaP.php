<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="../css/rejestr.css">

</head>
<body>
    <div class="container">
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
        <div class="form">
            <h1>Rejestracja Pacjenta</h1>
            <form action="" method="post">
                <div class="grid">
                    <label >Imię: </label>
                    <input type="text" name="imie"  required><br>
                    <label >Nazwisko: </label>
                    <input type="text" name="nazwisko" required><br>
                    <label>PESEL: </label>
                    <input type="text" maxlength="11" name="pesel" required><br>
                    <label>Miejscowość: </label>
                    <input type="text" name="miejscowosc" required><br>
                    <label>Kod pocztowy: </label>
                    <input type="text" name="pocztowy" required><br>
                    <label>Ulica: </label>
                    <input type="text" name="ulica" required><br>
                    <label>Nr. domu: </label>
                    <input type="text" name="nr_domu" required><br>
                    <label>Nr. mieszkania: </label>
                    <input type="text" name="nr_mieszkania" required> <br>
                    <label>Telefon: </label>
                    <input type="text" name="telefon" maxlength="9" required><br>
                </div>

                <input type="submit" value="Zarejestruj Się!" name="zarejestruj" id="submit">
            </form>
            <!-- W PHP -->
            <!-- wyświetla informacje "Udało ci sie zarejestrować!" -->
            <!-- jeśli jest błąd to: "Błąd przy rejestracji"  w <p> -->
            <div class="info">
                <p>Udało ci się zarejestrować! Twoje id to: 1</p>
            </div>
        </div>
    </div>

</body>
</html>


<!-- zostawiam phpy może sie przydadzą xD ale trzeba od nowa chyba zrobić -->
<?php
            // $db = mysqli_connect("localhost", "root", "", "przychodnia");
            // $sql = "SELECT * from zespol_pracownikow";
            // if(mysqli_connect_errno()==0){
            //     $query = mysqli_query($db, $sql);
            //     while($wiersz=mysqli_fetch_array($query)){
            //         $id = $wiersz['ID_zespolu'];
            //         echo "<option value='$id'>$id</option>";
            //     }

            //     mysqli_close($db);
            // }
        ?>

<?php
        // if(isset($_POST["submit"])){
        //     $imie = $_POST['Imie'];
        //     $nazwisko = $_POST['Nazwisko'];
        //     $PESEL = $_POST['Pesel'];
        //     $miejscowosc = $_POST['Miejscowosc'];
        //     $kod_pocztowy = $_POST['Kod_pocztowy'];
        //     $ulica = $_POST['Ulica'];
        //     $nr_domu = $_POST['Nr_domu'];
        //     $nr_telefonu = $_POST['Nr_telefonu'];
        //     $db = mysqli_connect("localhost", "root", "", "projekt");
        //     $sql = "INSERT INTO pracownicy VALUES (null, '$zespol', '$PESEL', '$imie', '$nazwisko', '$miejscowosc', '$ulica', '$kod_pocztowy', '$nr_domu', '$login', '$haslo', '$nr_telefonu', '$administrator')";
        //         $query = mysqli_query($db, $sql);

        //     mysqli_close($db);
        // }
    ?>