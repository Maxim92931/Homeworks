<?php

namespace homework5;

error_reporting(E_ALL);
require_once "TransmissionAuto.php";
require_once "TransmissionManual.php";
require_once "Engine.php";

abstract class Car
{
    private $engine;
    private $transmision;
    private $currentDistance = 0;

    public function __construct()
    {
        $this->engine = new Engine(20);
        $transmissions = ['TransmissionAuto', 'TransmissionManual'];
        $transmission = 'homework5\\' . $transmissions[rand(0, 1)];
        $this->transmision = new $transmission();
    }

    public function move($distance, $speed, $direction)
    {
        echo 'Необходимо проехать ' . $distance . ' м. со скоростью ' . $speed . ' м/с ' . $direction;
        echo '<br>';

        $this->engine->onEngine();

        if ($speed > $this->engine->getMaxSpeed()) {
            $speed = $this->engine->getMaxSpeed();
            echo ' Скорость была сброшена до ' . $speed . ' м/с.';
        }

        $this->transmision->change($speed, $direction);

        $modulo = 0;
        while ($this->currentDistance < $distance) {
            flush();
            sleep(1);
            $this->currentDistance += $speed;
            $this->engine->addTemperature(intdiv(($speed + $modulo), 10));

            $modulo = ($speed + $modulo) % 10;
            echo ',  Автомобиль проехал: ' . $this->currentDistance;

            if ($this->engine->getTemperature() >= 90) {
                $this->engine->cool();
                $this->engine->cool();
                $this->engine->cool();
            }
        }

        echo '<br>';
        echo 'Приехали!';
        $this->transmision->offTransmission();
        $this->engine->offEngine();
    }
}