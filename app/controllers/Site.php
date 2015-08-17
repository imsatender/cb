<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('RequestHandler.php');
class Site extends RequestHandler {
    /**
     * Purpose : Method will be used by only from app side
     * @return type
     */
    public function apprequest() {
        //echo '<pre>',print_r($_SERVER),'</pre>';die;
        if (stripos($_SERVER['CONTENT_TYPE'], 'application/json') === 0) {
            $_POST = json_decode(file_get_contents("php://input"), true);
        }
        echo json_encode($this->$_POST['action']($_POST['data']));
    }

    public function siterequest() {
        if (stripos($_SERVER['CONTENT_TYPE'], 'application/json') === 0) {
            $_POST = json_decode(file_get_contents("php://input"), true);
        }
        return $this->$_POST['action']($_POST);
    }

    /**
     * All the methods below will not be directly accessible 
     * Only accessed by the apprequest() & siterequest()
     * @param type $data
     */
    private function login($data) {
        //code for login
        if($this->validate($data, __FUNCTION__) === true){
            $this->load->model('User');
            $this->User->userAuthenticate($data);
        }
        return $this->response;
    }

    private function register($data) {
        if($this->validate($data, __FUNCTION__) === true){
            
        }
        return $this->response;
    }
}
