<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<div class="story-details">
<h1>Informations sur le livre</h1>

<form action="" method="post">
        <div class="text-informations">
        <label for="titre">Titre:</label><br>
        <input type="text" id="titre" name="titre"><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
        
        <label for="volume">Volume:</label><br>
        <input type="text" id="volume" name="volume"><br>
        
        <label for="editeur">Éditeur:</label><br>
        <input type="text" id="editeur" name="editeur"><br>
        
        <label for="nb_chapitres">Nombre de chapitres:</label><br>
        <input type="number" id="nb_chapitres" name="nb_chapitres"><br>
        
        <label for="genres">Genres:</label><br>
        <input type="text" id="genres" name="genres"><br>
        
        <label for="collection">Collection:</label><br>
        <input type="text" id="collection" name="collection"><br>
        
        <input type="submit" value="Ajouter">
        </div>
        <div class="image-informations">
            <input type="file" name="cover" id="cover">
        </div>
    </form>