<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

    <div class="connexion-page">
        <div class="connexion-box">
            
            <h1>Créer un compte</h1>

            <!-- <a href="" class="log-google"><img src="https://static.tacdn.com/img2/google/G_color_40x40.png" height="20px" width="20px" alt="">Se connecter avec Google</a> -->

            <!-- <p>ou utiliser une adresse mail pour vous connecter</p> -->
            <form action="" method="post" >

                <div class="connexion-form">
                    <input type="text" name="pseudo" id="pseudo" placeholder=" Pseudo" >
                    <br>
                    <input type="email" name="mail" id="mail" placeholder="Email">
                    <br>
                    <input type="password" name="mdp" id="mpd" placeholder="Mot de passe">
                    <br>
                    <input type="submit" value="S'ENREGISTRER">
                </div>
                
            </form>

            <div class="no-account">
                <p>Déja un compte ? </p>
                <a href="connexion.php"> Connectez-vous</a>
            </div>

        </div>
    </div>

</body>
</html>