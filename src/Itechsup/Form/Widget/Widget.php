<?php
/**
 * @file
 * Abstract parent class for any Widget class
 */

namespace Itechsup\Form\Widget;

abstract class Widget
{
    /**
     * @var the type of Widget.
     * Custom types can be implemented
     */
    protected $type;

    /**
     * @var the name attribute of the field
     */
    protected $name;

    /**
     * @var the value of the field
     */
    protected $value;

    /**
     * @var array the attributes (class, id, html attributes...)
     */
    protected $attributes = array();

    /**
     * @var the label of the widget
     */
    protected $label;

    /**
     * @param $name
     *  The name attribute of the widget
     * @param null $value
     *  (optional) The value
     * @param array $attributes
     *   (optional) An array of html attributes for the tag
     *
     * @throws InvalidArgumentException
     *   Thrown if the $type param was not (properly) implemented
     */
    public function __construct($name, $label, $value = null, $attributes = array())
    {
        $this->name = $name;
        $this->label = $label;
        $this->attributes = $attributes;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param $attribute string
     *  The attribute to look for
     *
     * @return mixed
     */
    public function getAttribute($attribute)
    {
        if (array_key_exists($attribute, $this->attributes)) {
            return $this->attributes[$attribute];
        }
        return null;
    }

    /**
     * Add an attribute in the $attributes array.
     *
     * @param $name
     *   The name of the attribute.
     * @param $value
     *   The value of the attribute.
     */
    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * Wraps a HTML element in a div with proper classes for styling.
     *
     * @param $widgetHtml
     *  The HTML of the widget
     *
     * @return string
     *  Widget HTML wrapped in a div
     */
    protected function wrap($widgetHtml)
    {
        $output = '<div class="form-widget form-widget-' . $this->type . '">';

        $output .= $this->renderLabel();

        $output .= $widgetHtml;
        $output .= '</div>';

        return $output;
    }

    /**
     * Method to return the label for a widget.
     *
     * @return string
     *   The HTML label for the widget.
     */
    public function renderLabel()
    {
        $output = '';
        if (!empty($this->label)) {
            $output .= '<label for="' . $this->getAttribute('id') . '">' . $this->label . '</label>';
        }
        return $output;
    }

    /**
     * Loops over the attributes array and builds the corresponding HTML string.
     * This method must be called after opening the HTML tag and before closing it.
     *
     * @return string
     *   The HTML string of key-value attribute pairs.
     */
    public function renderAttributes()
    {
        $output = ' ';
        if (!empty($this->attributes) && is_array($this->attributes)) {
            foreach ($this->attributes as $name => $value) {
                $output .= $name . '="' . $value . '" ';
            }
        }
        return $output;
    }
}