<?php
$message = "";
$message .= '<p><strong>File name :</strong> ' . $_FILES['userfile']['name'] . ' <em>//Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).</em></p>';
$message .= '<p><strong>File type :</strong> ' . $_FILES['userfile']['type'] . ' <em>//Le type du fichier. Par exemple, cela peut être « image/png ».</em></p>';
$message .= '<p><strong>File size :</strong> ' . $_FILES['userfile']['size'] . ' <em>//La taille du fichier en octets.</em></p>';
$message .= '<p><strong>File tmp name :</strong> ' . $_FILES['userfile']['tmp_name'] . ' <em>//L\'adresse vers le fichier uploadé dans le répertoire temporaire.</em></p>';
$message .= '<p><strong>File error :</strong> ' . $_FILES['userfile']['error'] . ' <em>//Le code d\'erreur, qui permet de savoir si le fichier a bien été uploadé.</em></p>';

$message .= '<p><strong>Titre :</strong> ' . $_POST['titre'] . ' <em>//Titre récupéré.</em></p>';
$message .= '<p><strong>Description :</strong> ' . $_POST['description'] . ' <em>//Description récupérée.</em></p>';
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
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880"> 
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










    </body>

</html>
