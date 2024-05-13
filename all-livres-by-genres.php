<?php

// Informations de connexion à la base de données

// $serveur = "ssh-avbtssio.alwaysdata.net";
// $nom_utilisateur = "avbtssio";
// $mot_de_passe = "frost1204102004__";
// $base_de_donnees = "mysql-avbtssio.alwaysdata.net";

$serveur = "mysql-avbtssio.alwaysdata.net";
$nom_utilisateur = "avbtssio"; // Nom d'utilisateur de la base de données
$mot_de_passe = "frost1204102004__"; // Mot de passe de la base de données
$base_de_donnees = "avbtssio_basededonnees"; // Nom de la base de données

try {
    // Connexion à la base de données via PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $nom_utilisateur, $mot_de_passe);
    
    // Configuration des options de PDO pour gérer les exceptions
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connexion à la base de données réussie";
    
    // Vous pouvez maintenant exécuter des opérations sur la base de données
    

    if(isset($_GET['genre-livres'])) {
        // Récupère la valeur de la variable
        $genre_livres = $_GET['genre-livres'];
    }
    
    // Exemple de requête pour récupérer des données
    $requetegenreslivres = $connexion->query("SELECT * FROM livres WHERE genres LIKE '%$genre_livres%'");
    $resultatsgenreslivres = $requetegenreslivres->fetchAll(PDO::FETCH_ASSOC);

    // Fermeture de la connexion
    $connexion = null;
} catch(PDOException $e) {
    // Gestion des erreurs
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

?>

<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

    <?php 

        $livre = $resultatsgenreslivres;

        if ($livre) {
            ?>

                <div class="all-genre-selected">
                    <div class="list">
                    <?php
                    foreach ($livre as $livres) {
                    ?>
                    <a href="info-livre.php?id-livre=<?php echo $livres['id']?>">
                        <div class="livre-template">
                            <img src="<?php
                            if ($livres['couverture']) {
                                echo 'Couvertures/' . $livres['couverture'];
                            } else {
                                echo "no-cover.png";
                            }
                            ?>" alt="" width="119px" height="162">
                            <div class="template-title">
                                <p><?php echo $livres['titre']; ?></p>
                            </div>
                        </div>
                    </a>
                        
                    <?php
                    }
                    ?>
                    </div>
                </div>

            <?php
        }else {
            echo "<p>Il n'y a aucune livre du type " . $genre_livres . "</p>";
        }

    ?>

</body>
</html>