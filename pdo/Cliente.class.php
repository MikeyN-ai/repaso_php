<?php 

    class Cliente {
        
        private $dni;
        private $nombre;
        private $direccion;
        private $localidad;
        private $provincia;
        private $telefono;
        private $email;

        function __construct ($dni = null, $nombre = null, $direccion = null, $localidad = null, 
        $provincia = null, $telefono= null, $email= null ) {
            $this->dni = $dni;
            $this->$nombre = $nombre;
            $this->$direccion = $direccion;
            $this->$localidad = $localidad;
            $this->$provincia = $provincia;
            $this->$telefono = $telefono;
            $this->$email = $email;
        }

        public function crear () {

        }

        public function editar () {
            
        }

        public function eliminar () {
        
        }

        public function buscarPorId () {
            
        }

        public function todos () {
            
        }
    }

?>