<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RequestHandler extends CI_Controller {

    var $response = [
        'status' => EXIT_SUCCESS,
        'msg_code' => NO_MSG,
        'data' => []
    ];

    protected function validate($_data, $_type) {
        log_message('info', __METHOD__.'=>START for type:'.$_type);
        $status = true;
        switch ($_type) {
            case 'login':
                $status = $this->validateLoginData($_data);
                break;
            case 'register':
                $status = $this->validateRegisterData($_data);
                break;
        }
        if ($status === false) {
            $this->response ['msg'] = INVALID_DATA;
            $this->response ['status'] = EXIT_ERROR;
        }
        return $status;
    }

    private function validateLoginData($_data) {
        log_message('info', __METHOD__.'=>START ');
        /*
          foreach($_data as $key => $val){

          }
         * 
         */
        return true;
    }

    private function validateRegisterData($_data) {
        log_message('info', __METHOD__.'=>START ');
        /*
          foreach($_data as $key => $val){

          }
         * 
         */
        return true;
    }

}
