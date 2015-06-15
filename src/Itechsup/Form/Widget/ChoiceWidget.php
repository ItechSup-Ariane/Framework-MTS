<?php

namespace Itechsup\Form\Widget;

abstract class ChoiceWidget extends Widget
{

    /**
     * @var array
     *  The choices that can be selected
     */
    protected $choices = array();

    /**
     * @var bool
     *  If multiple choices can be selected.
     */
    protected $isMultipleChoice = false;

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
     * @param $attributes array (optional)
     *   An array containing the HTML attributes for the Widget, in a key-value pair fashion.
     */
    public function __construct($name, $label, Array $choices, $attributes = array())
    {
        parent::__construct($name, $label, null, $attributes = array());
        $this->choices = $choices;
    }

    /**
     * Return the array of choices
     *
     * @return array
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * Loops over the attributes array and builds the corresponding HTML string.
     * This method must be called after opening the HTML tag and before closing it.
     * If the Widget allows multiple choices, then we skip the ID attribute
     *  to keep the HTML valid.
     *
     * @return string
     *   The HTML string of key-value attribute pairs.
     */
    public function renderAttributes()
    {
        $output = ' ';
        if (!empty($this->attributes) && is_array($this->attributes)) {
            foreach ($this->attributes as $name => $value) {
                if ($name == 'id' && $this->isMultipleChoice) {
                    continue;
                } else {
                    $output .= $name . '="' . $value . '" ';
                }
            }
        }
        return $output;
    }
}
