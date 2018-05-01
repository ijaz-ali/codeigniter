<?php

class Login_Model extends CI_Model {

    var $table = 'employee';
    var $column_order = array('id', 'first_name', 'last_name', 'email', 'username', 'cell'); //set column field database for datatable orderable
    var $column_search = array('id', 'first_name', 'last_name', 'email', 'username', 'cell'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    private function _get_datatables_query() {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function Check_User($email, $password) {

        $query = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
        $query = $this->db->query($query);

        if ($query) {
            $query = $query->result();
            $data = array(
                'id' => $query[0]->id,
                'email' => $query[0]->email,
                'logged_in' => true
            );
            $this->session->set_userdata($data);
            return $query;
        } else {
            return FALSE;
        }
    }

    function AddEmployee($data) {
        $query = $this->db->insert('employee', $data);
        return $query;
    }

    function FetchEmployee() {
        $query = "select * from employee";
        $query = $this->db->query($query);
        $query = $query->result();
        return $query;
    }

    function DeleteEmployee($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('employee');
        return $result;
    }

    function FetchSingleEmployee($id) {
        $query = "SELECT * FROM `employee` WHERE id = '$id' ";
        $query = $this->db->query($query);
        if ($query) {
            $query = $query->result();

            return $query;
        } else {
            return FALSE;
        }
    }

    function UpdateEmployee($data) {

        $id = $data['id'];
        $this->db->where('id', $id);
        $query = $this->db->update('employee', $data);
        return $query;
    }

}

?>