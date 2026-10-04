<?php
$conn = mysqli_connect("localhost", "root", "", "Bazaar_By_SK");

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

$Nom = $_POST['nom'];
$Prénom = $_POST['prenom'];
$Email = $_POST['email'];
$Téléphone = $_POST['num_tel'];
$Adresse = $_POST['adresse'];
$Mot_de_passe = $_POST['mot_de_passe'];
$confirm = $_POST['confirm'];

if ($Mot_de_passe != $confirm) {
    echo "Les mots de passe ne correspondent pas !";
} else { echo

    $sql = "INSERT INTO achteur(nom,prenom,email,num_tel,adresse,mot_de_passe)
            VALUES('$Nom','$Prénom','$Email','$Téléphone ','$Adresse','$Mot_de_passe')";

    if (mysqli_query($conn, $sql)) {
        echo "Inscription réussie !";
        header("refresh:2;url=succesconexion.html");
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

