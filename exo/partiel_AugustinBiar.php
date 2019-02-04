<?php
echo 'ecrivez après partiel_AugustinBiar.php : "?url=" puis l adresse à vérifier';
$url = $_GET['url']; 
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo 'Cette adresse est bien valide.';
} else {
    echo 'Cette adresse n est pas valide.';
}
?>