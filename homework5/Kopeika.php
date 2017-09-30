<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 27.09.17
 * Time: 23:31
 */

namespace homework5;

require_once 'Car.php';

class Kopeika extends Car
{
    public function move($distance, $speed, $direction)
    {
        parent::move($distance, $speed, $direction);
    }
}