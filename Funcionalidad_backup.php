<?php

    class Funcionalidad
    {
        private $conn;

		public function __construct()
		{
            //$this->conn = new BasedeDatos();
            /*try
            {
                $this->conn = BasedeDatos::iniciarDB();
            }catch(Exception $e)
            {
                die($e->conn = getMessage()); 
            }*/
		}

        public function getLogin($usuario)
        {
            $sql = "SELECT * FROM ALUMNOS WHERE CODIGO='$usuario'";
            $statement = $this->conn->query($sql);
            $rpta =  $statement->fetchAll();
            $datos = array();

            foreach($rpta as $row)
            {
                $datos[] = $row;
            }
            echo json_encode($datos);
        }

        public function getAlumnos($usuario)
        {
            $sql = "SELECT * FROM ALUMNOS WHERE CODIGO='$usuario'";
            $statement = $this->conn->query($sql);

			$fila = array();
            while($fila = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $alumnos[] = $fila;
            }
            echo json_encode($alumnos);
        }
        /* login administrador*/
        public function getvalidarUsuario($usu,$pas)
        {
            $sql = "SELECT USUARIO, PASS FROM CONTROL WHERE USUARIO='".$usu."' AND PASS='".$pas."'";
            $statement = $this->conn->query($sql);
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /* Agregar Programa*/
        public function setProgramas($programa)
        {
            $sql = "INSERT INTO PROGRAMAS (PROGRAMA) VALUES('".$programa."')";
            $statement = $this->conn->query($sql);
        }
        /* Mostrar todos los Programas*/
        public function getProgramas()
        {
            $sql = "SELECT * FROM PROGRAMAS";
            $statement = $this->conn->query($sql);
            return $statement->fetchAll();
        }
        /* Restringir duplicado de Programas*/
        public function getDiplicadoPrograma($pro)
        {
            $sql = "SELECT PROGRAMA FROM PROGRAMAS WHERE PROGRAMA='".$pro."'";
            $statement = $this->conn->query($sql);
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        /* Eliminar Programa*/
        public function setEliminarPrograma($programa)
        {
            $sql = "DELETE FROM PROGRAMAS WHERE PROGRAMA= '".$programa."'";
            $statement = $this->conn->query($sql);
        }
        /* Agregar alumnos a db*/
        public function setAlumnos($dni,$nombre,$apellido,$programa)
        {
            $sql = "INSERT INTO ALUMNOS (CODIGO,NOMBRE,APELLIDOS,PROGRAMA) VALUES('".$dni."','".$nombre."','".$apellido."','".$programa."')";
            $statement = $this->conn->query($sql);
        }
        /* Mostrar todos los alumnos */
        public function getDatosAlumnos()
        {
            $db = BasedeDatos::iniciarDB();
            $statement=$db->query("SELECT * FROM ALUMNOS ORDER BY APELLIDOS");
            return $statement->fetchAll();

            /*$statement = $this->conn->query($sql);
            return $statement->fetchAll();*/
        }
        /* Restringir duplicado de alumnos*/
        public function getDuplicadoAlumno($codigo)
        {
            $sql = "SELECT CODIGO FROM ALUMNOS WHERE CODIGO='".$codigo."'";
            $statement = $this->conn->query($sql);
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        /* Eliminar alumnos */
        public function setEliminarAlumnos($codigo)
        {
            $sql = "DELETE FROM ALUMNOS WHERE ID = '".$codigo."'";
            $statement = $this->conn->query($sql);
        }
        /* Buscar Alumnos por codigo */
        public function getAlumnos2($codigo)
        {
            $sql = "SELECT * FROM ALUMNOS WHERE ID = '".$codigo."'";
            $statement = $this->conn->query($sql);
            return $statement->fetchAll();
        }
        /* Actualizar Alumnos */
        public function setActualizarAlumnos($id,$codigo,$nombre,$apellidos,$programa)
        {
            $sql = "UPDATE ALUMNOS SET CODIGO = '".$codigo."', NOMBRE ='".$nombre."', APELLIDOS ='".$apellidos."', PROGRAMA ='".$programa."'
            WHERE ID ='".$id."'";
            $statement = $this->conn->query($sql);
        }
    }
?>