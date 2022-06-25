<?php
class Admin_model extends CI_Model
{
    public function login($email)
    {
        $this->db->select('*');
        $this->db->where('Username', $email);
        $this->db->where('status', 'active');
        $query = $this->db->get('admin');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function addDoctor($data)
    {
        $this->db->insert('doctor', $data);
        return $this->db->insert_id();
    }

    public function fetchRegistered()
    {
        $this->db->select('*');
        $res = $this->db->get('patient');
        return $res->result_array();
    }
    public function fetchRegistered1()
    {
        $this->db->select('*');
        $res = $this->db->get('patient');
        return $res;
    }

    public function addresident($data)
    {
        $this->db->insert('residents_list', $data);
        return true;
    }

    public function fetchResident()
    {

        $res = $this->db->query('SELECT * FROM residents_list WHERE NOT EXISTS (SELECT ID_number FROM patient WHERE patient.ID_number = residents_list.ID_number)');




        return $res->result_array();
    }
    public function deleteResident($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('residents_list');

        return true;
    }

    public function fetchuser($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $query = $this->db->get('patient');

        return $query->row_array();
    }
    public function approveaccount($id)
    {
        $data = [
            'status' => 'active',
        ];
        $this->db->where('ID', $id);
        $this->db->update('patient', $data);

        return true;
    }

    public function updateResident($data, $id)
    {
        $this->db->where('ID', $id);
        $this->db->update('residents_list', $data);

        return true;
    }

    public function updateDoctor($data, $id)
    {
        $this->db->where('ID', $id);
        $this->db->update('doctor', $data);

        return true;
    }

    public function fetchOneResident($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('patient');

        return $res->row_array();
    }
    public function fetchimmuno()
    {
        $this->db->select('*');
        $res = $this->db->get('immunization');
        return $res->result_array();
    }
    public function delvacc($id, $tname)
    {
        $this->db->where('ID', $id);
        $this->db->delete($tname);

        return true;
    }
    public function addvacc($data)
    {
        $this->db->insert('immunization', $data);
        return true;
    }

    public function insertSchedule($data)
    {
        $this->db->insert('doctor_schedule', $data);
        return true;
    }

    public function fetchdoctor()
    {
        $this->db->select('*');
        return $this->db->get('doctor')->result_array();
    }
    public function deletedoc($id)
    {
        $this->db->where('ID', $id);
        $this->db->update('doctor', array('status' => 'archive'));

        return true;
    }

    public function activedoc($id)
    {
        $this->db->where('ID', $id);
        $this->db->update('doctor', array('status' => 'active'));

        return true;
    }
    public function countnotif()
    {
        $this->db->select('*');
        $this->db->where('status', 'unread');
        $query = $this->db->get('admin_notif');
        return $query->num_rows();
    }
    public function fetchNotification($start)
    {
        $res = $this->db->query('SELECT * FROM admin_notif ORDER BY ID DESC LIMIT ' . $start . ',' . 6);
        // $this->db->select('*');
        // $this->db->where('patient_id', $id);
        // $this->db->order_by("ID", "DESC");
        // $this->db->limit($start, 6);
        // $res = $this->db->get('patient_notification');
        return $res;
    }
    public function updatenotif($id)
    {
        $this->db->set('status', 'read');
        $this->db->where('ID', $id);
        $this->db->update('admin_notif');
    }


    public function fetchadminaccount($status)
    {
        $this->db->select('*');
        $this->db->where('ID !=', 1);
        $this->db->where('status', $status);
        $res = $this->db->get('admin');
        return $res->result_array();
    }

    public function addAdmin($data)
    {
        $this->db->select_max('ID');
        $res1 = $this->db->get('admin')->row_array();

        $this->db->where('ID', $res1['ID']);
        $this->db->update('admin', array('status' => 'archive'));

        $this->db->insert('admin', $data);
        return true;
    }
    public function checkadminusername($email)
    {
        $query = $this->db->get_where('admin', array('Email' => $email));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkadminusername2($email, $id)
    {
        $this->db->select('*');
        $this->db->where('ID !=', $id);
        $this->db->where('Email', $email);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkadmincontact2($contact, $id)
    {
        $this->db->select('*');
        $this->db->where('ID !=', $id);
        $this->db->where('Contact', $contact);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkadmincontact($contact)
    {
        $query = $this->db->get_where('admin', array('Contact' => $contact));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteAdmin($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('admin');

        return true;
    }
    public function updateAdmin($data, $id)
    {
        $this->db->where('ID', $id);
        $this->db->update('admin', $data);

        return true;
    }
    public function truncateServices($service)
    {
        $this->db->truncate($service);
    }

    public function saverecordservices($data, $service)
    {
        $this->db->insert($service, $data);
        return true;
    }

    public function saverecords($data)
    {
        $this->db->insert('residents_list', $data);
        return true;
    }

    public function truncaterecord()
    {
        $this->db->truncate('residents_list');
    }
    public function updatepassadmin($data, $id)
    {
        $this->db->where('ID', $id);
        $this->db->update('admin', $data);

        return true;
    }
    public function saverecordsHW($data)
    {
        $this->db->insert('health_worker', $data);
        return true;
    }

    public function truncaterecordHW()
    {
        $this->db->truncate('health_worker');
    }
    public function checkemail($email)
    {
        $query = $this->db->get_where('doctor', array('Email' => $email));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function adminHistory($data)
    {
        $this->db->insert('admin_history', $data);
        return true;
    }

    public function countcolrl()
    {
        $query = $this->db->get('residents_list');
        $cnt = $query->num_fields();
    }

    public function countunregistered()
    {


        $res = $this->db->query('SELECT * FROM residents_list WHERE NOT EXISTS (SELECT ID_number FROM patient WHERE patient.ID_number = residents_list.ID_number)');




        return $res->num_rows();
    }
}
