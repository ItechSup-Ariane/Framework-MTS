<?php

require_once 'autoload.php';

use \Itechsup\Form\Form;
use \Itechsup\Form\Widget\TextWidget;
use \Itechsup\Form\Widget\UrlWidget;
use \Itechsup\Form\Widget\PostcodeWidget;
use \Itechsup\Form\Widget\SelectWidget;
use \Itechsup\Form\Widget\CheckboxesWidget;
use \Itechsup\Form\Widget\SubmitWidget;
$form = new Form('test');

$firstnameWidget = new TextWidget('firstname', 'Prénom', null, array(
    'id' => 'firstname',
    'class' => 'blabla',
));
$websiteWidget = new UrlWidget('website', 'Site Ouebe', null, array(
    'id' => 'website',
    'class' => 'bloblo',
));
$postcodeWidget = new PostcodeWidget('postcode', 'Code postal', null, array(
    'id' => 'postcode',
    'class' => 'blublu',
));
$ageRanges = array(
    '0-19 ans',
    '20-39 ans',
    '40-59 ans',
    '60-74 ans',
    '75 ans et plus',
);
$ageRangeWidget = new SelectWidget('age-range', 'Tranche d\'âge', $ageRanges, array(), array(
    'id' => 'age-range',
    'class' => 'large',
));
$hobbyChoices = array(
    'sports',
    'cinema',
    'arts',
    'informatique',
    'nature',
    'gastronomie',
);
$hobbyChoicesWidget = new CheckboxesWidget('hobbies', 'Centres d\'intérêts', $hobbyChoices, array(), array(
    'id' => 'hobbies',
    'class' => 'blah',
));

$submitWidget = new SubmitWidget('submit', 'Envoyer');

$form->addWidget($firstnameWidget)
    ->addWidget($websiteWidget)
    ->addWidget($postcodeWidget)
    ->addWidget($ageRangeWidget)
    ->addWidget($hobbyChoicesWidget)
    ->addWidget($submitWidget);

if (!empty($_POST) && isset($_POST)) {
    $form->bind($_POST);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php echo $form->render(); ?>
</body>
</html>