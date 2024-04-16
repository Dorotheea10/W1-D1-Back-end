<?php
session_start();

// Verifica se l'utente è autenticato
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// Connessione al database
// sostituisci "host", "username", "password", "database" con le tue informazioni
$conn = mysqli_connect("host", "username", "password", "database");

// Recupero delle informazioni dell'utente
$user_id = $_SESSION["user_id"];
$query = "SELECT username FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$username = $row["username"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Benvenuto, <?php echo $username; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
