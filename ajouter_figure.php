<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ajouter le fond</title>
</head>
<body>
    
<nav class="navbar">
    <a href="accueil.php">Accueil</a>
        <a href="creer_logo.php">Creer un logo</a>
        <a href="ajouter_fond.php">Ajouter un fond</a>
        <a href="ajouter_figure.php">Ajouter une figure</a>
        <a href="voir_logo.php">Voir le logo</a>
    </ul>
    </nav>

    <h1>SVG Factory</h1>
<br>

<div class="menu" >
        <br>
    <p class="bv">Bienvenue sur la page de création de logo </p>

    <p>Le formulaire de saisie de la Figure :</p>

    <div class="formulaire">
    <form action="ajouter_figure.php" method="post">
            <label for="nom_du_donateur">Nom du donateur:</label>
            <input type="text" id="nom_du_donateur" name="nom_du_donateur" required><br>

            <label for="nom_figure">Nom de la figure:</label>
            <input type="text" id="nom_figure" name="nom_figure" required><br>

            <label for="code_SVG">Code SVG:</label>
            <textarea id="code_SVG" name="code_SVG" rows="4" cols="50" required></textarea><br>

            <input type="submit" name="tester" value="Tester !">
        </form>
    </div>
    </div> 
<br>


<!-- -----------------php--------------------------- -->

<?php

// -------------connection a la base de donnée------------------- 


$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "formulaire";

// Vérifier la connexion
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tester"])) {
        // Afficher le code SVG lors du test
        echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 650 650">';
        echo $_POST["code_SVG"];
        echo 'Sorry, your browser does not support inline SVG.';
        echo '</svg>';

        // Afficher les boutons Valider et Refuser dans le formulaire
        echo '<form action="ajouter_figure.php" method="post">';
        echo '<input type="hidden" name="nom_du_donateur" value="' . $_POST["nom_du_donateur"] . '">';
        echo '<input type="hidden" name="nom_figure" value="' . $_POST["nom_figure"] . '">';
        echo '<input type="hidden" name="code_SVG" value="' . htmlspecialchars(addslashes($_POST["code_SVG"])) . '">';
        echo '<input type="submit" name="valider" value="Valider !">';
        echo '<input type="submit" name="refuser" value="Refuser !">';
        echo '</form>';
        
    } elseif (isset($_POST["valider"])) {
        // Enregistrez les valeurs en BDD et réinitialisez le formulaire
        $nom_du_donateur = $_POST["nom_du_donateur"];
        $nom_figure = $_POST["nom_figure"];
        $code_SVG = $_POST["code_SVG"];

        // Préparation de la requête SQL
        $ins = $connexion->prepare("INSERT INTO formulaire_figure (nom_du_donateur, nom_figure, code_SVG) VALUES (?, ?, ?)");

        // Vérifier si la préparation de la requête a réussi
        if ($ins) {
            // Liaison des paramètres
            $ins->bind_param('sss', $nom_du_donateur, $nom_figure,$code_SVG);

            // Exécution de la requête
            if ($ins->execute()) {
                echo "Les valeurs ont été enregistrées en base de données.$code_SVG";

            } else {
                echo "Erreur lors de l'enregistrement en base de données.";
            }
        } else {
            echo "Erreur lors de la préparation de la requête SQL.";
        }
    } elseif (isset($_POST["refuser"])) {
        // Réinitialisez le formulaire
        echo "Les valeurs saisies ont été abandonnées.";
    }
}

?>


</body>
</html>
