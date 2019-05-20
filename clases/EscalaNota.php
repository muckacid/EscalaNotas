<?php
    class EscalaNota
    {
        private $nAp;            //Nota de aprovacion
        private $punMin;         //Puntaje Minimo
        private $punMax;         //Puntaje Maximo
        private $nMin;           //Nota Minima
        private $nMax;           //Nota Maxima
        private $porcExigencia;  //Porcentaje de Aprovacion
        private $punAprovacion;  //Puntaje de Aprovacion
        private $incremento;     //Incremento en la escala

        public function __construct($notaMinima,  $notaMaxima, $punMax, $porEx, $notaAprovacion, $incremento)
        {
            $this->nAp = $notaAprovacion;
            $this->punMin = 0;
            $this->punMax = $punMax;
            $this->nMin = $notaMinima;
            $this->nMax = $notaMaxima;
            $this->porcExigencia = $porEx; //paso el porcentaje a decimal
            $this->punAprovacion = $this->punMax * ($this->porcExigencia/100);
            $this->incremento = $incremento;
        }

        public function obtenerEscala()
        {
            $data = array();
            $index = 0;
            for ($i = 0; $i <= $this->punMax; $i = $i + $this->incremento) 
            {
                if ($i == 0){
                    $data[$index] = array("0" => "1");
                }
                else{
                    $data[$index] = array("$i" => $this->calcularNota($i));
                }
                $index = $index + 1;            
            }
            return $data;
        }

        public function calcularNota($puntajeObtenido)
        {
            if($puntajeObtenido < $this->punAprovacion){//Aprovo
                $pendienteReprovados = ($this->nAp - $this->nMin)/($this->punAprovacion - $this->punMin);
                $nota = $pendienteReprovados*($puntajeObtenido - $this->punMin) + $this->nMin;
            }
            else{                                       //Reprovo
                $pendienteAprovados = ($this->nMax -$this->nAp)/($this->punMax - $this->punAprovacion);
                $nota = $pendienteAprovados*($puntajeObtenido - $this->punAprovacion) + $this->nAp;
            }
            return $nota;
        }
    }
?>