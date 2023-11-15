<?php
require_once('modelo.php');

class noticia2 extends modeloCredencialesBD{
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
    //consulta con las condiciones de inicio y cantidad de filas que deben salir
    public function consultar_noticias(){
        $inicio = $this->empezar();
        //$instruccion= "CALL sp_listar_noticias ()";
        //$instruccion= "CALL sp_noticias ('".$inicio."','".$this->cantFilas."')";
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
    //obteniendo el numero de pagina    
    public function paginaInicio(){

        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        }else {
            $pagina = $this->pagina; 
        }

        return $pagina;
    }
    //es el numero de fila de la cual va a empezar la consulta
    public function empezar(){
        $enlace = $this->paginaInicio();

        $empezarPagina= (($enlace - 1) * $this->cantFilas);

        return $empezarPagina;
    }
    //calculando la cantidad TOTAL de filas, de la consulta
    public function calculo(){
        $instruccion= "select * from noticias";
        //$instruccion= "CALL sp_noticias_contar()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $numfilas = count ($resultado);
        //$numfilas = count ($consulta);
        //$numfilas = $consulta;

        return $numfilas;
        $numfilas->close();
        $this->_db->close();;
                
    }
    //la cantidad de paginas que van a salir de la consulta
    public function paginaTotal(){
        $empezar = $this->empezar();
        $numfilas = $this->calculo();
        //$enlace = $this->paginaInicio();
        //$instruccion= "CALL sp_listar_noticias ()";
        //$consulta = $this->_db->query($instruccion);
        //$resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        //$numfilas = count ($resultado);
        $totalPagina= ceil($numfilas / $this->cantFilas);

        return $totalPagina;
        //$resultado->close();
        //$this->_db->close();     
    }
    public function cantFilas(){
        $cantFilas=$this->cantFilas;
        return $cantFilas;
    }
}
?>