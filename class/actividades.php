<?php 
    require_once('modelo.php');

    class actividad extends modeloCredencialesBD{
        /*protected $titulo;
        protected $texto;
        protected $categoria;
        protected $fecha;
        protected $imagen;*/

        public function __construct()
        {
            parent::__construct();
        }

        public function consultar_actividades(){
            $instruccion = "CALL sp_listar_actividades()";

            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Fallo al consultar las actividades";
            }
            else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function registrar_actividad($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9){

            $instruccion = "CALL sp_registrar_actividades('".$p1."','".$p2."','".$p3."','".$p4."','".$p5."','".$p6."','".$p7."','".$p8."','".$p9."')";

            $consulta = $this->_db->query($instruccion);

            if(!$consulta){
                echo "Fallo al consultar las actividades";
            }

        }

        public function consultar_actividad($id){
            $instruccion = "CALL sp_obtener_actividad(".$id.")";
            $consulta = $this->_db->query($instruccion);

            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Fallo al consultar la actividad";
            }else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function actualizar_actividad($p0, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9){
            $instruccion = "CALL sp_actualizar_actividad('".$p0."','".$p1."','".$p2."','".$p3."','".$p4."','".$p5."','".$p6."','".$p7."','".$p8."','".$p9."')";
            $consulta = $this->_db->query($instruccion);

            if(!$consulta){
                echo "Fallo al consultar las actividades";
            }
        }

        public function consultar_actividad_filtro($campo, $valor){
            
            $instruccion = "CALL sp_listar_actividades_filtro('".$campo."','".$valor."')";
            
            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
            
            if($resultado){
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function eliminar_actividad($id){
            $instruccion = "CALL sp_eliminar_actividad(".$id.")";
            $consulta = $this->_db->query($instruccion);

            if(!$consulta){
                echo "Fallo al eliminar la actividad";
            }
        }
    }
?>