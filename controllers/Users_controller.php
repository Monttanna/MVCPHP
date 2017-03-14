<?php

class Users_controller extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
    }
    
    public function registrar(){
        $keys = Usuario::getKeys();
        unset($keys[0]);
        $_POST["id"] = null;
        $this->validateKeys($keys, filter_input_array(INPUT_POST));
        
        $usr = Usuario::instanciate($_POST);
        $r = $usr->create();
        echo json_encode($r);
        
        if($r["error"] == 0){
            Users_bl::crearSesion($usr);
        }
    }
    
    public function entrar(){
        if(filter_input(INPUT_POST, "username") != null && filter_input(INPUT_POST, "password") != null){
            $usr = Usuario::getBy("username", filter_input(INPUT_POST, "username"));
            if(!is_null($usr)){
                $r = json_encode(Users_bl::login($usr,filter_input(INPUT_POST, "password")));
                echo $r;
            }
            
        }
    }
    
    public function salir(){
        Users_bl::cerrarSesion();
    }
    
    public function floatingForm(){
        $this->view->render($this,"floatingForm","My Shop | Login");
    }
    
    public function floatingOptions(){
        $this->view->render($this,"floatingOptions","My Shop | Options");
    }
    
    public function verificarUsername($username,$ajax = true){
        $r = Usuario::getBy("username", $username);
        if($ajax){
            $r = (empty($r))? 0 : 1;
            echo $r;
        }else{
            $r = (empty($r))? 0 : $r;
            return $r;
        }
    }
    
    public function verificarCorreo($email,$ajax = true){
        $r = Usuario::getBy("email", $email);
        if($ajax){
            $r = (empty($r))? 0 : 1;
            echo $r;
        }else{
            $r = (empty($r))? 0 : $r;
            return $r;
        }
    }
    
}
