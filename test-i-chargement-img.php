<?php
$message = "";
$message .= '<p><strong>File name :</strong> ' . $_FILES['userfile']['name'] . ' <em>//Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).</em></p>';
$message .= '<p><strong>File type :</strong> ' . $_FILES['userfile']['type'] . ' <em>//Le type du fichier. Par exemple, cela peut être « image/png ».</em></p>';
$message .= '<p><strong>File size :</strong> ' . $_FILES['userfile']['size'] . ' <em>//La taille du fichier en octets.</em></p>';
$message .= '<p><strong>File tmp name :</strong> ' . $_FILES['userfile']['tmp_name'] . ' <em>//L\'adresse vers le fichier uploadé dans le répertoire temporaire.</em></p>';
$message .= '<p><strong>File error :</strong> ' . $_FILES['userfile']['error'] . ' <em>//Le code d\'erreur, qui permet de savoir si le fichier a bien été uploadé.</em></p>';

$message .= '<p><strong>Titre :</strong> ' . $_POST['titre'] . ' <em>//Titre récupéré.</em></p>';
$message .= '<p><strong>Description :</strong> ' . $_POST['description'] . ' <em>//Description récupérée.</em></p>';

// Message d'erreur éventuelle
$message_erreur = "";
$taille_max = 51200; // 50 octets
if ($_FILES['userfile']['size'] > $taille_max) 
    $message_erreur .= "Le fichier est trop lourd (50 ko maximum)<br/>";

if ($_FILES['userfile']['error'])
    $message_erreur .= "Erreur(s) de fichier : ".$_FILES['userfile']['error'];
// On peut également vérifier l'extension et la taille maximum du fichier 
// Lire : http://www.siteduzero.com/informatique/tutoriels/upload-de-fichiers-par-formulaire/recuperer-le-fichier
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de téléchargement d'image</title>  
        <style>
            em {
                color: silver;
            }
            strong {
                color: gray;
            }
        </style>
    </head>
    <body>
        <h1>Mon formulaire test</h1>
        <form action="test-i-chargement-img.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="userfile"><br/>
            <br/>
            <input type="text" name="titre" value="Titre du fichier"><br/>
            <br/>
            <textarea name="description"></textarea><br />
            <br/>
            <input type="submit" value="Envoyer">
        </form>
        <br/>
        <div style="border: 1px solid red; padding: 10px;">
            <h2>Retour valeurs :</h2>
            <?php
            echo $message;
            ?>
        </div>
        <br/>
        <br/>
        <div style="border: 1px solid red; padding: 10px;">
            <h2>Message d'erreur éventuelle</h2>
            <?php
            echo $message_erreur;
            ?>
        </div>










    </body>

</html>
