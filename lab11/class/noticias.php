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
    protected $numfilas;
    protected $totalPagina;

    public function __construct(){
        $this->pagina = 1;
        $this->cantFilas = 5;
        parent:: __construct();
    }

     public function consultar_noticias(){
        $inicio = $this->empezar();
        $instruccion= "select * from noticias limit $inicio,$this->cantFilas";
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
    public function paginaInicio(){
        //$paginaTotal = $this->paginaTotal();
        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        }else {
            $pagina=$this->pagina;
        }
        if ($pagina > 1) {
            $enlace= $pagina - 1 ;
        }else {
            $enlace= $pagina + 1;
        }

        return $enlace;
    }
    public function empezar(){
        $enlace = $this->paginaInicio();

        $empezarPagina= (($enlace - 1) * $this->cantFilas);
        //$empezarPagina= (($this->pagina - 1) * $this->cantFilas);

        return $empezarPagina;
    }
    
    public function calculo(){
        $instruccion= "select * from noticias";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $numfilas = count ($resultado);

        return $numfilas;
        $resultado->close();
        $this->_db->close();
    }
    public function paginaTotal(){
        $empezar = $this->empezar();
        //$enlace = $this->paginaInicio();
        $instruccion= "select * from noticias";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $numfilas = count ($resultado);
        $totalPagina= ceil($numfilas / $this->cantFilas);

            if ($totalPagina == $this->pagina) {
            //if ($totalPagina == $enlace) {
                $totalPagina = $numfilas;
            }else{
                $totalPagina=$empezar + ($this->cantFilas);
            }

        return $totalPagina;
        $resultado->close();
        $this->_db->close();     
    }
    
    

}
?>