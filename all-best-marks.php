<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<div class="best-marks">
    <h1>Les mieux notés</h1>
    <div class="list">
        <?php
        foreach ($resultats3 as $row) {
        ?>
        <a href="info-livre.php?id-livre=<?php echo $row['id']?>">
            <div class="livre-template">
                <img src="<?php
                if ($row['couverture']) {
                    echo 'Couvertures/' .  $row['couverture'];
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
    </div>
</div>