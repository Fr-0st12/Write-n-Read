<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<div class="content-profil">
<div class="info-du-compte">
<h1>INFORMATIONS DU COMPTE</h1>

<div class="profile-settings">
    <h1>Paramètres du profils</h1>
    <h2>Modifiez les informations d’identification de votre compte</h2>
    <div class="profil-settings-content">
            <?php
                if(isset($_SESSION["mail"],$_SESSION["pseudo"])) {
                    echo "<p>Pseudo: " . $_SESSION["pseudo"] . "";
                    echo "<p>Adresse e-mail: " . $_SESSION["mail"] . "";
                    echo "<p>ID: " . $_SESSION["id"] . "";
                } else {
                    // L'utilisateur n'est pas connecté, affiche "Inscription" avec le lien vers la page d'inscription
                    $linkText = "S'enregister";
                    $linkURL = "inscription.php"; // Remplacez "inscription.php" par l'URL de votre page d'inscription
                }
            ?>
    </div>
</div>

<div class="delete-profile">
    <h1>Supprimer votre compte</h1>
    <h2>Supprimer votre compte</h2>
    <div class="delete-profile-settings">

    </div>
</div>

<form action="logout.php" method="post">
        <input type="submit" value="Déconnexion">
    </form>
</div>

<div class="separater">

</div>

<div class="add_boook-section">
    AJOUTER UN LIVRE
        <a href="add-livre.php">
            <div class="livre-template">
                <img src="Couvertures/no-cover.png" alt="" width="119px" height="162">

                <div class="template-title">
                    <p>Titre du livre</p>
                </div>
            </div>
        </a>
</div>
</div>