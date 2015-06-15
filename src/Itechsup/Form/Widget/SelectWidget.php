<?php

namespace Itechsup\Form\Widget;

class SelectWidget extends ChoiceWidget
{
    protected $type = 'select';

    protected $isMultipleChoice = false;

    public function __construct($name, $label, Array $choices, $value = null, $attributes = array())
    {
        parent::__construct($name, $label, $value, $attributes = array());
        $this->choices = $choices;
        $this->selectedChoices = array();
    }

    /**
     * Render a list of HTML options.
     *
     * Loop over the $options and check for each one if it was selected,
     * so the attribute can be set accordingly.
     *
     * @return string
     *   The HTML output for the options.
     */
    public function renderOptions()
    {
        $output = '';

        foreach ($this->choices as $key => $value) {
            $output .= '<option value="' . $key . '" ';

            if ($key == $this->getValue()) {
                $output .= 'selected="selected" ';
            }
            $output .= '>' . $value;
            $output .= '</option>';
        }
        return $output;
    }


    public function render()
    {
        $html = '<select name="' . $this->getName() . '"';

        $html .= $this->renderAttributes() . '>';

        $html .= $this->renderOptions();

        $html .= '</select>';

        return $this->wrap($html);
    }
}
