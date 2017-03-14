<?php

class Index_controller extends Controller{
    /*This variable only once the header and footer*/

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        //$this->view->debug = true;
        
        $usrCtrlr = new Users_controller();
        $this->view->usrCtrlr = $usrCtrlr;
        
        $this->view->render($this,"index","My Shop");
    }
    
}
