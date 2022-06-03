<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja Wizyty</title>
    <link rel="stylesheet" href="../css/rejestr.css">
    <style> 
    .infoW { margin-bottom: 30px; }
    </style>

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
            <h1>Rejestracja Wizyty</h1>
            <form action="" method="post">
                <div class="grid">
                    <label style="font-size: 18px;">Wpisz PESEL: </label>
                    <input type="text" name="pesel" maxlength="11">
                </div>

                <input type="submit" value="Wyszukaj swoje ID!" id="submit">
            </form>
            <!-- PHP - wyświetla id lub krzyczy że błąd że pacjenta nie ma w bazie lub zły pesel -->
            <div class="info infoW">
                <p>Twoje ID to: {id}</p>
                <!-- albo błąd lol xD -->
            </div>

            <form action="" method="post">
                <div class="grid">
                    <label >ID Pacjenta: </label>
                    <input type="number" min="0" name="id_p" required><br>
                    <label>Nazwisko lekarza: </label>
                    <input type="number" name="id_l" required><br>
                    <label>data: </label>
                    <input type="date" name="data" required><br>
                    <label>Godzina: </label>
                    <input type="time" name="godzina" required><br>

                </div>

                <input type="submit" value="Zarejestruj wizytę!" name="zarejestruj" id="submit">
            </form>
            <!-- W PHP -->
            <!-- wyświetla informacje "Udało ci sie zarejestrować!" -->
            <!-- jeśli jest błąd to: "Błąd przy rejestracji"  w <p> -->
            <div class="info">
                <p>Udało ci się zarejestrować!</p>
            </div>
        </div>
    </div>

</body>
</html>