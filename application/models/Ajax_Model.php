<?php

class Ajax_Model extends CI_Model {

    public function AddUser() {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $result = $this->db->insert('users', $data);
        return $result;
    }

    public function ViewUser() {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function DeleteUser() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result = $this->db->delete('users');
        return $result;
    }

    public function UpdateUser() {
        $id = $this->input->post('id_edit');
        $email = $this->input->post('email_edit');
        $password = $this->input->post('password_edit');

        $this->db->set('email', $email);
        $this->db->set('password', $password);
        $this->db->where('id', $id);
        $result = $this->db->update('users');
        return $result;
    }

}

?>