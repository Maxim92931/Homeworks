<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 27.09.17
 * Time: 23:25
 */

namespace homework5;


class Engine
{
    private $temperature;
    private $horsePower;
    private $maxSpeed;

    public function __construct($horsePower)
    {
        $this->horsePower = $horsePower;
        $this->maxSpeed = $horsePower * 2;
    }


    public function onEngine()
    {
        $this->temperature = 0;
        echo "Двигатель включен";
        echo '<br>';
        echo "Количество лошадиных сил: " . $this->horsePower . " макс. скорость: " . $this->horsePower * 2 . " м/с";
    }

    public function offEngine()
    {
        echo '<br>';
        echo 'Двигатель выключен';
        $this->temperature = 0;
    }

    public function cool()
    {
        $this->temperature -= 10;
        echo '<br>';
        echo 'Включен вентилятор, температура снижена до ' . $this->temperature;
    }

    public function addTemperature($temperature) {
        $this->temperature += $temperature * 5;
        echo '<br>';
        echo 'Температура двигателя: ' . $this->temperature;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function getMaxSpeed() {
        return $this->maxSpeed;
    }

}