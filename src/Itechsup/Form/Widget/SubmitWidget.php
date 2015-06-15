<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 11/05/15
 * Time: 14:24
 */

namespace Itechsup\Form\Widget;


class SubmitWidget extends Widget
{
    protected $type = 'submit';

    /**
     * Overloads Widget constructor.
     *
     * Sets an empty label and a default value.
     *
     * @param $name
     *  The HTML element name attribute.
     * @param string $value (optional)
     *  The HTML element value attribute (the text displayed in the button)
     * @param array $attributes (optional)
     *  An array of HTML attributes for the tag
     * @param string $label (optional)
     *  The label for the input. Defaults to nothing
     */
    public function __construct($name, $value = 'Valider', $attributes = array(), $label = '')
    {
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
        $output = '<input type="' . $this->type . '" name="' . $this->getName() . '" value="' . $this->getValue();

        $output .= $this->renderAttributes();

        $output .= '"/>';

        return $output;
    }
}
