<?php
// Démarre la session (à placer au début de chaque page où vous souhaitez accéder à $_SESSION)
session_start();

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION["mail"])) {
    // L'utilisateur est connecté, affiche "Connexion" avec le lien vers la page de connexion
    $linkText = $_SESSION["pseudo"];
    $linkTextphone = "<img src='logo.png' alt='' width='50' height='50'>";
    $linkURL = "profil.php"; // Remplacez "connexion.php" par l'URL de votre page de connexion
} else {
    // L'utilisateur n'est pas connecté, affiche "Inscription" avec le lien vers la page d'inscription
    $linkText = "Se connecter";
    $linkTextphone = "<img src='login.png' alt='' width='50' height='50'>";
    $linkURL = "connexion.php"; // Remplacez "inscription.php" par l'URL de votre page d'inscription
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="logout.js" defer></script>
    <title>Write 'n read</title>
</head>
<body>
    
    <div class="navbar">
        
        <a href="index.php" class="logo-navabar"><img src="logo-title.png" alt="" width="220" height="71"></a>
        <a href="index.php" class="home-navbar">Acceuil</a>
        <a href="<?php echo $linkURL; ?>" class="signup"><?php echo $linkText; ?></a>
        <form action="" method="post" class="search-book-form">
            <div class="search-book">
                <input  class="text-box-search" type="text" name="search" id="search" placeholder="Rechercher un livre">
                <button class="submit-search" type="submit"><img src="https://cdn-icons-png.flaticon.com/128/46/46389.png" alt="" width="12px" height="12px"></button>
            </div>
        </form>

        <a href="index.php" class="logo-navabar-phone"><img src="logo-title.png" alt="" width="170" height="50"></a>
        <a href="<?php echo $linkURL; ?>" class="signup-phone"><?php echo $linkTextphone; ?></a>
    </div>

    <div class="navbar-genres">
        <a href="all-livres-by-genres.php?genre-livres=mangas">Mangas</a>
        <a href="all-livres-by-genres.php?genre-livres=romans">Romans</a>
        <a href="all-livres-by-genres.php?genre-livres=light novel">Light Novel</a>
        <a href="all-livres-by-genres.php?genre-livres=horreur">Horreur</a>
        <a href="all-livres-by-genres.php?genre-livres=fantaisie">Fantaisie</a>
        <a href="all-livres-by-genres.php?genre-livres=aventure">Aventure</a>
    </div>

    <div class="navbar-genres-phone">
        <a href="all-livres-by-genres.php?genre-livres=mangas">Mangas</a>
        <a href="all-livres-by-genres.php?genre-livres=romans">Romans</a>
        <a href="all-livres-by-genres.php?genre-livres=light novel">Light Novel</a>
        <a href="all-livres-by-genres.php?genre-livres=horreur">Horreur</a>
        <a href="all-livres-by-genres.php?genre-livres=fantaisie">Fantaisie</a>
        <a href="all-livres-by-genres.php?genre-livres=aventure">Aventure</a>
    </div>

        <form action="" method="post" class="search-book-form-phone">
            <div class="search-book-phone">
                <input  class="text-box-search-phone" type="text" name="search" id="search" placeholder="Rechercher un livre">
                <button class="submit-search-phone" type="submit"><img src="https://cdn-icons-png.flaticon.com/128/46/46389.png" alt="" width="12px" height="12px"></button>
            </div>
        </form>
    

    <div class="results-search">
    <a href="info-livre.php?id-livre=<?php 
    if (isset($row['id'])) {
        echo $row['id'];
    }
    ?>">
        <?php
        // Boucle pour afficher les résultats par exemple
        foreach ($resultats2 as $livre) {
            echo "<a href='info-livre.php?id-livre=" . $livre['id'] . "'>";
            echo "<div class='". $livre['id'] ." research-livre'>";
            echo "<img src='Couvertures/".  $livre['couverture'] ."'></img>";
            echo "<div class='infos'>";
            echo "<p>" . $livre['titre'] . "</p>";
            echo "<p> " . $livre['description'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "<a href='https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]'>Effacer les recherches</a>";
            // Afficher d'autres informations si nécessaire
        }
        ?>
    </a>
</div>
