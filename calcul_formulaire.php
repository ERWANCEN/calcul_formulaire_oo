<?php

// j'appelle le fichier 'CalculFormulaire.php'
require 'CalculFormulaire.php';

// j'utilise une structure conditionnelle qui vérifie si '$_POST' n'est pas vide et que la valeur de 'submit' dans '$_POST' est bien égale à 'Calculer' pour être sûr que l'on a bien cliqué sur le bon bouton
if (!empty($_POST) && $_POST['submit'] === "Calculer") {
    // si les deux conditions sont remplies, je crée une instance, et je base mon nouvel objet sur la classe 'CalculFormulaire' et je passe en tant que paramètre au constructeur de cette même classe les valeurs de '$_POST'
    $calcul = new CalculFormulaire($_POST);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul Formulaire</title>

    <!-- ajout de styles Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex flex-column align-items-center mt-4">
        <!-- si '$_POST' n'est pas vide, je fais appel à la méthode 'getResultat()' de la classe CalculFormulaire et j'affiche son output, sinon je demande à l'utilisateur d'entrer son calcul à réaliser -->
        <?php echo !empty($_POST) ? $calcul->getResultat() : "<p class=\"alert alert-primary\">Entrez le calcul à réaliser.</p>"; ?>
        <!-- le formulaire a été donné tel quel -->
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="mt-4">
            <input type="text" placeholder="valeur1" name="val1">
            <select name="operator">
                    <option value="addition">+</option>
                    <option value="soustraction">-</option>
                    <option value="multiplication">*</option>
                    <option value="division">/</option>
            </select>
            <input type="text" placeholder="valeur2" name="val2">
            <input type="submit" value="Calculer" name="submit">
        </form>
    </div>
</body>
</html>