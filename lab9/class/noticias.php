<?php
require_once('modelo.php');

class noticia extends modeloCredencialesBD{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function _construct(){
        parent:: _construct();
    }

    public function consultar_noticias(){
        //$instruccion= "CALL sp_listar_noticias()";
        //$instruccion= "select * from noticias";
        $consulta = $this->_db->query("select * from noticias");
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar las noticias";
        }
        else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
?>