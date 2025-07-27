<header>
  <link rel="stylesheet" href="assets/css/style.css">
  <img src="assets/images/logo.png" alt="Logo TK Store" width="150">
  <h1>TK Store</h1>
  <nav>
    <a href="index.php">Accueil</a>
    <a href="produits.php">Produits</a>
    <a href="contact.php">Contact</a>
  </nav>
</header>

<?php include('includes/header.php'); ?>
<main>
  <h2>Nos produits phares</h2>
</main>
<?php
$host = 'localhost';
$dbname = 'tk_store';       // Remplace par le nom de ta base
$user = 'root';             // Par défaut avec XAMPP ou WAMP
$pass = '';                 // Mot de passe vide par défaut

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
<?php
require_once 'config/db.php';

$stmt = $pdo->query("SELECT * FROM produits");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($produits as $produit) {
    echo "<h2>{$produit['nom']}</h2>";
    echo "<p>{$produit['description']}</p>";
    echo "<p><strong>{$produit['prix']} €</strong></p>";
}
?>
<footer>
  <p>© 2025 TK Store. Tous droits réservés.</p>
</footer>