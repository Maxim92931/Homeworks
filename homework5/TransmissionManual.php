<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 27.09.17
 * Time: 23:37
 */

namespace homework5;

require_once "traitBack.php";


class TransmissionManual
{
    Use Back;

    private $speed; //1 - 1 скорость, 2 - скорость, 0 - езда назад, -1 - выключена


    public function change($speed, $direction)
    {
        echo '<br>';
        echo 'Ручная коробка передач: ';

        if ($direction == 'назад') {
            Back::back('manual');
            return;
        }

        $this->speed = $speed > 20 ? 2 : 1;

        switch ($this->speed) {
            case 0:
                echo 'включена задняя передача';
                break;
            case 1:
                echo "включена скорость №1";
                break;
            case 2:
                echo "включена скорость №2";
                break;
        }
    }

    public function offTransmission()
    {
        $this->speed = -1;
        echo '<br>';
        echo 'Передача выключена';
    }
}