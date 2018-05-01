<?php

class Calendar_Model extends CI_Model {

//    function InsertEvents() {
//        $data = array(
//            'title' => $this->input->post('title'),
//            'start_date' => $this->input->post('start_date'),
//            'end_date' => $this->input->post('end_date'),
//            'url' => $this->input->post('url')
//        );
//        $result = $this->db->insert('calendar', $data);
//        return $result;
//    }
//
//    function View_Events() {
//        $query = $this->db->get('calendar');
//        return $query;
//    }

    public function get_events($start, $end) {
        return $this->db->where("start >=", $start)->where("end <=", $end)->get("calendar_events");
    }

    public function add_event($data) {
        $this->db->insert("calendar_events", $data);
    }

    public function get_event($id) {
        return $this->db->where("ID", $id)->get("calendar_events");
    }

    public function update_event($id, $data) {
        $this->db->where("ID", $id)->update("calendar_events", $data);
    }

    public function delete_event($id) {
        $this->db->where("ID", $id)->delete("calendar_events");
        
    }

}
