<!DOCTYPE html>
<html>
<head>
    <title>Exemple</title>
    <script>
        function increment() {
            var start_for = parseInt(document.getElementById("start_for").innerText);
            start_for++;
            document.getElementById("start_for").innerText = start_for;
        }
    </script>
</head>
<body>
    <?php
    // Initialiser la variable start_for si le formulaire n'a pas été soumis
    $start_for = isset($_POST["start_for"]) ? $_POST["start_for"] : 0;

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer la valeur de start_for
        $start_for = $_POST["start_for"];
    }
    ?>
    <div id="result">
        La valeur de start_for est : <span id="start_for"><?php echo $start_for; ?></span>
    </div>
    <button type="button" onclick="increment()">Augmenter de 1</button>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="display: none;">
        <input type="hidden" id="start_for_hidden" name="start_for">
    </form>
    <script>
        // Mettre à jour la valeur cachée avec la valeur initiale de start_for
        document.getElementById("start_for_hidden").value = <?php echo $start_for; ?>;
    </script>
</body>
</html>
