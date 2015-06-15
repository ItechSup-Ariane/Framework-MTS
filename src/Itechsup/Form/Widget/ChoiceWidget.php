<?php

namespace Itechsup\Form\Widget;

abstract class ChoiceWidget extends Widget
{

  /**
   * @var the choices that can be selected
   */
  protected $choices = array();

  /**
   * @var the chosen options (if any)
   */
  protected $selectedChoices = array();

  /**
   * Abstract constructor common to children
   *
   * @param $name string
   *   The HTML "name" attribute
   * @param $label string
   *   The text displayed by the Widget's label
   * @param $choices array
   *   An array of key-value pairs to use for the choice:
   *    - key is the data that will be used to process the form
   *    - value is the string that will be displayed to the user
   * @param $selectedChoices array (optional)
   *   An array containing the selected options (or choices).
   *   The array values are the selected $options keys.
   * @param $attributes array (optional)
   *   An array containing the HTML attributes for the Widget, in a key-value pair fashion.
   */
  public function __construct($name, $label, Array $choices, $selectedChoices = array(), $attributes = array())
  {
    parent::__construct($name, $label, $value = NULL, $attributes = array());
    $this->choices = $choices;
    $this->selectedChoices = $selectedChoices;
  }

  /**
   * Return the array of choices
   */
  public function getChoices()
  {
    return $this->choices;
  }

  /**
   * Set the array of available choices
   *
   * @param $value
   *  The array of available choices
   */
  public function setChoices($value)
  {
    $this->choices = $value;
  }
  /**
   * Return the array of selected choices
   */
  public function getSelectedChoices()
  {
    return $this->selectedChoices;
  }


}