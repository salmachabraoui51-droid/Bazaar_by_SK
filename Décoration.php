<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bazaar_by_sk");
if ($conn->connect_error) {
    die("Erreur de connexion");
}
$sql = "SELECT * FROM produit where Categorie='Decoration'";
$result = $conn->query($sql);

$total = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Décoration</title>
    <link rel="stylesheet" href="Decoration.css">
</head>
<body>
    
<nav>
    <ul>
        <li><a href="Bazaar.php">Accueil</a></li>
        <li><a href="Décoration.php">Décoration</a></li>
        <li><a href="Cuisine.php">Cuisine</a></li>
        <li><a href="Accessoires.php">Accessoires</a></li>
        <li><a href="Contact.html">Contact</a></li>
        <li> <a href="panier.php">🛒 </a></li>
    </ul>
</nav>





<h1>Nos Produits de Décoration</h1>
<p>Bienvenue dans notre collection de décoration artisanale marocaine.</p>

<div class="products">

   <div class="product-grid">

<?php while($row = $result->fetch_assoc()){ ?>

<div class="product">

<img src="imagePFE/<?php echo trim($row['image']); ?>"alt="">

<h3><?php echo $row['nom_p']; ?></h3>

<p class="prix"><?php echo $row['prix']; ?>DH</p>

 <form action="ajouter_au_panier.php" method="POST">
    <input type="hidden" name="nom_p" value="<?php echo $row['nom_p']; ?>">
    <input type="hidden" name="prix" value="<?php echo $row['prix']; ?>">
    <input type="hidden" name="image" value="<?php echo $row['image']; ?>">


  <button type="submit">Ajouter au panier</button>
 </form>
</div>

<?php } ?>

</div>
 
    

</div>

</body>
</html>