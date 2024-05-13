<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="text" id="textInput">
    </form>
    <div id="displayText"></div>

    <div class="text-a-edit">
        Hello
    </div>

    <style>
        .text-a-edit{
            font-size: 500px;
        }
    </style>

    <script>
        // Récupère l'élément de saisie de texte et l'élément où afficher le texte
        var textInput = document.getElementById('textInput');
        var displayText = document.getElementById('displayText');

        // Ajoute un écouteur d'événements pour détecter les modifications du champ de texte
        textInput.addEventListener('input', function() {
            // Met à jour le contenu de l'élément où afficher le texte avec le texte encadré dans une balise <a>
            displayText.innerHTML = "<style>.text-a-edit{color:" + textInput.value + ";}";
        });
    </script>


    
</body>
</html>
