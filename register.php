
<?php
session_start();

// Connessione al database
// sostituisci "host", "username", "password", "database" con le tue informazioni
$conn = mysqli_connect("host", "username", "password", "database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash della password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserimento nel database
    $query = "INSERT INTO users (username, password_hash) VALUES ('$username', '$hashed_password')";
    mysqli_query($conn, $query);

    // Reindirizzamento alla home page dopo la registrazione
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrazione</title>
</head>
<body>
    <h2>Registrazione</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Registrati</button>
    </form>
</body>
</html>
