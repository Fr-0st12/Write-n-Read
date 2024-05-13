<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

    <div class="connexion-page">
        <div class="connexion-box">
            
            <h1>Se connecter</h1>

            <form action="" method="post" >

                <div class="connexion-form">
                    <input type="email" name="mail" id="mail" placeholder="Email">
                    <br>
                    <input type="password" name="mdp" id="mpd" placeholder="Mot de passe">
                    <br>
                    <input type="submit" value="SE CONNECTER">
                </div>
                
            </form>

            <p>ou</p>

            <div class="no-account">
                <p>Pas encore de compte ? </p>
                <a href="inscription.php"> Enregistrez-vous</a>
            </div>

        </div>
    </div>
    
</body>
</html>