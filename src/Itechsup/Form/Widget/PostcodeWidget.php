<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 11/05/15
 * Time: 15:05
 */

namespace Itechsup\Form\Widget;


class PostcodeWidget extends TextWidget
{

    /**
     * @return string
     *  The HTML for the widget.
     */
    public function render()
    {
        $this->setAttribute('pattern', '([A-Z]+[A-Z]?\-)?[0-9]{1,2} ?[0-9]{3}');
        return parent::render();
    }
}
