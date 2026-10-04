<?php
$conn = new mysqli("localhost", "root", "", "bazaar_by_sk");

if ($conn->connect_error) {
    die("Connexion échouée");
}

$email = $_POST['email'];
$password = $_POST['mot_de_passe'];

$sql = "SELECT * FROM achteur WHERE email='$email' AND mot_de_passe='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    session_start();
    $_SESSION['email'] = $email;

    header("Location: connecter.html"); // page d'accueil
    exit();

} else {
    echo "<script>
    alert('Email ou mot de passe incorrect !');
    window.location='connecter.html';
    </script>";
}

$conn->close();
?>