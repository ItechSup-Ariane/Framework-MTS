<?php
/**
 * Created by PhpStorm.
 * User: michel
 * Date: 20/04/15
 * Time: 14:14
 */

namespace Itechsup;


abstract class Entity {

  public function __construct(Array $options = array()) {
    if (!empty($options)) {
      $this->hydrate($options);
    }
  }

  protected function hydrate($options = array()) {
    foreach ($options as $name => $value) {
      $setter = 'set' . ucfirst($name);
      if (method_exists(get_class($this), $setter)) {
        $this->$setter($value);
      }
    }
  }
}