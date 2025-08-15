<?php
$host = 'localhost';
$dbname = 'tk_store';
$username = 'root';
$password = ''; // Ton mot de passe si tu en as un

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

        <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?= htmlspecialchars($produit['id']) ?></td>
            <td><?= htmlspecialchars($produit['nom']) ?></td>
            <td><?= htmlspecialchars($produit['prix']) ?> €</td>
            <td><img src="assets/images/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>" style="width: 100px;"></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>