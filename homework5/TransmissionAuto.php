<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 27.09.17
 * Time: 23:36
 */

namespace homework5;

require_once "traitBack.php";


class TransmissionAuto
{
    Use Back;

    private $speed; //1 - езда вперед, 0 - езда назад, -1 - выключена

    public function change($speed, $direction)
    {
        echo '<br>';
        echo 'Автоматическая коробка передач: ';

        if ($direction == 'назад') {
            Back::back('auto');
            return;
        }

        $this->speed = 1;

        echo 'включен режим езды вперед';

    }

    public function offTransmission()
    {
        $this->speed = -1;
    }

}