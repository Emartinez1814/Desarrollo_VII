<?php
class UsuarioMDB{
    private $mongo_client;
    private $mongo_host;
    private $mongo_user;
    private $mongo_pswd;
    private $mongo_database;
    private $mongo_collection;
    private $mongo_document;

    function __construct(){
        $this->mongo_host ="localhost:27017"
        $this->mongo_user =""
        $this->mongo_pswd =""
        $this->mongo_database ="usuarios_api"
        $this->mongo_collection ="usuarios"
        $this->conectarMongodb();
    }
}
?>