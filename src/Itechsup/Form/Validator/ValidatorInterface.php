<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 20/04/15
 * Time: 14:28
 */

namespace Itechsup\Form\Validator;


interface ValidatorInterface
{
  public function validate($field);
}