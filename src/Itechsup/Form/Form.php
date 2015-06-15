<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 27/04/15
 * Time: 14:09
 */

namespace Itechsup\Form;

class Form {

	/**
	 * @var the HTML id attribute used to process the form
	 */
	protected $id = '';

	/**
	 * @var the HTML method attribute corresponding to the HTTP method used to submit the form (GET or POST).
	 */
	protected $method = '';

	/**
	 * @var array The widgets container.
	 */
	protected $widgets = array();

	/**
	 * @var array Form validation errors.
	 */
	protected $errors = array();

  /**
   * @param $id
   *   The HTML id attribute (used to process the form)
   * @param string $method
   *   The HTML HTTP-method attribute (defaults to POST)
   * @throws InvalidArgumentException
   *   Thrown if the HTTP method is not valid (not POST nor GET)
   */
	public function __construct($id, $method = 'POST') {
		$this->id = $id;
		if (in_array($method, array('GET', 'POST'))) {
			$this->method = $method;
		} else {
			throw new \InvalidArgumentException($method . ' is not a valid method attribute for a HTML form. Please use either GET or POST.');
		}
	}

	/**
	 * Add a widget to the widgets container.
	 * @param $widget
	 *  Instance of a widget type.
	 * @return mixed
	 *   Return the instance to allow method chaining, or the exception message if the widget type is not valid.
	 */
	public function addWidget($widget) {
		$this->widgets[$widget->getName()] = $widget;
		return $this;
	}
	/**
	 * Build a HTML form by rendering each Widget.
	 *
	 * @return string
	 *  The HTML form.
	 */
	public function render() {
		$output = '<form id="' . $this->id . '" method="' . $this->method . '">' . "\n";

		if (!empty($this->widgets)) {
			foreach ($this->widgets as $widget) {
				$output .= $widget->render() . "\n";
			}
		}
		$output .= '</form>';

		return $output;
	}

  /**
   * @param array $input
   *   An array of key-value pairs containing the user input for the post.
   *   Each key must match with the post's widget name.
   */
	public function bind(Array $input) {
		foreach ($input as $name => $value) {
			if (array_key_exists($name, $this->widgets)) {
        // validation here
				$this->widgets[$name]->setValue($value);
			}
		}
	}

}