<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 20/04/15
 * Time: 14:27
 */

namespace Itechsup\Form\Widget;

class UrlWidget extends TextWidget
{

  protected $type = 'url';

  public function __construct($name, $label, $value = NULL, $attributes = array())
  {
    return parent::__construct($name, $label, $value, $attributes);
  }
}