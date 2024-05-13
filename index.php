<?php include 'db.php'; ?>
<?php include 'header.php'; ?>


<div class="best-marks">
    <h1>Les mieux notés</h1>
    <div class="list">
        <?php
        foreach ($resultats as $row) {
        ?>
        <a href="info-livre.php?id-livre=<?php echo $row['id']?>">
            <div class="livre-template">
                <img src="<?php
                if ($row['couverture']) {
                    echo 'Couvertures/' . $row['couverture'];
                } else {
                    echo "no-cover.png";
                }
                ?>" alt="" width="119px" height="162">
                <div class="template-title">
                    <p><?php echo $row['titre']; ?></p>
                </div>
            </div>
        </a>
        
        <?php
        }
        ?>
        <div class="see-more"><a href="all-best-marks.php">Vous toutes les meilleurs notes</a></div>
    </div>
</div>

<!-- <div class="in-progress">
    <h1>Reprendre ma lecture</h1>
    <div class="no-in-progress">
        <p>Vous n'avez pas de livre en cours de lecture</p>
    </div>
</div> -->

<div class="last-upload">
    <h1>Derniers ajouts</h1>
    
        <?php
        $row1 = $resultats1;

        if ($row1) {

            ?>

            <h2 class="last-uptdate-date">(Ajoutés le <?php echo date("d / m / Y") ?>)</h2>
            <div class="list">

            <?php foreach ($row1 as $rows1) { ?>

            <a href="info-livre.php?id-livre=<?php echo $rows1['id']?>">
            <div class="livre-template">
                <img src="<?php
                if ($rows1['couverture']) {
                    echo 'Couvertures/' . $rows1['couverture'];
                } else {
                    echo "no-cover.png";
                }
                ?>" alt="" width="119px" height="162">
                <div class="template-title">
                    <p><?php echo $rows1['titre']; ?></p>
                </div>
            </div>
        </a>
        <div class="see-more"><a href="all-last-update.php">Vous touts les derniers ajouts</a></div>

            <?php
            }
            
            }else {
                ?>
                    <div class="no-last-updates">
                        <p>Aucun livre ajouté aujourd'hui</p>
                    </div>
                <?php
            }
        ?>
        
    </div>
</div>

</body>
</html>
