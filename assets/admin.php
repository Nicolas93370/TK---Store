<?php
// admin_ajouter.php
require 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $image = $_POST['image']; // Nom du fichier image (ex: lipstick.jpg)

    if (!empty($nom) && !empty($prix) && !empty($image)) {
        $stmt = $pdo->prepare("INSERT INTO produits (nom, prix, image) VALUES (?, ?, ?)");
        if ($stmt->execute([$nom, $prix, $image])) {
            $message = "✅ Produit ajouté avec succès !";
        } else {
            $message = "❌ Une erreur s'est produite lors de l'ajout.";
        }
    } else {
        $message = "⚠️ Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; max-width: 600px; margin: auto; }
        form { display: flex; flex-direction: column; gap: 15px; }
        label { font-weight: bold; }
        input[type="text"], input[type="number"] { padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .message { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>

<h2>🛒 Ajouter un nouveau produit</h2>

<form method="POST">
    <label>Nom du produit :</label>
    <input type="text" name="nom" required>

    <label>Prix (€) :</label>
    <input type="number" name="prix" step="0.01" required>

    <label>Nom de l'image (dans /assets/images/) :</label>
    <input type="text" name="image" placeholder="ex: lipstick.jpg" required>

    <input type="submit" value="Ajouter">
</form>

<div class="message"><?= $message ?></div>

</body>
</html>
<?php
// admin.php
require 'config.php';

$produits = [];
$stmt = $pdo->query("SELECT * FROM produits");
while ($row = $stmt->fetch()) {
    $produits[] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - TK Store</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; max-width: 800px; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

<h2>🛒 Administration - Gestion des produits</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Rouge à lèvres hydratant</th>
            <th>8,99 €</th>
            <th><img src="assets/images/rouge-a-levres.jpg" alt="Rouge à lèvres hydratant" width="100"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= $produit['id'] ?></td>
                <td><?= $produit['Rouge à lèvres hydratant'] ?></td>
                <td><?= $produit['8,99 €'] ?> €</td>
                <td><img src="assets/images/<?= $produit['image'] ?>" alt="<?= $produit['Rouge à lèvres hydratant'] ?>" width="100"></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
        <thead>
          <tr>
            <th>ID</th>
            <th>Crème hydratante</th>
            <th>14,50 €</th>
            <th><img src="assets/images/creme-hydratante.jpg" alt="Crème hydratante" width="100"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= $produit['id'] ?></td>
                <td><?= $produit['Crème hydratante'] ?></td>
                <td><?= $produit['14,50 €'] ?> €</td>
                <td><img src="assets/images/<?= $produit['image'] ?>" alt="<?= $produit['Crème hydratante'] ?>" width="100"></td>
            </tr>
        <?php endforeach; ?>

</table>

</body>
</html>
