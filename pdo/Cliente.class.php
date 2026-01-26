<?php

    include('Conexion.class.php');
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

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
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->localidad = $localidad;
            $this->provincia = $provincia;
            $this->telefono = $telefono;
            $this->email = $email;
        }

        public function crear () {

            $con = Conexion::conectarDB();

            try {
                $stmt = $con->prepare('INSERT INTO cliente (dni, nombre, direccion, localidad, provincia, telefono, email)
                                      values (:dni, :nombre, :direccion, :localidad, :provincia, :telefono, :email )');
                
                $rows = $stmt->execute([
                    ':dni' => $this->dni,
                    ':nombre' => $this->nombre,
                    ':direccion' => $this->direccion,
                    ':localidad' => $this->localidad,
                    ':provincia' => $this->provincia,
                    ':telefono' => $this->telefono,
                    ':email' => $this->email
                ]);

                if ($rows == 1) { 
                    header('Location: index.php?mess=0');
                } else {
                    header('Location: index.php?error=1'); 
                }

            } catch (PDOException $e) {
                header('Location: index.php?error=0');
                return false;

            } finally {
                $con = Conexion::desconectarDB($con);
            }
        }

        public function editar () {

            $con = Conexion::conectarDB();

            try {
                $stmt = $con->prepare('
                    UPDATE cliente SET 
                        nombre = :nombre, 
                        direccion = :direccion, 
                        localidad = :localidad, 
                        provincia = :provincia, 
                        telefono = :telefono, 
                        email = :email)
                    WHERE dni = :dni'
                );

                $rows = $stmt->execute([
                    ':dni' => $this->dni,
                    ':nombre' => $this->nombre,
                    ':direccion' => $this->direccion,
                    ':localidad' => $this->localidad,
                    ':provincia' => $this->provincia,
                    ':telefono' => $this->telefono,
                    ':email' => $this->email
                ]);

                if ($rows > 0) { 
                    header('Location: index.php?mess=1');
                } else {
                    header('Location: index.php?error=2');
                }

            } catch (PDOException $e) {
                header('Location: index.php?error=0');
            } finally {
                $con = Conexion::desconectarDB($con);
            }
        }

        public function eliminar () {

            $con = Conexion::conectarDB();

            try {
                $stmt = $con->prepare('DELETE :dni FROM cliente');

                $rows = $stmt->execute([
                    ':dni' => $this->dni
                ]);

                if ($rows > 0) { 
                    header('Location: index.php?mess=2');
                } else {
                    header('Location: index.php?error=3');
                }

            } catch (PDOException $e) {
                header('Location: index.php?error=0');
            } finally {
                $con = Conexion::desconectarDB($con);
            }
        }

        public static function buscarPorId () {

            $con = Conexion::conectarDB();

            try {
                $stmt = $con->prepare('SELECT * FROM cliente WHERE dni = :dni');
                $stmt->execute(['dni' => ':dni']);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
                $rows = $stmt->fetch();

                if ($rows) { 
                    return $rows;
                } else {
                    return false;
                }

            } catch (PDOException $e) {
                header('Location: index.php?error=0');
                return false;

            } finally {
                $con = Conexion::desconectarDB($con);
            }      
        }

        public static function todos () {

            $con = Conexion::conectarDB();

            try {
                $stmt = $con->prepare('SELECT * FROM cliente');
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
                $rows = $stmt->fetchAll();

                if ($rows) { 
                    return $rows;
                } else {
                    return false;
                }

            } catch (PDOException $e) {
                return false;

            } finally {
                $con = Conexion::desconectarDB($con);
            }      
        }

        /* ---------------------- GETTERS y SETTERS ---------------------- */

        public function getDni() { return $this->dni; }
        public function setDni($dni) { $this->dni = $dni; }

        public function getNombre() { return $this->nombre; }
        public function setNombre($nombre) { $this->nombre = $nombre; }

        public function getDireccion() { return $this->direccion; }
        public function setDireccion($direccion) { $this->direccion = $direccion; }

        public function getLocalidad() { return $this->localidad; }
        public function setLocalidad($localidad) { $this->localidad = $localidad; }

        public function getProvincia() { return $this->provincia; }
        public function setProvincia($provincia) { $this->provincia = $provincia; }

        public function getTelefono() { return $this->telefono; }
        public function setTelefono($telefono) { $this->telefono = $telefono; }

        public function getEmail() { return $this->email; }
        public function setEmail($email) { $this->email = $email; }


    }

?>