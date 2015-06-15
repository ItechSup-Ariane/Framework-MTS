<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 11/05/15
 * Time: 14:58
 */

namespace Itechsup\Form\Validator;


class SelectValidator implements ChoiceValidatorInterface
{

    /**
     * Validates a select value.
     *
     * @param $value
     *   The value to validate.
     *
     * @param $options
     *  The allowed options to validate the value against.
     *
     * @return bool
     *   Whether the value is valid (if it exists in the options list).
     */
    public function validate($value, $options)
    {
        return array_key_exists($value, $options);
    }
}
