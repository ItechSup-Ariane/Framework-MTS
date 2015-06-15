<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 20/04/15
 * Time: 14:26
 */

namespace Itechsup\Form\Widget;

class TextWidget extends Widget
{

	protected $type = 'text';

	public function __construct($name, $label, $value = null, $attributes = array()) {
		return parent::__construct($name, $label, $value, $attributes);
	}

	/**
	 * Render a Widget as a HTML element
	 *
	 * @return HTML for the widget, wrapped by $this->wrap()
	 */
	public function render() {
		$html = '<input type="' . $this->type . '" name="' . $this->name . '"';

		if (!empty($this->value)) {
			$html .= ' value="' . $this->value . '"';
		}

    $html .= $this->renderAttributes();

    $html .= '/>';

		return $this->wrap($html);
	}
}