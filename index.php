<?php

require_once 'autoload.php';

use \Itechsup\Form\Form;
use \Itechsup\Form\Widget\TextWidget;
use \Itechsup\Form\Widget\UrlWidget;
use \Itechsup\Form\Widget\PostcodeWidget;
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
$submitWidget = new SubmitWidget('submit', 'Envoyer');

$form->addWidget($firstnameWidget)
  ->addWidget($websiteWidget)
  ->addWidget($postcodeWidget)
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
<?php echo $form->render();?>
</body>
</html>