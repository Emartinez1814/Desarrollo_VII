<?php
require_once('modelo.php');

class tareas extends BD{

    public function __construct(){
        parent:: __construct();
    }

    public function consulta(){
        $instruccion= "CALL sp_tareas";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        return $resultado;
        $resultado->close();
        $this->_db->close();
    }
    public function consulta_por_hacer(){
        $instruccion= "CALL sp_tareas_por_hacer";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        return $resultado;
        $resultado->close();
        $this->_db->close();
    }
    public function consulta_en_proceso(){
        $instruccion= "CALL sp_tareas_en_proceso";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        return $resultado;
        $resultado->close();
        $this->_db->close();
    }
    public function consulta_terminado(){
        $instruccion= "CALL sp_tareas_terminado";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        return $resultado;
        $resultado->close();
        $this->_db->close();
    }
    public function filtrar($campo,$valor){
        $instruccion= "CALL sp_tareas_filtrar('".$campo."','".$valor."')";
        $filtrar = $this->_db->query($instruccion);

        return $filtrar;
        $filtrar->close();
        $this->_db->close();
    }
    
    public function insertar($ti,$des,$es,$fec,$et,$res,$tip,$fecE){
        $instruccion= "CALL sp_tareas_insertar('".$ti."','".$des."','".$es."','".$fec."','".$et."','".$res."','".$tip."','".$fecE."')";
        $insertar = $this->_db->query($instruccion);

        return $insertar;
        $insertar->close();
        $this->_db->close();
    }
    public function actualizar($actualizar){
        $instruccion= "CALL sp_tareas_actualizar('".$actualizar."')";
        $actualizar = $this->_db->query($instruccion);

        return $actualizar;
        $actualizar->close();
        $this->_db->close();
    }
    public function actualizar_terminado($actualizar){
        $instruccion= "CALL sp_tareas_actualizar_terminado('".$actualizar."')";
        $actualizar = $this->_db->query($instruccion);

        return $actualizar;
        $actualizar->close();
        $this->_db->close();
    }
    public function editar($id,$ti,$des,$es,$fec,$et,$res,$tip,$fecE){
        $instruccion= "CALL sp_tareas_editar('".$id."','".$ti."','".$des."','".$es."','".$fec."','".$et."','".$res."','".$tip."','".$fecE."')";
        $editar = $this->_db->query($instruccion);

        return $editar;
        $editar->close();
        $this->_db->close();
    }
    public function por_editar($id){
        $instruccion= "CALL sp_tareas_por_editar('".$id."')";
        $editar = $this->_db->query($instruccion);

        return $editar;
        $editar->close();
        $this->_db->close();
    }
    public function eliminar($id){
        $instruccion= "CALL sp_tareas_eliminar('".$id."')";
        $eliminar = $this->_db->query($instruccion);

        return $eliminar;
        $eliminar->close();
        $this->_db->close();
    }
}
?>