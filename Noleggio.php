<?php

class NoleggioBike
{
    private $mountainBike = [];
    private $corsa = [];
    private $passeggio = [];

    public function __construct($numMountainBike, $numCorsa, $numPasseggio)
    {
        for ($i = 0; $i < $numMountainBike; $i++) {
            $this->mountainBike[] = new Bike("mountain-bike", "media");
        }
        for ($i = 0; $i < $numCorsa; $i++) {
            $this->corsa[] = new Bike("corsa", "media");
        }
        for ($i = 0; $i < $numPasseggio; $i++) {
            $this->passeggio[] = new Bike("passeggio", "media");
        }
    }

    #A function that returns a array base on type
    public function getRastrelliera($tipo)
    {
        switch ($tipo) {
            case "mountain-bike":
                return $this->mountainBike;
            case "corsa":
                return $this->corsa;
            case "passeggio":
                return $this->passeggio;
            default:
                return null;
        }
    }

    public function getBike($tipo, $misura)
    {
        switch ($tipo) {
            case "mountain-bike":
                foreach ($this->mountainBike as $index => $bike) {
                    if ($bike !== null && $bike->getMisura() === $misura) {
                        $result = $this->mountainBike[$index];
                        $this->mountainBike[$index] = null;
                        return $result;
                    }
                }
                break;
            case "corsa":
                foreach ($this->corsa as $index => $bike) {
                    if ($bike !== null && $bike->getMisura() === $misura) {
                        $result = $this->corsa[$index];
                        $this->corsa[$index] = null;
                        return $result;
                    }
                }
                break;
            case "passeggio":
                foreach ($this->passeggio as $index => $bike) {
                    if ($bike !== null && $bike->getMisura() === $misura) {
                        $result = $this->passeggio[$index];
                        $this->passeggio[$index] = null;
                        return $result;
                    }
                }
                break;
            default:
                return null;
        }
        return null;
    }

    public function setBike($bike)
    {
        switch ($bike->getTipo()) {
            case "mountain-bike":
                foreach ($this->mountainBike as $index => $b) {
                    if ($b === null) {
                        $this->mountainBike[$index] = $bike;
                        return;
                    }
                }
                break;
            case "corsa":
                foreach ($this->corsa as $index => $b) {
                    if ($b === null) {
                        $this->corsa[$index] = $bike;
                        return;
                    }
                }
                break;
            case "passeggio":
                foreach ($this->passeggio as $index => $b) {
                    if ($b === null) {
                        $this->passeggio[$index] = $bike;
                        return;
                    }
                }
                break;
        }
    }

    public function getN($tipo)
    {
        switch ($tipo) {
            case "mountain-bike":
                return count($this->mountainBike);
            case "corsa":
                return count($this->corsa);
            case "passeggio":
                return count($this->passeggio);
        }
        return 0;
    }

    public function toString($tipo)
    {
        $rastrelliera = $this->getRastrelliera($tipo);
        $string = "Elenco biciclette di tipo $tipo: ";
        foreach ($rastrelliera as $bike) {
            if ($bike !== null) {
                $string .= $bike->toString() . ", ";
            }
        }
        return $string;
    }
}
