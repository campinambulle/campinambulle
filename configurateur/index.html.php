<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Créer moi-même mon Campinambulle - Campinambulle</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="icon" href="favicon.ico" type="image/x-icon"> 
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">

    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!--[if IE 7]>
      <link rel="stylesheet" href="../assets/css/font-awesome-ie7.min.css">
    <![endif]-->

    <link rel="stylesheet" href="../css/campinambulle.css?1370787794">

    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
  </head>
  <body>
    <?php include('../partials/header.inc.php'); ?>

    <div class="container header-top-space" >
      <h1 class="center spaceT25">
        Choisir mon Campinambulle
        <img src="/img/produit/fabrique-en-france-smaller.png" class="" />
      </h1>
    </div>

    <div id="configurateur" class="container spaceB25">
      <div id="rules" class="spaceT40 center">
        Nous avons fait le choix de ne pas augmenter nos prix 2013 ni de répercuter l’augmentation de la TVA.<br/>
        Nos tarifs actuels restent donc valables pour l’année 2014.
      </div>

<?php
function stringNumberToFloat( $number ) 
{
  return floatval(str_replace(',', '.', $number));
}

function slugify($text)
{ 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}
?>


<?php 
$modeles = array(
  "Campi-Forez" => array( 
      'title' => 'Campi-Forez', 
      'description' => "malle avec table à rallonge", 
      'pdf_url' => "/fiches/MCCU.pdf", 
      'price' => '1082',
      'configs' => array(
        '1' => array( 'photo_href' => '1-MCCU-0455.jpg', 'photo_src' => 'rallonge-0455.jpg')
      )),
  "Campi-Sancy" => array( 
      'title' => 'Campi-Sancy', 
      'description' => "malle avec table à rallonge + couchette", 
      'pdf_url' => "/fiches/FT9-COS.pdf", 
      'price' => '1777',
      'configs' => array(
        '1' => array( 'photo_href' => 'couchette-0462.jpg', 'photo_src' => 'couchette-0462.jpg')
      )),
  "Campi-Lioran" => array( 
      'title' => 'Campi-Lioran', 
      'description' => "malle équipée avec table à rallonge", 
      'pdf_url' => "/fiches/FT-Campi-Lioran.pdf", 
      'price' => '2096',
      'configs' => array(
        '1' => array( 'photo_href' => 'rallonge-0455.jpg',  'photo_src' => 'rallonge-0455.jpg' ),
        '2' => array( 'photo_href' => 'tablette-0431.jpg',  'photo_src' => 'tablette-0431.jpg' ),
        '3' => array( 'photo_href' => '3-tiroirs-0094.jpg', 'photo_src' => '3-tiroirs-0094.jpg' ),
        '4' => array( 'photo_href' => 'rangement-0421.jpg', 'photo_src' => 'rangement-0421.jpg' )
      )),
  "Campi-Val-d-Allier" => array( 
      'title' => 'Campi-Val d’Allier', 
      'description' => "malle équipée avec table à rallonge + couchette", 
      'pdf_url' => "/fiches/FT-Campi-Val-Allier.pdf", 
      'price' => '2791',
      'configs' => array(
        '1' => array( 'photo_href' => 'couchette-0462.jpg', 'photo_src' => 'couchette-0462.jpg' ),
        '2' => array( 'photo_href' => 'tablette-0431.jpg',  'photo_src' => 'tablette-0431.jpg' ),
        '3' => array( 'photo_href' => '3-tiroirs-0094.jpg', 'photo_src' => '3-tiroirs-0094.jpg' ),
        '4' => array( 'photo_href' => 'rangement-0421.jpg', 'photo_src' => 'rangement-0421.jpg' )
      ))
);


$options = array(
  //"1" => array( 
      //'title' => 'Réchaud gaz 2 feux', 
      //'description' => "", 
      //'pdf_url' => "/fiches/FT-Rechaud.pdf", 
      //'price' => '60',
      //'photo' => array( 'photo_href' => '8-PAR-0414.jpg?1368086951', 'photo_src' => '8-PAR-0414.jpg?1368086951')
      //),
  "2" => array( 
      'title' => 'Rallonge de pied de table pour véhicules 4X4', 
      'description' => "", 
      'pdf_url' => "/fiches/RPT5.pdf", 
      'price' => '24,00',
      'photo' => array( 'photo_href' => '9-RPT5-0449.jpg', 'photo_src' => '9-RPT5-0449.jpg')
      ),
  "3" => array( 
      'title' => 'Chariot de transport', 
      'description' => "", 
      'pdf_url' => "/fiches/CHT.pdf", 
      'price' => '118,00',
      'photo' => array( 'photo_href' => '10-CHT-Detail-Roulette-et-Fermeture.jpg', 'photo_src' => '10-CHT-Detail-Roulette-et-Fermeture.jpg')
      ),
  "4" => array( 
      'title' => 'Décor vertical en ronce de noyer véritable', 
      'description' => "", 
      'pdf_url' => "/fiches/Decor-vertical.pdf", 
      'price' => '87,00',
      'photo' => array( 'photo_href' => '11-Decor-vertical.jpg', 'photo_src' => '11-Decor-vertical.jpg')
      ),
  "5" => array( 
      'title' => 'Décor oblique en ronce de noyer véritable', 
      'description' => "", 
      'pdf_url' => "/fiches/Decor-oblique.pdf", 
      'price' => '142,00',
      'photo' => array( 'photo_href' => '12-Decor-oblique.jpg', 'photo_src' => '12-Decor-oblique.jpg')
      ),
);

$modules = array(
  "1" => array( 
      'title' => 'Module cuisine', 
      'description' => "<small>(réchaud en vente dans les Équipements complémentaires)</small>", 
      'pdf_url' => "/fiches/MOCSU.pdf", 
      'price' => '297,00',
      'photo' => array( 'photo_href' => '2-MOCSU-0429.jpg', 'photo_src' => '2-MOCSU-0429.jpg')
      ),
  "2" => array( 
      'title' => 'Module 3 tiroirs', 
      'description' => "", 
      'pdf_url' => "/fiches/FT-Module-3-tiroirs.pdf", 
      'price' => '318,00',
      'photo' => array( 'photo_href' => '3-tiroirs-0094.jpg', 'photo_src' => '3-tiroirs-0094.jpg')
      ),
  "3" => array( 
      'title' => 'Module 2 tiroirs', 
      'description' => "", 
      'pdf_url' => "/fiches/FT-Module-2-tiroirs.pdf", 
      'price' => '249,00',
      'photo' => array( 'photo_href' => '2-tiroirs-0094.jpg', 'photo_src' => '2-tiroirs-0094.jpg')
      ),
  "4" => array( 
      'title' => 'Module rangement', 
      'description' => "", 
      'pdf_url' => "/fiches/6-MORAU-0421.jpg", 
      'price' => '399,00',
      'photo' => array( 'photo_href' => 'rangement-0421.jpg', 'photo_src' => 'rangement-0421.jpg')
      ),
  "5" => array( 
      'title' => 'Module couchette à fixer sur la malle', 
      'description' => "", 
      'pdf_url' => "/fiches/FT9-COS.pdf", 
      'price' => '695,00',
      'photo' => array( 'photo_href' => 'couchette-0462.jpg', 'photo_src' => 'couchette-0462.jpg')
      ),

);

$complements = array(
  "Pôle cuisine" => array( 
    "1" => array( 
        'pack' => true,
        'title' => "Pack complet cuisine", 
        'description' => "(1 réchaud + 1 glacière élect. + 2 jerrycans de 5 litres + 1 de 10 litres)", 
        'pdf_url' => "/fiches/PACK-COMPLET-CUISINE.pdf", 
        'price' => '162,90',
        'photo' => array( 'photo_href' => 'clef-en-main', 'photo_src' => 'clef-en-main')
        ),
    "2" => array( 
        'pack' => false,
        'title' => "Réchaud gaz 2 feux", 
        'description' => "", 
        'pdf_url' => "/fiches/FT0-Rechaud-Camping-gaz.pdf", 
        'price' => '39,90',
        'photo' => array( 'photo_href' => '8-PAR-0414.jpg', 'photo_src' => '8-PAR-0414.jpg')
        ),
    "3" => array( 
        'pack' => false,
        'title' => "Glacière ordinaire 28 litres", 
        'description' => "", 
        'pdf_url' => "/fiches/FT1-glaciere-28-l.pdf", 
        'price' => '74,90',
        'photo' => array( 'photo_href' => 'ax-glaciere-ordinaire.jpg', 'photo_src' => 'ax-glaciere-ordinaire.jpg')
        ),
    "4" => array( 
        'pack' => false,
        'title' => "Glacière ordinaire 26 litres", 
        'description' => "", 
        'pdf_url' => "/fiches/FT1-glaciere-electrique-26-l.pdf", 
        'price' => '70,00',
        'photo' => array( 'photo_href' => 'ab-glaciere.jpg', 'photo_src' => 'ab-glaciere.jpg')
        ),
    "5" => array( 
        'pack' => false,
        'title' => "Jerrycan d'eau 5 litres", 
        'description' => "", 
        'pdf_url' => "/fiches/FT2-Jerrycan.pdf", 
        'price' => '7,50',
        'photo' => array( 'photo_href' => 'ac-Jerrycan.jpg', 'photo_src' => 'ac-Jerrycan.jpg')
        ),
    "6" => array( 
        'pack' => false,
        'title' => "Jerrycan d'eau 10 litres", 
        'description' => "", 
        'pdf_url' => "/fiches/FT2-Jerrycan.pdf", 
        'price' => '8,90',
        'photo' => array( 'photo_href' => 'ac-Jerrycan.jpg', 'photo_src' => 'ac-Jerrycan.jpg')
        )
  ),
  "Pôle repas" => array( 
    "1" => array( 
        'pack' => true,
        'title' => "Pack complet repas ", 
        'description' => "(2 chaises + 2 tabourets + 1 lanterne)", 
        'pdf_url' => "/fiches/PACK-COMPLET-REPAS.pdf", 
        'price' => '96,60',
        'photo' => array( 'photo_href' => 'clef-en-main', 'photo_src' => 'clef-en-main')
        ),
    "2" => array( 
        'pack' => false,
        'title' => "Table valise avec 4 tabourets", 
        'description' => "", 
        'pdf_url' => "/fiches/FT3-Table-valise-avec-ses-4-tabourets.pdf", 
        'price' => '75,00',
        'photo' => array( 'photo_href' => 'ad-Table.jpg', 'photo_src' => 'ad-Table.jpg')
        ),
    "3" => array( 
        'pack' => false,
        'title' => "Chaise", 
        'description' => "", 
        'pdf_url' => "/fiches/FT4-Chaise-Eco.pdf", 
        'price' => '18,90',
        'photo' => array( 'photo_href' => 'ae-Chaise.jpg', 'photo_src' => 'ae-Chaise.jpg')
        ),
    "4" => array( 
        'pack' => false,
        'title' => "Tabouret à 3 pieds", 
        'description' => "", 
        'pdf_url' => "/fiches/FT5-Tabouret-a-3-pieds.pdf", 
        'price' => '9,90',
        'photo' => array( 'photo_href' => 'af-Tabouret.jpg', 'photo_src' => 'af-Tabouret.jpg')
        ),
    "5" => array( 
        'pack' => false,
        'title' => "Lanterne", 
        'description' => "", 
        'pdf_url' => "/fiches/FT6-Lanterne-rechargeable.pdf", 
        'price' => '39,00',
        'photo' => array( 'photo_href' => 'ag-Lanterne.jpg', 'photo_src' => 'ag-Lanterne.jpg')
        ),
  ),
  "Pôle couchage" => array( 
    "1" => array( 
        'pack' => true,
        'title' => "Pack complet couchage 2 personnes", 
        'description' => "(2 matelas + 2 sacs de couchage jumelables + 2 oreillers + 1 drap 2 P)", 
        'pdf_url' => "/fiches/PACK-COMPLET-COUCHAGE.pdf", 
        'price' => '396,70',
        'photo' => array( 'photo_href' => 'clef-en-main', 'photo_src' => 'clef-en-main')
        ),
    "2" => array( 
        'pack' => false,
        'title' => "Matelas auto-gonflant", 
        'description' => "", 
        'pdf_url' => "/fiches/FT7-Matelas-autogonflant.pdf", 
        'price' => '89,00',
        'photo' => array( 'photo_href' => 'ah-Matelas.jpg', 'photo_src' => 'ah-Matelas.jpg')
        ),
    "3" => array( 
        'pack' => false,
        'title' => "Sac de couchage jumelables", 
        'description' => "", 
        'pdf_url' => "/fiches/FT8-Sac-de-couchage.pdf", 
        'price' => '64,50',
        'photo' => array( 'photo_href' => 'ai-Sac-de-couchage.jpg', 'photo_src' => 'ai-Sac-de-couchage.jpg')
        ),
    "4" => array( 
        'pack' => false,
        'title' => "Oreiller", 
        'description' => "", 
        'pdf_url' => "/fiches/FT9-Oreiller-compressible.pdf", 
        'price' => '19,90',
        'photo' => array( 'photo_href' => 'aj-Oreiller.jpg', 'photo_src' => 'aj-Oreiller.jpg')
        ),
    "5" => array( 
        'pack' => false,
        'title' => "Drap pour sac de couchage 1P", 
        'description' => "", 
        'pdf_url' => "/fiches/FT10-Drap-pour-sac-de-couchage.pdf", 
        'price' => '24,30',
        'photo' => array( 'photo_href' => 'ak-Drap-1-pers.jpg', 'photo_src' => 'ak-Drap-1-pers.jpg')
        ),
    "6" => array( 
        'pack' => false,
        'title' => "Drap pour sac de couchage 2P", 
        'description' => "", 
        'pdf_url' => "/fiches/FT10-Drap-pour-sac-de-couchage.pdf", 
        'price' => '49,90',
        'photo' => array( 'photo_href' => 'al-Drap-2-pers.jpg', 'photo_src' => 'al-Drap-2-pers.jpg')
        ),
  ),
  "Divers" => array( 
    "1" => array( 
        'pack' => true,
        'title' => "Pack complet protection pluie/soleil", 
        'description' => "", 
        'pdf_url' => "/fiches/FT12-Protection-pluie-soleil-le-pack-complet", 
        'price' => '166,90',
        'photo' => array( 'photo_href' => 'clef-en-main', 'photo_src' => 'clef-en-main')
        ),
    "2" => array( 
        'pack' => false,
        'title' => "Protection pluie/soleil, le tarp seul", 
        'description' => "", 
        'pdf_url' => "/fiches/FT11-Toile-de-protection-pluie-soleil-Tarp.pdf", 
        'price' => '82,00',
        'photo' => array( 'photo_href' => 'am-Toile-protection-seule.jpg', 'photo_src' => 'am-Toile-protection-seule.jpg')
        ),
    "3" => array( 
        'pack' => false,
        'title' => "Auvent indépendant", 
        'description' => "", 
        'pdf_url' => "/fiches/FT18-Auvent-Independant.pdf", 
        'price' => '389,00',
        'photo' => array( 'photo_href' => 'an-Auvent-independant.jpg', 'photo_src' => 'an-Auvent-independant.jpg')
        ),
    "4" => array( 
        'pack' => false,
        'title' => "Auvent indépendant avec véranda", 
        'description' => "", 
        'pdf_url' => "/fiches/FT19-Auvent-Independant-avec-veranda.pdf", 
        'price' => '429,00',
        'photo' => array( 'photo_href' => 'ao-Auvent-avec-veranda.jpg', 'photo_src' => 'ao-Auvent-avec-veranda.jpg')
        ),
    "5" => array( 
        'pack' => false,
        'title' => "Imperméabilisant pour tente", 
        'description' => "", 
        'pdf_url' => "/fiches/FT19-Auvent-Independant-avec-veranda.pdf", 
        'price' => '19,90',
        'photo' => array( 'photo_href' => 'ap-Impermeabilisant.jpg', 'photo_src' => 'ap-Impermeabilisant.jpg')
        ),
    "6" => array( 
        'pack' => false,
        'title' => "Douche mobile 12 V", 
        'description' => "", 
        'pdf_url' => "/fiches/FT20-Douche-mobile-12V.pdf", 
        'price' => '79,00',
        'photo' => array( 'photo_href' => 'aq-Douche-mobile.jpg', 'photo_src' => 'aq-Douche-mobile.jpg')
        ),
    "7" => array( 
        'pack' => false,
        'title' => "Cabine de douche “Girafe”", 
        'description' => "", 
        'pdf_url' => "/fiches/FT21-Cabine-de-douche-Girafe.pdf", 
        'price' => '90,00',
        'photo' => array( 'photo_href' => 'ar-Cabine-de-douche.jpg', 'photo_src' => 'ar-Cabine-de-douche.jpg')
        ),
    "8" => array( 
        'pack' => false,
        'title' => "Malle de rangement souple aux dimensions du Campinambulle", 
        'description' => "", 
        'pdf_url' => "/fiches/FT13-Malle-de-rangement-souple.pdf", 
        'price' => '47,00',
        'photo' => array( 'photo_href' => 'as-Malle-souple.jpg', 'photo_src' => 'as-Malle-souple.jpg')
        ),
    "9" => array( 
        'pack' => false,
        'title' => "Chargeur solaire portable", 
        'description' => "", 
        'pdf_url' => "/fiches/FT14-Chargeur-solaire-portable.pdf", 
        'price' => '149,00',
        'photo' => array( 'photo_href' => 'at-Chargeur-solaire.jpg', 'photo_src' => 'at-Chargeur-solaire.jpg')
        ),
    "10" => array( 
        'pack' => false,
        'title' => "Pelle américaine pliable", 
        'description' => "", 
        'pdf_url' => "/fiches/FT15-Pelle-americaine-pliable.pdf", 
        'price' => '59,00',
        'photo' => array( 'photo_href' => 'au-Pelle-americaine.jpg', 'photo_src' => 'au-Pelle-americaine.jpg')
        ),
    "11" => array( 
        'pack' => false,
        'title' => "WC chimique", 
        'description' => "", 
        'pdf_url' => "/fiches/FT16-WC-chimiques.pdf", 
        'price' => '79,90',
        'photo' => array( 'photo_href' => 'av-WC-chimique.jpg', 'photo_src' => 'av-WC-chimique.jpg')
        ),
    "12" => array( 
        'pack' => false,
        'title' => "Désinfectant pour WC chimique", 
        'description' => "", 
        'pdf_url' => "/fiches/FT16-WC-chimiques.pdf", 
        'price' => '19,90',
        'photo' => array( 'photo_href' => 'aw-Desinfectant.jpg', 'photo_src' => 'aw-Desinfectant.jpg')
        ),
  ),

);
?>

      <div class="spaceT40">
        <div class="page-header">
          <h2>MALLE DE VOYAGE, MODÈLE "CUISINE-CAR®"</h2>
        </div>
        <?php foreach ($modeles as $model) { ?>

          <div class="row product_row">
            <div class="span10 spaceT40">
              <label class="checkbox">
                <input name="malle" type="checkbox" data-title="<?php echo $model['title'] ?>" data-price="<?php echo stringNumberToFloat($model['price']) ?>" >
                <input name="<?php echo slugify($model['title']) ?>-quantity" type="hidden"  value="1" class='quantity'>
                <?php echo $model['title'] ?> <span class="ref"><?php echo $model['description'] ?></span>
              </label>
              <div class="spaceT10 spaceL20 configs">
              <?php $configs_size = count($model['configs']); ?>
              <?php $config_i = 0 ?>
                <?php foreach ($model['configs'] as $config) { ?>
                  <?php $config_i++ ?>
                    <a class="fancybox  thumbnail" href="/configurateur/img/thumbs-big/<?php echo $config['photo_href'] ?>">
                      <img src="/configurateur/img/thumbs/<?php echo $config['photo_src'] ?>" />
                    </a>
                  <?php if($config_i != $configs_size){ echo '<span class="plus">+</span>'; } ?>
                <?php } ?>
              </div>
              <div class="spaceT10 spaceL20">
                <a href="<?php echo $model['pdf_url'] ?>" target="_blank">Télécharger fiche technique PDF</a>
              </div>
            </div>
            <div class="span2 right prix spaceT60">
              <?php echo $model['price'] ?> € TTC
            </div>
          </div>

        <?php } ?>
      </div>




      <div class="spaceT40">
        <div class="page-header">
          <h2>Options</h2>
        </div>


        <div class="row spaceT25">
          <?php $option_i = 5 ?>
          <?php foreach ($options as $option) { ?>

            <div class="span3  product_row spaceB35">
              <div class="wrapper">
                <h4><?php echo $option['title'] ?></h4>
                <a class="fancybox thumbnail" href="/configurateur/img/thumbs-big/<?php echo $option['photo']['photo_href'] ?>">
                  <img src="/configurateur/img/thumbs/<?php echo $option['photo']['photo_src'] ?>" />
                </a>
                <div class="spaceT10">
                  <a href="fiches/<?php echo $option['pdf_url'] ?>" target="_blank">Télécharger fiche technique PDF</a>
                </div>
                <label class="checkbox">
                  <input name="<?php echo slugify($option['title']) ?>" type="checkbox" data-title="<?php echo $option['title'] ?>" data-price="<?php echo stringNumberToFloat($option['price']) ?>"> 
                  <input name="<?php echo slugify($option['title']) ?>-quantity" type="hidden"  value="1" class='quantity'>
                  <?php echo $option['price'] ?> € TTC
                </label>
              </div>
            </div>
            <?php $option_i++ ?>
          <?php } ?>
        </div>
      </div>





      <div class="spaceT40">
        <div class="page-header">
          <h2>MODULES SEULS</h2>
          <p>Si vous possédez déjà une malle de voyage Campinambulle et que vous souhaitez la compléter avec nos différents modules, vous pouvez les choisir à l’unité dans cette rubrique.</p>
        </div>

        <div class="row spaceB35">
          <?php $module_i = 1 ?>
          <?php foreach ($modules as $module) { ?>

            <div class="span3 product_row spaceT35">
              <div class="wrapper">
                <h4><?php echo $module['title'] ?></h4>
                <a class="fancybox thumbnail" href="/configurateur/img/thumbs-big/<?php echo $module['photo']['photo_href'] ?>">
                  <img src="/configurateur/img/thumbs/<?php echo $module['photo']['photo_src'] ?>" />
                </a>
                <p><?php echo $module['description'] ?></p>
                <div class="spaceT10">
                  <a href="fiches/<?php echo $module['pdf_url'] ?>" target="_blank">Télécharger fiche technique PDF</a>
                </div>
                <label class="checkbox">
                  <input name="<?php echo slugify($module['title']) ?>" type="checkbox" data-title="<?php echo $module['title'] ?>" data-price="<?php echo stringNumberToFloat($module['price']) ?>">
                  <input name="<?php echo slugify($module['title']) ?>-quantity" type="hidden"  value="1" class='quantity'>
                  <?php echo $module['price'] ?> € TTC
                </label>
              </div>
            </div>
            <?php if( $module_i % 4 == 0 ) { ?>
              <div class="clear"></div>
            <?php } ?>
            <?php $module_i++ ?>
          <?php } ?>
        </div>
      </div>







      <div class="spaceT40">
        <div class="page-header">
          <h2>EQUIPEMENTS COMPLÉMENTAIRES</h2>
          <p>Bénéficiez de notre expertise de “campinambullistes”. En collaboration avec nos principaux partenaires, nous avons sélectionné spécialement pour vous différents équipements qui compléteront votre malle de voyage. Nous avons mis l’accent sur la fonctionnalité, la qualité et la durabilité des produits que nous vous proposons. Alors faites nous confiance et laissez vous guider… </p>
        </div>


        <?php foreach ($complements as $section=>$value) { ?>
          <div class="page-header">
            <h3><?php echo $section ?></h3>
          </div>

          <div class="row spaceT25">
            <?php $complement_i = 1 ?>
            <?php foreach ($value as $complement) { ?>
              <div class="span3  product_row spaceB35">
                <div class="wrapper">
                  <h4><?php echo $complement['title'] ?></h4>
                  <a class="fancybox thumbnail" href="/configurateur/img/thumbs-big/<?php echo $complement['photo']['photo_href'] ?>">
                    <img src="/configurateur/img/thumbs/<?php echo $complement['photo']['photo_src'] ?>" />
                  </a>
                  <p><?php echo $complement['description'] ?></p>
                  <div class="spaceT10">
                    <a href="fiches/<?php echo $complement['pdf_url'] ?>" target="_blank">Télécharger fiche technique PDF</a>
                  </div>
                  <label class="checkbox">
                    <input name="<?php echo slugify($complement['title']) ?>" type="checkbox"  data-title="<?php echo $complement['title'] ?>" data-price="<?php echo stringNumberToFloat($complement['price']) ?>">
                    <input name="<?php echo slugify($complement['title']) ?>-quantity" type="number" min="1" value="1" class='quantity'>

                    <?php echo $complement['price'] ?> € TTC
                  </label>
                </div>
              </div>
              <?php if( $complement_i > 1 && ($complement_i % 4 == 0) ) { ?>
                <div class="clear"></div>
              <?php } ?>
              <?php $complement_i++ ?>
            <?php } ?>
          </div>
        <?php } ?>
      </div>




      <div class="spaceT40 prix-total right">
        Prix : <span></span> € TTC
      </div>
      

      <form class="form-horizontal" id="devis" action="contact/devis.php" method="POST">

        <div class="row">
          <div class="span1"></div>
          <div class="span11">
            <div class="spaceT40 control-group">
              <label class="control-label" for="nom">Nom <span class="required">*</span></label>
              <div class="controls">
                <input type="text" id="nom" name="nom" class="span3" />
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="prenom">Prénom</label>
              <div class="controls">
                <input type="text" id="prenom" name="prenom" class="span3" />
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="adresse">Adresse</label>
              <div class="controls">
                <input type="text" id="adresse" name="adresse" class="span7">
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="codepostal">Code Postal</label>
              <div class="controls">
                <input type="text" id="codepostal" name="codepostal" class="span3">
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="ville">Ville <span class="required">*</span></label>
              <div class="controls">
                <input type="text" id="ville" name="ville" class="span3">
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="courriel">Courriel <span class="required">*</span></label>
              <div class="controls">
                <input type="text" id="courriel" name="courriel" class="span3" />
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="telephone">Téléphone</label>
              <div class="controls">
                <input type="text" id="telephone" name="telephone" class="span3" />
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="amenagement">Aménagement <span class="required">*</span></label>
              <div class="controls">
                <textarea id="amenagement" name="amenagement" rows="7" class="span7"></textarea>
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="codepromo">Code promotionnel</label>
              <div class="controls">
                <input type="text" id="codepromo" name="codepromo" class="span3" />
              </div>
            </div>
            <div class="spaceT40 control-group">
              <label class="control-label" for="commentaires">Commentaires</label>
              <div class="controls">
                <textarea id="commentaires" name="commentaires" rows="7" class="span7"></textarea>
              </div>
            </div>
            <div class="spaceT25 control-group">
              <label class="control-label"></label>
              <div class="controls">
                <span class="required">* Informations indispensables</span>
              </div>
            </div>
          </div>
        </div>

        <div class="spaceT25 center submit">
          <span>Pour contacter Campinambulle, je clique sur</span> <input class="btn btn-large btn-success" type="submit" value="Envoyer">
        </div>

      </form>

      <div id="footer" class="spaceT40 spaceB25">
        Copyright © - Campinambulle.com - 2013 - <a href="../cgv" target="_blank">Mentions légales</a>
      </div>
    </div>

    <script>
      var Campinambulle = Campinambulle || {};
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/campinambulle.js?1370787794"></script>

    <script>
      $(document).ready(function() {
        Campinambulle.init();
      });
    </script>

    <script>
      var _gaq=[['_setAccount','UA-38019104-1'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>
