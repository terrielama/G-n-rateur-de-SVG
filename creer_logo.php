
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Créer votre logo</title>
</head>
<body>

<nav class="navbar">
    <a href="accueil.php">Accueil</a>
    <a href="creer_logo.php">Créer un logo</a>
    <a href="ajouter_fond.php">Ajouter un fond</a>
    <a href="ajouter_figure.php">Ajouter une figure</a>
    <a href="voir_logo.php">Voir le logo</a>
</nav>

<!-- ------------------------------------ -->

<h1>SVG Factory</h1>
<br>
<div class="menu">
    <br>
    <p class="bv">Bienvenue sur la page de création de logo </p>

    <p>Le formulaire de saisie du logo :</p>

    <div class="formulaire">
        <?php
        // Connexion à la base de données
        $serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_base_de_donnees = "formulaire";

        $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

        if ($connexion->connect_error) {
            die("La connexion à la base de données a échoué : " . $connexion->connect_error);
        }

        // Récupérer les fonds depuis la base de données
        $resultFonds = $connexion->query("SELECT DISTINCT nom_du_fond, code_SVG FROM formulaire_fond");
        $fonds = array();

        while ($row = $resultFonds->fetch_assoc()) {
            $fonds[] = $row;
        }

        // Récupérer les figures depuis la base de données
        $resultFigures = $connexion->query("SELECT DISTINCT nom_figure, code_SVG FROM formulaire_figure");
        $figures = array();

        while ($row = $resultFigures->fetch_assoc()) {
            $figures[] = $row;
        }
        ?>

        <!-- Formulaire -->
        <form action="creer_logo.php" method="post">
            <label for="nom_du_donateur">Nom du donateur :</label>
            <input type="text" id="nom_du_donateur" name="nom_du_donateur" required><br>

            <label for="nom_logo">Nom du logo :</label>
            <input type="text" id="nom_logo" name="nom_logo" required><br>

            <!-- Choix du fond -->
            <label for="choixFond">Choix du fond :</label>
            <select id="choixFond" name="choixFond">
                <?php
                foreach ($fonds as $id => $fond) {
                    echo '<option value="' . $id . '">' . $fond["nom_du_fond"] . '</option>';
                }
                ?>
            </select>

            <!-- Choix de la figure -->
            <label for="choixFigure">Choix de la figure :</label>
            <select id="choixFigure" name="choixFigure">
                <?php
                foreach ($figures as $id => $figure) {
                    echo '<option value="' . $id . '">' . $figure["nom_figure"] . '</option>';
                }
                ?>
            </select>

            <br>
            <br>
            <br>
            <input type="submit" name="tester" value="Tester !">
        </form>
    </div>
</div>
<br>

<!-- Affichage du logo -->
<?php
if (isset($_POST['choixFond']) && isset($_POST['choixFigure'])) {
    $choixFond = $_POST['choixFond'];
    $choixFigure = $_POST['choixFigure'];

    // Afficher le logo créé
    echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 650 650">';

    echo stripslashes(htmlspecialchars_decode($fonds[$choixFond]['code_SVG']));
    echo stripslashes(htmlspecialchars_decode($figures[$choixFigure]['code_SVG']));

    echo '</svg>';
} else {
    // echo "Erreur lors de la récupération du code SVG de la figure depuis la base de données.";
}

// Affichage des boutons
echo '<div>';
echo '<form action="creer_logo.php" method="post">';
echo '<input type="hidden" name="nom_du_donateur" value="' . (isset($_POST["nom_du_donateur"]) ? $_POST["nom_du_donateur"] : '') . '">';
echo '<input type="hidden" name="nom_logo" value="' . (isset($_POST["nom_logo"]) ? $_POST["nom_logo"] : '') . '">';
echo '<input type="hidden" name="choixFond" value="' . (isset($_POST["choixFond"]) ? $_POST["choixFond"] : '') . '">';
echo '<input type="hidden" name="choixFigure" value="' . (isset($_POST["choixFigure"]) ? $_POST["choixFigure"] : '') . '">';
echo '<input type="submit" name="valider" value="Valider !">';
echo '<input type="submit" name="refuser" value="Refuser !">';
echo '</form>';
echo '</div>';

?>

<?php
if (isset($_POST["valider"])) {
    // Récupération des valeurs du formulaire
    $nom_du_donateur = $_POST["nom_du_donateur"];
    $nom_logo = $_POST["nom_logo"];
    $nom_du_fond = $_POST["choixFond"];
    $nom_figure = $_POST["choixFigure"];

    // Récupération des codes SVG des fond et figure
    $code_SVG_fond = $fonds[$choixFond]['code_SVG'];
    $code_SVG_figure = $figures[$choixFigure]['code_SVG'];

    // Concaténation des codes SVG
    $code_SVG = $code_SVG_fond . $code_SVG_figure;

    // Enregistrement des données en base de données
    $insertion = $connexion->prepare("INSERT INTO formulaire_logo (nom_du_donateur, nom_logo, code_SVG) VALUES (?, ?, ?)");
    $insertion->bind_param("sss", $nom_du_donateur, $nom_logo, $code_SVG);

    if ($insertion->execute()) {
        echo "Enregistrement en base de données réussi.";
    } else {
        echo "Erreur lors de l'enregistrement en base de données.";
    }

    // Fermer la requête préparée
    $insertion->close();
}
elseif (isset($_POST["refuser"])) {
    // Réinitialisation du formulaire
    echo "Les valeurs saisies ont été abandonnées.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>


<!-- Liens vers les autres pages -->
<br>
<br>
<div class="lien">
    <p>Créer une nouvelle figure ! :
        <a href="creer_figure.php">Nouvelle Figure ! </a></p>
    <br>
    <p>Créer un nouveau fond :
        <a href="creer_fond.php">Nouveau Fond !</a></p>
</div>
</body>
</html>
