<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <div class="center">
        <div class="back-button" onclick="document.location = 'index.php'">Powrót</div>
        <h1>Login</h1>
        <form method="POST" action="#">
            <div class="txt_field">
                <label>Login </label>
                <input type="text" name="login" required />
            </div>
            <div class="txt_field">
                <label>Hasło </label>
                <input type="password" name="pass" required />
            </div>
            <div>
                <input type="submit" name="submit" value="Zaloguj">
            </div>
        </form>
    </div>
    <?php
        // $conn = mysqli_connect("localhost", "root", "", "przychodnia");

        // if(isset($_POST['submit'])){
        //     $login = mysqli_real_escape_string($conn, $_POST['login']);
        //     $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        //     $passh = hash("sha1", $pass);

        //     $sql1 = "SELECT * FROM lekarz where login=$login and haslo=$passh";
            
        //     $query = mysqli_query($conn, $sql1);

        //     if(mysqli_num_rows($query)>0) {
        //         $_SESSION['admin'] = $login;
        //         header("Location: administracja.php");
        //     }
        //     else {
        //         echo "<a>Błędne dane</a>";
        //     }
        // }
        
        ?>
    </body>
</html>