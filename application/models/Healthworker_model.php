<?php
class Healthworker_model extends CI_Model
{

    public function insertWalkin($data)
    {
        $this->db->insert('walkin', $data);
        return true;
    }
    public function fetchWalkin()
    {
        $this->db->select('*');
        $res = $this->db->get('walkin');
        return $res;
    }
}
