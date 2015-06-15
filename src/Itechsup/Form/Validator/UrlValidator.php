<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 20/04/15
 * Time: 14:32
 */

namespace Itechsup\Form\Validator;

class UrlValidator implements ValidatorInterface
{

    /**
     * Validate a URL string
     *
     * @param $value string
     *  The value to test against.
     *
     * @return bool
     *  Whether the value is a valid URL
     */
    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL);
    }
}
