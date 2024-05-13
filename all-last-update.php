<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<div class="last-upload">
    <h1>Derniers ajouts</h1>
    <h2 class="last-uptdate-date">(Derniers le <?php echo date("d / m / Y") ?>)</h2>
    <div class="list">
        <?php
        foreach ($resultats4 as $row1) {
        if ($row1) {
            ?>
        <a href="">
            <div class="livre-template">
                <img src="<?php
                if ($row1['couverture']) {
                    echo 'Couvertures/' .  $row1['couverture'];
                } else {
                    echo "no-cover.png";
                }
                ?>" alt="" width="119px" height="162">
                <div class="template-title">
                    <p><?php echo $row1['titre']; ?></p>
                </div>
            </div>
        </a>
        <?php
        } else {
            echo "<p>Aucun livre ajouté aujourd'hui</p>";
        }
        
        }
        ?>
    </div>
</div>