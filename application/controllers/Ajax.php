<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ajax_Model');
    }

    public function index() {
        $this->load->view('home');
    }

    public function AddUser() {
        $data = $this->Ajax_Model->AddUser();
        echo json_encode($data);
    }

    public function ViewUser() {
        $data['users'] = $this->Ajax_Model->ViewUser();
        echo json_encode($data);
    }

    public function view() {
        $this->load->view('view');
    }

    public function DeleteUser() {

        $data = $this->Ajax_Model->DeleteUser();
       echo json_encode($data);
    }

    public function UpdateUser() {
        $data = $this->Ajax_Model->UpdateUser();
        echo json_encode($data);
    }

}
