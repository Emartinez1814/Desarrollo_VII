<?php
require_once('modelo.php');

class noticia extends modeloCredencialesBD{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;
    protected $cantPagina;
    protected $pagina;

    public function __construct(){
        $this->pagina = 1;
        $this->cantPagina = 3;
        parent:: __construct();
    }

    public function consultar_noticias(){
        //$instruccion= "select * from noticias limit 0,3";
        $instruccion= "select * from noticias";
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
    public function calculo(){
        $instruccion= "select * from noticias";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        $numfilas = count ($resultado);

        if(!$numfilas){
            echo "Fallo al consultar las noticias";
        }
        else{
            return $numfilas;
            $numfilas->close();
        }
    }
    function paginaTotal(){
        $instruccion= "select * from noticias limit 0,3";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $numfilas = count ($resultado);

        $totalPagina= ceil($numfilas/$this->cantPagina);

        return $totalPagina;
        $totalPagina->close();
    }

    
}
?>