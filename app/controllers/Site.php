<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('RequestHandler.php');
class Site extends RequestHandler {
    /**
     * Purpose : Method will be used by only from app side
     * @return type
     */
    public function apprequest() {
        log_message('info', __METHOD__.'=>START for content_type:'.$_SERVER['CONTENT_TYPE']);
        if (stripos($_SERVER['CONTENT_TYPE'], 'application/json') === 0) {
            $_POST = json_decode(file_get_contents("php://input"), true);
        }
        log_message('info', __METHOD__.'=>data:'.  var_export($_POST, true));
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
        log_message('info', __METHOD__.'=>START ');
        //code for login
        if($this->validate($data, __FUNCTION__) === true){
            $this->load->model('User');
            $this->User->userAuthenticate($data);
        }
        return $this->response;
    }

    private function register($data) {
        log_message('info', __METHOD__.'=>START ');
        if($this->validate($data, __FUNCTION__) === true){
            
        }
        return $this->response;
    }
}
