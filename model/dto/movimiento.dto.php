<?php
    class Movimiento{
        /*=================================================== ATRIBUTOS ===================================================*/
        private $tipMov;
        private $valorTotal;
        private $totalUnidades;
        private $fechaMov;


        /*===================== LAS FUNNCIONES TIPO GET PERMITEN VISUALIZAR LOS DATOS DE SER REQUERIDOS =====================*/
        
        public function getTipMov(){
            return $this -> tipMov;
        }
        public function getValorTotal(){
            return $this -> valorTotal;
        }
        public function getTotalUnidades(){
            return $this -> totalUnidades;
        }
        public function getFechaMov(){
            return $this -> fechaMov;
        }

        /*=============================== LAS FUNNCIONES TIPO SET PERMITEN CAPTURAR LOS DATOS ===============================*/
        
        public function setTipMov($tipMov){
            $this -> tipMov = $tipMov;
        }
        public function setValorTotal($valorTotal){
            $this -> valorTotal = $valorTotal;
        }
        public function setTotalUnidades($totalUnidades){
            $this -> totalUnidades = $totalUnidades;
        }
        public function setFechaMov($fechaMov){
            $this -> fechaMov = $fechaMov;
        }
    }
?>