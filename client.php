<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client
 *
 * @author reginald
 */
class client {
   
    public function __construct() {
        
        $params = array('location'=>'http://192.168.33.11/soap/server.php',
                        'uri'=>'urn://192.168.33.11/soap/server.php',
                        'trace'=>1
            
        );
        
        $this->instance = new SoapClient(NULL,$params);
        
    }
    
    public function getUserDetails($id_array) {
        
        return $this->instance->__soapcall('getUser',$id_array);
        
    }
}

$client = new client;
