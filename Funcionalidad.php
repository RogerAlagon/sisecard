<?php

    class Funcionalidad
    {
        /* LOGIN EN APP MOVIL*/
        public function getLogin($usuario)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("SELECT * FROM ALUMNOS WHERE CODIGO='$usuario'");
            $rpta =  $statement->fetchAll();
            $datos = array();

            foreach($rpta as $row)
            {
                $datos[] = $row;
            }
            echo json_encode($datos);
        }
        /* MOSTRAR DATOS APP MOVIL*/
        public function getAlumnos($usuario)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("SELECT * FROM ALUMNOS WHERE CODIGO='$usuario'");

			$fila = array();
            while($fila = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $alumnos[] = $fila;
            }
            echo json_encode($alumnos);
        }

        public function getHorarioApp()
        {
            $conn = BasedeDatos::iniciarDB();
            $statement = $conn->query(" SELECT 
            HORARIO.INICIO,
            HORARIO.FIN,
            LUNES.NOMBRE_ASIGNATURA AS LUNES_ASIGNATURA,
            MARTES.NOMBRE_ASIGNATURA AS MARTES_ASIGNATURA,
            MIERCOLES.NOMBRE_ASIGNATURA AS MIERCOLES_ASIGNATURA,
            JUEVES.NOMBRE_ASIGNATURA AS JUEVES_ASIGNATURA,
            VIERNES.NOMBRE_ASIGNATURA AS VIERNES_ASIGNATURA
            FROM HORARIO
            LEFT JOIN LUNES  ON LUNES.COD_LUNES = HORARIO.COD_LUNES
            LEFT JOIN MARTES ON MARTES.COD_MARTES = HORARIO.COD_MARTES
            LEFT JOIN MIERCOLES ON MIERCOLES.COD_MIERCOLES = HORARIO.COD_MIERCOLES
            LEFT JOIN JUEVES ON JUEVES.COD_JUEVES = HORARIO.COD_JUEVES
            LEFT JOIN VIERNES ON VIERNES.COD_VIERNES = HORARIO.COD_VIERNES
            WHERE PROGRAMA='CASI IV' AND MODULO='MOD II-T'");
            $rpta = $statement->fetchAll();
            $fila = array();

            foreach($rpta as $row)
            {
                $fila[] = $row;
            }
            echo json_encode($fila);
        }



        /* login administrador*/
        public function getvalidarUsuario($usu,$pas)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("SELECT USUARIO, PASS FROM CONTROL WHERE USUARIO='".$usu."' AND PASS='".$pas."'");
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /* Agregar Programa*/
        public function setProgramas($programa)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("INSERT INTO PROGRAMAS (PROGRAMA) VALUES('".$programa."')");
        }
        /* Mostrar todos los Programas*/
        public function getProgramas()
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("SELECT * FROM PROGRAMAS");
            return $statement->fetchAll();
        }
        /* Restringir duplicado de Programas*/
        public function getDiplicadoPrograma($pro)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("SELECT PROGRAMA FROM PROGRAMAS WHERE PROGRAMA='".$pro."'");
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        /* Eliminar Programa*/
        public function setEliminarPrograma($programa)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("DELETE FROM PROGRAMAS WHERE PROGRAMA= '".$programa."'");
        }
        /* Agregar alumnos a db*/
        public function setAlumnos($dni,$nombre,$apellido,$programa)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("INSERT INTO ALUMNOS (CODIGO,NOMBRE,APELLIDOS,PROGRAMA) VALUES('".$dni."','".$nombre."','".$apellido."','".$programa."')");
        }
        /* Mostrar todos los alumnos */
        public function getDatosAlumnos()
        {
            $conn = BasedeDatos::iniciarDB();
            $statement=$conn->query("SELECT * FROM ALUMNOS ORDER BY APELLIDOS");
            return $statement->fetchAll();
        }
        /* Buscar Alumno por dni */
        public function getDatosAlumnoDni($dni)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement=$conn->query("SELECT CODIGO,NOMBRE,APELLIDOS FROM ALUMNOS WHERE CODIGO ='".$dni."'");
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        /* Restringir duplicado de alumnos*/
        public function getDuplicadoAlumno($codigo)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("SELECT CODIGO FROM ALUMNOS WHERE CODIGO='".$codigo."'");
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        /* Eliminar alumnos */
        public function setEliminarAlumnos($codigo)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("DELETE FROM ALUMNOS WHERE ID = '".$codigo."'");
        }
        /* Buscar Alumnos por codigo */
        public function getAlumnos2($codigo)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("SELECT * FROM ALUMNOS WHERE ID = '".$codigo."'");
            return $statement->fetchAll();
        }
        /* Actualizar Alumnos */
        public function setActualizarAlumnos($id,$codigo,$nombre,$apellidos,$programa)
        {
            $conn = BasedeDatos::iniciarDB();
            $statement =$conn->query("UPDATE ALUMNOS SET CODIGO = '".$codigo."', NOMBRE ='".$nombre."', APELLIDOS ='".$apellidos."', PROGRAMA ='".$programa."'
            WHERE ID ='".$id."'");
        }
        /*-----------------------------------------------------------------------------------------------------------------------------------------------------*/
        /*                                  GESTION DE HORARIOS - ALUMNOS                           */
        /*-----------------------------------------------------------------------------------------------------------------------------------------------------*/
        public function getHorario()
        {
            $conn = BasedeDatos::iniciarDB();
            $statement = $conn->query(" SELECT 
            LUNES.INICIO,
            LUNES.COD_CURSO,
            CURSOS.NOMBRE_CURSO AS NOMBRE_CURSO
            FROM LUNES
            INNER JOIN CURSO AS CURSOS ON CURSOS.COD_CURSO = LUNES.COD_CURSO");
            return $statement->fetchAll();
        }
        public function getHorario2()
        {
            $conn = BasedeDatos::iniciarDB();
            $statement = $conn->query(" SELECT 
            HORARIO.INICIO,
            HORARIO.FIN,
            LUNES.NOMBRE_ASIGNATURA AS LUNES_ASIGNATURA,
            MARTES.NOMBRE_ASIGNATURA AS MARTES_ASIGNATURA,
            MIERCOLES.NOMBRE_ASIGNATURA AS MIERCOLES_ASIGNATURA,
            JUEVES.NOMBRE_ASIGNATURA AS JUEVES_ASIGNATURA,
            VIERNES.NOMBRE_ASIGNATURA AS VIERNES_ASIGNATURA
            FROM HORARIO
            LEFT JOIN LUNES  ON LUNES.COD_LUNES = HORARIO.COD_LUNES
            LEFT JOIN MARTES ON MARTES.COD_MARTES = HORARIO.COD_MARTES
            LEFT JOIN MIERCOLES ON MIERCOLES.COD_MIERCOLES = HORARIO.COD_MIERCOLES
            LEFT JOIN JUEVES ON JUEVES.COD_JUEVES = HORARIO.COD_JUEVES
            LEFT JOIN VIERNES ON VIERNES.COD_VIERNES = HORARIO.COD_VIERNES");
            return $statement->fetchAll();
        }
    }
?>