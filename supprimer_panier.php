<?php

$conn = new mysqli("localhost","root","","bazaar_by_sk");

$id = $_GET['id_c'];

$conn->query("DELETE FROM commande WHERE id_c=$id");

header("Location: panier.php");

?>