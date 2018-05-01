<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_Model');
    }

    public function index() {
        $this->load->view('login/index');
    }

    public function dashboard() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view("dashboard/header");
            $this->load->view("dashboard/main");
            $this->load->view("dashboard/sidebar");
        } else {
            redirect('Login');
        }
    }

    function AddEmployee() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view("dashboard/header");
            $this->load->view("dashboard/add_employee");
            $this->load->view("dashboard/sidebar");
        } else {
            redirect('Login');
        }
    }

    function SubmitEmployee() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        //   $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_availability');
        // $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('cell', 'Cell no', 'required|regex_match[/^[0-9]{11}$/]');
        $this->form_validation->set_message('regex_match', 'Phone no pattern is 033******** and only 11 digit.');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[employee.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[employee.username]');

       

        if ($this->form_validation->run() == FALSE) {

            $this->load->view("dashboard/header");
            $this->load->view("dashboard/add_employee");
            $this->load->view("dashboard/sidebar");
        } else {

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'cell' => $this->input->post('cell')
            );

            $result = $this->Login_Model->AddEmployee($data);
            if ($result) {

                redirect('Login/ViewEmployee');
            }
        }
    }

    function ViewEmployee() {
        $data['emp'] = $this->Login_Model->FetchEmployee();
        $this->load->view("dashboard/header");
        $this->load->view("dashboard/viewEmployee", $data);
        $this->load->view("dashboard/sidebar");
    }

    function UpdateEmployee() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('cell', 'Cell no', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view("dashboard/header");
            $this->load->view("dashboard/add_employee");
            $this->load->view("dashboard/sidebar");
        } else {

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'cell' => $this->input->post('cell'),
                'id' => $this->input->post('id')
            );

            $result = $this->Login_Model->UpdateEmployee($data);
            if ($result) {
                redirect('Login/ViewEmployee');
            }
        }
    }

    function FetchSingleEmployee($id) {
        $data['fetch_data'] = $this->Login_Model->FetchSingleEmployee($id);
        $this->load->view("dashboard/header");
        $this->load->view("dashboard/add_employee", $data);
        $this->load->view("dashboard/sidebar");
    }

    function DeleteEmployee($id) {
        $result = $this->Login_Model->DeleteEmployee($id);
        if ($result) {
            redirect('Login/ViewEmployee');
        }
    }

    public function Validate() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Login/index');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('pass');

            $check = $this->Login_Model->Check_User($email, $password);
            if ($check) {
                redirect('Login/dashboard');
            } else {
                $this->load->view('Login/index');
            }
        }
    }

    public function Logout() {
        $this->session->unset_userdata('logged_in');
        redirect('Login');
    }

    public function ajax_list() {
        $list = $this->Login_Model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $emp) {
            $no++;
            $row = array();
            $row[] = $emp->id;
            $row[] = $emp->first_name;
            $row[] = $emp->last_name;
            $row[] = $emp->email;
            $row[] = $emp->username;
            $row[] = $emp->cell;
            $row[] = "<a href='" . base_url() . "Login/FetchSingleEmployee/" . $emp->id . "'>Edit</a> <a href='javascript:;' onclick='deleteEmp(" . $emp->id . ")' >Delete</a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Login_Model->count_all(),
            "recordsFiltered" => $this->Login_Model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}

?>