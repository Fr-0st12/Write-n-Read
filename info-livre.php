<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style-lecture.css">
    <title>Write 'n read</title>
</head>
<body>

<?php
try {
    $serveur = "mysql-avbtssio.alwaysdata.net";
    $nom_utilisateur = "avbtssio"; // Nom d'utilisateur de la base de données
    $mot_de_passe = "frost1204102004__"; // Mot de passe de la base de données
    $base_de_donnees = "avbtssio_basededonnees"; // Nom de la base de données

    $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $nom_utilisateur, $mot_de_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['id-livre'])) {
        $idlivre = $_GET['id-livre'];
        $requete = $connexion->prepare("SELECT texte, numero_page FROM pages INNER JOIN livres ON pages.id_livre = livres.id WHERE livres.id = :id");
        $requete->bindParam(':id', $idlivre);
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

        $start_for = 0;

        echo "<script>";
        echo "var start_for = " . $start_for . ";"; // Assurez-vous que la valeur PHP est convertie en JavaScript correctement
        echo "
        function addTwo() {
            start_for += 2;
            console.log(start_for);
        }
        ";
        echo "
        function removeTwo() {
            start_for -= 2;
            console.log(start_for);
        }
        ";
        echo "</script>";

        echo "<button class='removeTwo' onclick='removeTwo()'> ← </button>";


        echo "<div class='all-pages'>";

        foreach ($resultats as $livre) {
            echo "<div class='page ".$livre['numero_page']."'>";
            echo "<p>";
            echo $livre['texte'];
            echo "</p>";
            echo "<p>";
            echo $livre['numero_page'];
            echo "</p>";
            echo "</div>";
        }   


        echo "</div>";

    } else {
        echo "ID du livre non spécifié.";
    }

        echo "<button class='addTwo' onclick='addTwo()'> → </button>";

    $connexion = null;
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données.";
    // Log the detailed error message for debugging
    error_log("PDO Exception: " . $e->getMessage());
}
?>

</body>
</html>
