<?php

$conn = new mysqli("localhost","root","","bazaar_by_sk");

if($conn->connect_error){
    die("Erreur de connexion");
}

$nom = $_POST['nom_p'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$Quantite = 1;
$check="select * from commande where nom_p='$nom'";
$result = $conn->query($check);
if($result->num_rows > 0){
    $sql="UPDATE commande SET Quantite =Quantite+1,
    Montant_Total=(Quantite+1)*prix where nom_p='$nom'";
}else{
    $sql = "INSERT INTO commande(nom_p,prix,image,Quantite,Montant_Total,Categorie)
VALUES('$nom','$prix','$image',1,'$prix','Decoration')";
}
if($conn->query($sql)){
    header("Location: panier.php");
exit();
}else{
  echo "Erreur SQL :". $conn->error;
}

$conn->close();
?>