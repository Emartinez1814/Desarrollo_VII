<?php
require_once('modelo.php');

class noticia extends modeloCredencialesBD{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct(){
        parent:: __construct();
    }

    public function consultar_noticias(){
        $instruccion= "select * from noticias limit 0,3";
        $consulta = $this->_db->query($instruccion);
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