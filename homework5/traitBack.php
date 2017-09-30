<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 28.09.17
 * Time: 21:45
 */

namespace homework5;


trait Back
{
    public static function back($transmission) {
        if ($transmission == 'auto') {
            echo 'включен режим езды назад';
        } else {
            echo 'включена задняя передача';
        }
    }
}