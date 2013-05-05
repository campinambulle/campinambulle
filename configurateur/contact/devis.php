<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$courriel = $_POST['courriel'];
$telephone = $_POST['telephone'];
$commentaires = $_POST['commentaires'];

$to = "bonjour@campinambulle.com";

$headers = "From: $courriel \r\n";
$headers .= "Reply-To: $courriel \r\n";

$email_subject = "Devis Campinambulle : $prenom $nom";

$email_body = "Nom : $nom \nPrénom : $prenom \nAdresse : $adresse \nCourriel : $courriel \r\nTéléphone : $telephone \n\n--------- \n\n$commentaires";

$email_sent = mail($to, $email_subject, $email_body, $headers);

//echo $email_sent;

?>