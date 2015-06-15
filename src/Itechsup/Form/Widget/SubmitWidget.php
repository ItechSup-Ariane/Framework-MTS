<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 11/05/15
 * Time: 14:24
 */

namespace Itechsup\Form\Widget;


class SubmitWidget extends Widget {
  protected $type = 'submit';

  /**
   * Overloads Widget constructor.
   *
   * Sets an empty label and a default value.
   */
  public function __construct($name, $value = 'Valider', $attributes = array())
  {
    $label = '';
    parent::__construct($name, $label, $value, $attributes);
  }

  /**
   * Builds an HTML input[type=submit].
   *
   * @return string
   *   The HTML for the submit input.
   */
  public function render()
  {
    $output = '<input type="' . $this->type . '" name="' . $this->name . '" value="' . $this->value;

    $output .= $this->renderAttributes();

    $output .= '"/>';

    return $output;
  }
}