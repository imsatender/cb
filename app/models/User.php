<?php

class User extends CI_Model {

    public $user_id;
    public $username;
    public $password;
    public $user_type;
    public $source;
    public $status;
    public $created_time;
    public $update_time;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_last_ten_entries() {
        $query = $this->db->get('user', 10);
        return $query->result();
    }

    public function insert_entry() {
        $this->title = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry() {
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    public function userAuthenticate($data) {
        echo 'satender';
        if ($data['source'] == APP_LOCAL) {
            $this->db->where(['username' => $data['email'], 'password' => $data['password']]);
        } else {
            $this->db->where(['username' => $data['email'], 'source_id' => $data['source_id']]);
        }
        $query = $this->db->get('user', 1);
        $result = $query->result();
        echo 'satender1';
        echo '<pre>', print_r($result),'</pre>';die;
    }

}
