<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 11/05/15
 * Time: 14:58
 */

namespace Itechsup\Form\Validator;


class TextValidator implements ValidatorInterface
{

    /**
     * Validates a string value.
     *
     * @param $value
     *   The value to validate.
     *
     * @return bool
     *   Whether the value is valid.
     */
    public function validate($value)
    {
        return is_string($value);
    }
}
