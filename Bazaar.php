<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bazaar_by_sk");
if ($conn->connect_error) {
    die("Erreur de connexion");
}
$sql = "SELECT * FROM produit where id_p in(select min(id_p)from produit group by Categorie)";
$result = $conn->query($sql);

$total = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bazaar By SK</title>
<link rel="stylesheet" href="Bazaar.css">
<script src="bazaar.js" defer ></script>
</head>
<body>

<header>
    <div class="logo">
       <img src="./imagePFE/LOGO.png" alt="">
    </div>

    <nav>
        
        <a href="Bazaar.PHP">Accueil</a>
       
        <a href="Décoration.php">Décoration </a>
        
        <a href="Cuisine.php">Cuisine</a>
        
        <a href="Accessoires.php">Accessoires</a>
        
        <a href="Contact.html">Contact</a>
        
    </nav>
    
    <div class="Login">
        <a href="Login.html" >
        <button>Login</button>
        </a>
    </div>
   <nav>
    <a href="panier.php">🛒 </a>
   </nav>

</div>

</header>

<section class="hero">

<div class="hero-text">
<h1>L'ART DE VIVRE MAROCAIN</h1>

</div>

</section>

<section class="categories">

<div class="box">Décoration</div>
<div class="box">Cuisine</div>
<div class="box">Accessooires</div>

</section>

<section class="products">

<h2>Best Sellers</h2>

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

</section>

<footer>
    
 <!-- <div class="logo">
       <img src="./images/LOGO.png" alt="">
    </div> -->

<div class="footer-container">

<div class="footer-section">

<h3>Bazaar By SK</h3>

<p>
Découvrez notre collection artisanale marocaine faite main.
</p>

</div>


<div class="footer-section">

<h3>Liens Rapides</h3>

<ul>

<li><a href="#">Accueil</a></li>

<li><a href="#">Décoration</a></li>

<li><a href="#">Cuisine</a></li>

<li><a href="#">Accessoires</a></li>

<li><a href="#">Contact</a></li>

</ul>

</div>


<div class="footer-section">

<h3>Contact</h3>



<p> <span>📧</span>contact@bazaarbysk.com</p>

<p><span>📞</span> +212 762087799</p>

<p> <span>📍</span>Marrakech, Maroc</p>

</div>


<div class="footer-section">

<h3>Newsletter</h3>

<input type="email"
placeholder="Votre email">

<button>

S'abonner

</button>

</div>

</div>

<div class="footer-bottom">

<p>

© 2026 Bazaar By SK 

</p>

</div>

</footer>

</body>
</html>