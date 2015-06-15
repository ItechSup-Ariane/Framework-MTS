<?php

namespace Itechsup\Form\Widget;

class CheckboxesWidget extends ChoiceWidget
{
    protected $type = 'checkboxes';

    protected $isMultipleChoice = true;

    /**
     * @var $values
     *  An array of selected values.
     */
    protected $values = array();

    /**
     * CheckboxesWidget Constructor
     *
     * @param $name string
     *   The HTML "name" attribute
     * @param $label string
     *   The text displayed by the Widget's label
     * @param $choices array
     *   An array of key-value pairs to use for the choice:
     *    - key is the data that will be used to process the form
     *    - value is the string that will be displayed to the user
     * @param $values array (optional)
     *   An array containing the selected options (or choices).
     *   The array values are the selected $options keys.
     * @param $attributes array (optional)
     *   An array containing the HTML attributes for the Widget, in a key-value pair fashion.
     */
    public function __construct($name, $label, Array $choices, $values = array(), $attributes = array())
    {
        parent::__construct($name, $label, $choices, $attributes = array());
        $this->choices = $choices;
        $this->values = $values;
    }


    /**
     * Returns the array of selected values.
     *
     * @return array
     *  The array of values.
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * Overrides Widget::getValue().
     *
     * Returns the output of getValues()
     *
     * @return array
     */
    public function getValue()
    {
        return $this->getValues();
    }

    /**
     * Overrides Widget::setValue() to allow passing an array of values.
     *
     * @param mixed $value
     *  The selected value. Can be a single value or an array of values.
     */
    public function setValue($value)
    {
        if (is_array($value)) {
            $this->values = $value;
        } else {
            $this->values = array($value);
        }
    }

    /**
     * Render a list of HTML checkboxes.
     *
     * Loop over the $choices and check for each one if it was selected,
     * so the attribute can be set accordingly.
     *
     * @return string
     *   The HTML output for the checkboxes.
     */
    public function renderChoices()
    {
        $output = '';
        foreach ($this->choices as $value => $label) {
            $choiceId = $this->name . '_' . $value; // unique identifier of the checkbox
            $name = $this->name . '[' . $value . ']';
            $output .= '<label for="' . $choiceId . '">';
            $output .= '<input type="checkbox" name="' . $name . '" value="' . $value . '" id="' . $choiceId . '" ';
            $output .= $this->renderAttributes();

            if (in_array($value, $this->values)) {
                $output .= 'checked="checked" ';
            }
            $output .= '/>' . $label . '</label>';
        }
        return $output;
    }

    public function render()
    {
        $html = '<fieldset id="' . $this->getAttribute('id') . '">';
        $html .= $this->renderChoices();
        $html .= '</fieldset>';
        return $this->wrap($html);
    }
}
