<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
    <title>Visualisation de tous les logos</title>
</head>
<body>

<nav class="navbar">
    <a href="accueil.php">Accueil</a>
    <a href="creer_logo.php">Créer un logo</a>
    <a href="ajouter_fond.php">Ajouter un fond</a>
    <a href="ajouter_figure.php">Ajouter une figure</a>
    <a href="voir_logo.php">Voir le logo</a>
</nav>

<h1>SVG Factory</h1>
<br>
<br>
<br>

<br>

<h2>Liste des logos</h2>
<br>

<br>

<!-- --------------------php------------------- -->


<!---------------connection a la base de donnée-------------------  -->

<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "formulaire";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer la liste des logos depuis la base de données
$result = $connexion->query("SELECT * FROM formulaire_logo");

if ($result) {
    if ($result->num_rows > 0) {
        echo '<table border="5" style="width: 70%; border-collapse: collapse; margin-left: 100px;">
                <tr> 
                <th>  Liste des logos </th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $nom_logo = $row["nom_logo"];
            $code_SVG_logo = stripslashes(htmlspecialchars_decode($row["code_SVG"]));
            $nom_du_donateur = $row["nom_du_donateur"];

            echo '<tr>
                    <td><a href="voir_un_logo.php?logo=' . $nom_logo . '"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1050px" height="390px" viewBox="100 -50 500 500">' . $code_SVG_logo . '</svg></a></td>
                    
                </tr>';
        }

        echo '</table>';
    } else {
        echo "Aucun logo trouvé dans la base de données.";
    }
} else {
    echo "Erreur lors de la récupération des données depuis la base de données.";
}
?>


<br>
<br>

<!-- -----------------liens vers les autres pages------------------------------- -->

<div class="lien">
    <p>Plus de détails sur chaque logo : <a href="voir_un_logo.php">Cliquez ici</a></p>
    <br>
    <p>Créer un nouveau logo : <a href="creer_logo.php">Création</a></p>
    <br>
</div>
</body>
</html>
