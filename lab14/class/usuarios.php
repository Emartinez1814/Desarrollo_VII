<?php
require_once('modelo.php');
class usarios extends modeloCredencialesBD{
    public function_construct(){
        parent::__construct();
    }

    public function validar_usuario($usr,$pwd){
        $instruccion = "CALL sp_validar_usuario('".$usr."','".$pwd."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
?>