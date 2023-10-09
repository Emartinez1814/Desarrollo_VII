<?php
require_once('modelo.php');

class noticias extends modeloCredencialesBD{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function_construct(){
        parent::_construct();
    }
}
?>