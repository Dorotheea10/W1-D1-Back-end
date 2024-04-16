<?php
session_start();

// Connessione al database
// sostituisci "host", "username", "password", "database" con le tue informazioni
$conn = mysqli_connect("host", "username", "password", "database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Recupero della password hashata dal database
    $query = "SELECT id, password_hash FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["password_hash"];

    // Verifica della password
    if (password_verify($password, $hashed_password)) {
        // Avvio della sessione e memorizzazione dell'ID utente
        $_SESSION["user_id"] = $row["id"];
        header("Location: home.php");
        exit;
    } else {
        echo "Credenziali non valide";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Accedi</button>
    </form>
</body>
</html>
