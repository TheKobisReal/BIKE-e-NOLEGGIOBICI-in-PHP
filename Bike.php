
<?php
class Bike {
    private $matricola;
    private $misura;
    private $tipo;
    private $oraInizioNoleggio;
    private $costoPerOra = array(
        "passeggio" => 5,
        "mountain-bike" => 7,
        "corsa" => 8
    );

    public function __construct($tipo, $misura) {
        $this->tipo = $tipo;
        $this->misura = $misura;
    }

    public function getMatricola() {
        return $this->matricola;
    }

    public function setMatricola($matricola) {
        $this->matricola = $matricola;
    }

    public function getMisura() {
        return $this->misura;
    }

    public function setMisura($misura) {
        $this->misura = $misura;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getOraInizioNoleggio() {
        return $this->oraInizioNoleggio;
    }

    public function setOraInizioNoleggio($oraInizioNoleggio) {
        $this->oraInizioNoleggio = $oraInizioNoleggio;
    }

    public function toString() {
        return "Matricola: " . $this->matricola .
            ", Misura: " . $this->misura .
            ", Tipo: " . $this->tipo .
            ", Ora di inizio noleggio: " . $this->oraInizioNoleggio;
    }

    public function calcolaImportoNoleggio($oraFineNoleggio) {
        $durataNoleggio = strtotime($oraFineNoleggio) - strtotime($this->oraInizioNoleggio);
        $importo = ($durataNoleggio / 3600) * $this->costoPerOra[$this->tipo];
        return $importo;
    }
}

