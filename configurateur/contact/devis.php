<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$courriel = $_POST['courriel'];
$telephone = $_POST['telephone'];
$amenagement = str_replace("\n", "<br />", $_POST['amenagement']);
$commentaires = $_POST['commentaires'];

$to = "bonjour@campinambulle.com";

$headers = "From: $courriel \r\n";
$headers .= "Reply-To: $courriel \r\n";
$headers .= "Content-Type: text/html; charset=\"UTF-8\" \r\n";

$email_subject = "Devis Campinambulle : $prenom $nom";

$email_body = "Nom : $nom <br />Prénom : $prenom <br />Adresse : $adresse <br />Courriel : $courriel <br />Téléphone : $telephone <br /><br />---------<br /><br />$amenagement<br /><br />---------<br /><br />$commentaires";

$email_sent = mail($to, $email_subject, $email_body, $headers);

//echo $email_sent;

?>