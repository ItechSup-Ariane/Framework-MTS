<?php

namespace Itechsup\Form\Widget;

class SelectWidget extends ChoiceWidget
{
  protected $type = 'select';

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

    foreach ($this->options as $key => $value) {
      $output .= '<option value="' . $value . '" ';

      if (in_array($key, $this->selectedChoices)) {
        $output .= 'selected ';
      }
    }
    return $output;
  }


  public function render()
  {
    $html = '<select name="' . $this->name . '"';

    $html .= $this->renderAttributes() . '>';

    $html .= $this->renderOptions();

    $html .= '</select>';

    return $this->wrap($html);
  }
}