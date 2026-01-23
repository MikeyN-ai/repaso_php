<?php 
    class Conexion {

        private $con;

        public static function conectarDB () {
            try {
                $con = new PDO ('mysql:host=localhost;dbname=pdo-examen', 'root', 'Nova1234!');
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $con;
            } catch (PDOException $e) {
                header('Location: conexionerror.php');
                exit;
            }
        }

        public static function desconectarDB (&$con) {
            $con = null;
        }
    }
?>