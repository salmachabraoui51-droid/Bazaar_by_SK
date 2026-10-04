<?phperror_reporting(E_ALL);
ini_set('display_errors',1);
?>
<?php
$conn = new mysqli("localhost","root","","bazaar_by_sk");

if($conn->connect_error){
    die("Erreur de connexion");
}

if(isset($_POST['valider'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['num_tel'];
    $adresse = $_POST['adresse'];
    $paiement = $_POST['paiement'];

    $sql = "INSERT INTO achteur(nom,prenom,num_tel,adresse,paiement)
            VALUES('$nom','$prenom','$telephone','$adresse','$paiement')";

    if($conn->query($sql)){
        echo "<script>alert('Commande enregistrée avec succès');</script>";
    }else{
        echo "Erreur : ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Commande</title>
<link rel="stylesheet" href="Commande.css">
</head>
<body>

<div class="commande">

<h2>Finaliser la commande</h2>

<form action="succesvalidation.html" method="POST">

<input type="text" name="nom" placeholder="Nom" required>

<input type="text" name="prenom" placeholder="Prénom" required>

<input type="text" name="num_tel" placeholder="Téléphone" required>

<input type="text" name="adresse" placeholder="Adresse" required>



<select name="paiement" required>

<option value="Paiement à la livraison">Paiement à la livraison</option>

</select>

<button type="submit" name="valider">
Valider la commande
</button>

</form>

</div>

</body>
</html>