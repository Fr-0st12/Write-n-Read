<?php
// Informations de connexion à la base de données
$serveur = "mysql-avbtssio.alwaysdata.net";
$nom_utilisateur = "avbtssio"; // Nom d'utilisateur de la base de données
$mot_de_passe = "frost1204102004__"; // Mot de passe de la base de données
$base_de_donnees = "avbtssio_basededonnees"; // Nom de la base de données

try {
    // Connexion à la base de données via PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $nom_utilisateur, $mot_de_passe);
    
    // Configuration des options de PDO pour gérer les exceptions
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupère les livres avec un note supérieure ou égale à 3
    $requete3 = $connexion->query("SELECT * FROM livres WHERE note >= 3;");
    $resultats3 = $requete3->fetchAll(PDO::FETCH_ASSOC);

    // Autres requêtes pour récupérer des données
    $requete2 = $connexion->query("SELECT * FROM livres WHERE note >= 3 LIMIT 3;");
    $resultats = $requete2->fetchAll(PDO::FETCH_ASSOC);

    $current_date = date('Y-m-d');
    $yesterday_date = date('Y-m-d', strtotime("-1 day"));

    // Récupération des livres ajoutés récemment
    $requete1 = $connexion->query("SELECT * FROM livres WHERE realease_date > '$yesterday_date'");
    $resultats1 = $requete1->fetchAll(PDO::FETCH_ASSOC);

    // Autre requête pour récupérer des livres ajoutés récemment
    $requete4 = $connexion->query("SELECT * FROM livres WHERE realease_date > '$yesterday_date'");
    $resultats4 = $requete4->fetchAll(PDO::FETCH_ASSOC);

    // Préparation de la requête pour la recherche de livres
    $requete2 = $connexion->prepare("SELECT * FROM livres WHERE titre LIKE :search");

    if (isset($_POST['search'])) {
        $x = "%".$_POST['search']."%";
    }

    // Liaison de la variable de recherche avec le paramètre de la requête
    $requete2->bindParam(':search', $x, PDO::PARAM_STR);

    // Exécution de la requête
    $requete2->execute();

    // Récupération des résultats de la recherche
    $resultats2 = $requete2->fetchAll(PDO::FETCH_ASSOC);

    // Vérification et traitement du formulaire d'inscription
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifie si tous les champs sont remplis
        if (!empty($_POST["pseudo"]) && !empty($_POST["mail"]) && !empty($_POST["mdp"])) {
            $pseudo = $_POST["pseudo"];
            $mail = $_POST["mail"];
            $mdp = $_POST["mdp"];
    
            // Crypte le mot de passe
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
    
            // Vérifie si l'email existe déjà
            $stmtVerifMail = $connexion->prepare("SELECT COUNT(*) AS count FROM users WHERE mail = :mail");
            $stmtVerifMail->bindParam(':mail', $mail);
            $stmtVerifMail->execute();
            $result = $stmtVerifMail->fetch(PDO::FETCH_ASSOC);
    
            if ($result['count'] > 0) {
                echo "Cette adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
            } else {
                // Prépare la requête d'insertion
                $stmt = $connexion->prepare("INSERT INTO users (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)");
    
                // Liaison des valeurs aux paramètres de la requête
                $stmt->bindParam(':pseudo', $pseudo);
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':mdp', $mdpHash);
    
                // Exécution de la requête
                if ($stmt->execute()) {
                    // Démarrage de la session
                    session_start();
    
                    // Stockage des informations de l'utilisateur dans la session
                    $_SESSION["pseudo"] = $pseudo;
                    $_SESSION["mail"] = $mail;
    
                    // Redirige l'utilisateur vers une autre page après insertion réussie
                    header("Location: profil.php");
                    exit; // Arrête l'exécution du script
                } else {
                    echo "Erreur lors de l'insertion.";
                }
            }
        } else {
        }
    }
    

    //Verfie la connexion

    // Vérifie si le formulaire de connexion a été soumis
    $livre = null; // Initialisation de la variable $livre en dehors du bloc if
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les champs sont définis dans $_POST
    if (isset($_POST["mail"], $_POST["mdp"])) {
        // Récupère les valeurs des champs
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];

        // Requête SQL pour récupérer les informations de l'utilisateur à partir du pseudo
        $stmt = $connexion->prepare("SELECT * FROM users WHERE mail = :mail");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si l'utilisateur existe et si le mot de passe est correct


if ($user && password_verify($mdp, $user['mdp'])) {
    // Démarrage de la session
    session_start();

    // Stockage des informations de l'utilisateur dans la session
    $_SESSION["pseudo"] = $user["pseudo"];
    $_SESSION["mail"] = $user["mail"];

    $stmtLivre = $connexion->prepare("SELECT * FROM livres WHERE id_auteur = :id");
    $stmtLivre->bindParam(':id', $_SESSION["id"]);
    $stmtLivre->execute();
    $livre = $stmtLivre->fetch(PDO::FETCH_ASSOC);

    // Redirige l'utilisateur vers une autre page après la connexion réussie
    header("Location: index.php");
    exit; // Arrête l'exécution du script après la redirection
} else {
    echo "Pseudo ou mot de passe incorrect.";
}

// Maintenant, vous pouvez utiliser la variable $livre en dehors du bloc if
// par exemple :
if ($livre !== null) {
} else {
}
    } else {
    }
}

    if(isset($_GET['id-livre'])) {
        // Récupère la valeur de la variable
        $idlivre = $_GET['id-livre'];
        }
    
    // Fermeture de la connexion
    $connexion = null;
} catch(PDOException $e) {
    // Gestion des erreurs
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}
?>
