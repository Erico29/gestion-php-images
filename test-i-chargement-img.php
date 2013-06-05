<?php
// MESSAGES D'ERREUR DE CHARGEMENT
$message = "";
$message .= '<p><strong>File name :</strong> ' . $_FILES['userfile']['name'] . ' <em>//Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).</em></p>';
$message .= '<p><strong>File type :</strong> ' . $_FILES['userfile']['type'] . ' <em>//Le type du fichier. Par exemple, cela peut être « image/png ».</em></p>';
$message .= '<p><strong>File size :</strong> ' . $_FILES['userfile']['size'] . ' <em>//La taille du fichier en octets.</em></p>';
$message .= '<p><strong>File tmp name :</strong> ' . $_FILES['userfile']['tmp_name'] . ' <em>//L\'adresse vers le fichier uploadé dans le répertoire temporaire.</em></p>';
$message .= '<p><strong>File error :</strong> ' . $_FILES['userfile']['error'] . ' <em>//Le code d\'erreur, qui permet de savoir si le fichier a bien été uploadé.</em></p>';

$message .= '<p><strong>Titre :</strong> ' . $_POST['titre'] . ' <em>//Titre récupéré.</em></p>';
$message .= '<p><strong>Description :</strong> ' . $_POST['description'] . ' <em>//Description récupérée.</em></p>';

// AFFICHAGE
$message_erreur = "";
$poids_max = 51200; // Poids max autorisée : 50 octets
if ($_FILES['userfile']['size'] > $poids_max)
    $message_erreur .= "<p>Le fichier est trop lourd (50 ko maximum)</p><br/>";

if ($_FILES['userfile']['error'])
    $message_erreur .= "<p>Erreur(s) de fichier : " . $_FILES['userfile']['error'] . "</p><br/>";
// On peut également vérifier l'extension et la taille maximum du fichier 
// Lire : http://www.siteduzero.com/informatique/tutoriels/upload-de-fichiers-par-formulaire/recuperer-le-fichier
// ENREGISTREMENT DU FICHIER
// Emplacement du dossier pour enregistrer les fichiers :
// $dossier = $_SERVER['DOCUMENT_ROOT'].'Sites/tests/gestion-php-images/images_telechargees';
// Nom du fichier

// On vérifie si l'image est bien de type image/jpeg. Sinon, on ne gère pas l'extension
if ($_FILES['userfile']['type'] = "image/jpeg")
        $extension = ".jpg";
else
    $extension = "";
    
$nom = $_POST['titre'].$extension;
$dossier_upload = "images_telechargees";
$resultat = move_uploaded_file($_FILES['userfile']['tmp_name'], $dossier_upload.'/'.$nom);
if ($resultat) $message .= "<p><strong>Transfert réussi</strong></p><br/>";
else $message_erreur .= "<p>Problème de transfert du fichier</p>";



//$dossier = $_SERVER['DOCUMENT_ROOT'].'images/avatar';
//			chmod($dossier,0777);
//			 $fichier = basename($_FILES['avatar']['name']);
//			 if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier.$fichier)){
//				echo "pb";
//			 }else{
//				echo "ok";
//			 }
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
            <h2>Message éventuel</h2>
            <?php
            echo $message_erreur;
            ?>
        </div>










    </body>

</html>
