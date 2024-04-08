<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Détails du Logo</title>
</head>
<body>

<h1>SVG Factory - Détails du Logo</h1>
<br>

<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "formulaire";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer le nom du logo à afficher depuis le paramètre 'logo' dans l'URL
if (isset($_GET['logo'])) {
    $nom_logo = $_GET['logo'];

    // Récupérer les détails du logo depuis la base de données
    $result = $connexion->prepare("SELECT nom_du_donateur, code_SVG FROM formulaire_logo WHERE nom_logo = ?");
    $result->bind_param('s', $nom_logo);
    $result->execute();
    $result->store_result();

    if ($result->num_rows > 0) {

// ----------------affichage----------------------------------

// Afficher le SVG en grand
$result->bind_result($nom_du_donateur, $code_SVG);
            $result->fetch();   

        echo '<div style="border: 3px solid #000; padding: 300px; width : 50% ;"';
        echo '<br>';
        echo 'Logo :';
        echo '<br>';
        echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="0 0 800 800">' . ($code_SVG ? stripslashes(htmlspecialchars_decode($code_SVG)) : '') . '</svg>';

        echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';

        echo'Détail du logo (fond et figure) :'; echo '<br>';echo '<br>';echo '<br>';echo '<br>';
        echo '<br>';
        echo '' . ($code_SVG ? stripslashes(htmlspecialchars_decode($code_SVG)) : '') . '</p>';
        echo '<br>';

        echo '</div>';

                
// ----------------------------sous le tableau---------------------
                echo '<br>';
                echo '<h2>Nom du Logo : ' . $nom_logo . '</h2>';
                echo '<br>';
                echo '<p>Donateur: ' . $nom_du_donateur . '</p>';
                echo '<br>';
                
        
        
    } else {
        echo "Aucun logo trouvé avec ce nom.";
    }

    $result->close();
} else {
    echo "Paramètre 'logo' non spécifié dans l'URL.";
}

$connexion->close();
?>

<br>
<br>
<div class="lien">
    <p>Retour à la liste des logos : <a href="voir_logo.php">Retour</a></p>
</div>

</body>
</html>
