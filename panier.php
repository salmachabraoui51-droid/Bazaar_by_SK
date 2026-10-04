<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bazaar_by_sk");
if ($conn->connect_error) {
    die("Erreur de connexion");
}
$sql = "SELECT * FROM commande";
$result = $conn->query($sql);

$total = 0;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mon Panier</title>
<link rel="stylesheet" href="panier.css">
</head>

<body>


<div class="panier">

<h2>Mon panier</h2>
<?php while($row = $result->fetch_assoc()){ ?>

<div class="produit">

<img src="imagePFE/<?php echo trim($row['image']); ?>" width="80" alt="">

<div class="info">
<h3><?php echo $row['nom_p']; ?></h3>
<p>Prix : <?php echo $row['prix']; ?> </p>
<p>Quantité : <?php echo $row['Quantite']; ?></p>
</div>
<div class="actions">
<a href="supprimer_panier.php?id_c=<?php echo $row['id_c']; ?>">
    🗑
</a>
</div>

</div>

 <?php
$total +=$row['prix'] * $row['Quantite'];
 }
 ?> 

<hr>

<h3>Sous-total : <?php echo $total; ?> DH</h3>

<a class="btn" href="commande.php">Acheter maintenant</a>

</div>

</body>
</html>