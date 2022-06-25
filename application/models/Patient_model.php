<?php
class Patient_model extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('patient', $data);
        return true;
    }
    public function checkemail($email)
    {
        $query = $this->db->get_where('patient', array('Email' => $email));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkmobile($mobile)
    {
        $query = $this->db->get_where('patient', array('Contact' => $mobile));

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email)
    {
        $query = $this->db->get_where('patient', array('Email' => $email));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function fetchuser($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $query = $this->db->get('patient');

        return $query->row_array();
    }

    public function updateshowlimit($id)
    {
        $data = [
            'show_limit' => 2,
        ];
        $this->db->where('ID', $id);
        $this->db->update('patient', $data);

        return true;
    }

    public function updateAccount($data, $id)
    {

        $this->db->where('ID', $id);
        $this->db->update('patient', $data);

        return true;
    }
    public function appointment($data)
    {
        $this->db->insert('appointment', $data);
        return true;
    }
    public function selectDetails($id)
    {
        $this->db->select('*');
        $this->db->where('ID_number', $id);
        $res = $this->db->get('residents_list');

        return $res;
    }
    public function selectdate($date, $type)
    {

        $this->db->select('*');
        $this->db->where('app_date', $date);
        $this->db->where('app_type', $type);
        $this->db->where('status !=', 'complete');
        $this->db->where('status !=', 'cancel');
        $this->db->where('status !=', 'declined');
        $this->db->where('status !=', 'referred');
        $res = $this->db->get('appointment');

        return $res;
    }


    public function userExist($id)
    {
        $query = $this->db->get_where('patient', array('ID_number' => $id));

        if ($query->num_rows() > 0) {
            return 'false';
        } else {
            return 'true';
        }
    }

    public function checkuserExist($id)
    {
        $query = $this->db->get_where('residents_list', array('ID_number' => $id));

        if ($query->num_rows() > 0) {
            return 'true';
        } else {
            return 'false';
        }
    }



    public function addprofile($data)
    {
        $this->db->insert('otheraccount', $data);
        return true;
    }
    public function updateprofile($data, $id)
    {

        $this->db->where('ID', $id);
        $this->db->update('otheraccount', $data);

        return true;
    }

    public function fetchprofile($id, $type)
    {
        $this->db->select('*');
        $this->db->where('PatientID', $id);
        $this->db->where('type', $type);
        $this->db->order_by('ID', 'DESC');
        $res = $this->db->get('otheraccount');

        return $res->result_array();
    }
    public function fetchOneProfile($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('otheraccount');

        return $res->row_array();
    }
    public function checkpassword($password, $id)
    {
        $query = $this->db->get_where('patient', array('ID' => $id));
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            if (password_verify($password, $data['Password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function changepass($data, $id)
    {
        $this->db->where('ID', $id);
        $this->db->update('patient', $data);

        return true;
    }

    public function fetchrowapp($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('appointment');
        return $res->row_array();
    }

    public function fetchimmuno()
    {
        $this->db->select('*');
        $res = $this->db->get('immunization');
        return $res->result_array();
    }
    public function addappointment($data)
    {
        $this->db->insert('appointment', $data);
        return true;
    }
    public function fetchapp($id)
    {
        $this->db->select('*');
        $this->db->where('patient_ID', $id);

        $res = $this->db->get('appointment');
        return $res->result_array();
    }

    public function deleteotheruser($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('otheraccount');
        return true;
    }

    public function fetchNotification($id, $start)
    {
        $res = $this->db->query('SELECT * FROM patient_notification WHERE patient_id=' . $id . ' ORDER BY ID DESC LIMIT ' . $start . ',' . 6);
        // $this->db->select('*');
        // $this->db->where('patient_id', $id);
        // $this->db->order_by("ID", "DESC");
        // $this->db->limit($start, 6);
        // $res = $this->db->get('patient_notification');
        return $res;
    }

    public function fetchpatient($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('doctor_appointment');

        return $res->row_array();
    }



    public function countnotif($id)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $id);
        $this->db->where('status', 'unread');
        $query = $this->db->get('patient_notification');
        return $query->num_rows();
    }
    public function countnotif1($id)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $id);
        $query = $this->db->get('patient_notification');
        return $query->num_rows();
    }

    public function fetchOneNotif($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('patient_notification');
        return $res->row_array();
    }

    public function fetchapplist($id, $status)
    {
        $this->db->select('*');
        $this->db->where('patient_ID', $id);
        $this->db->where('status', $status);
        $res = $this->db->get('appointment');
        return $res;
    }

    public function fetchprevapp($data)
    {


        $array = array(
            'status' => 'complete',
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthday' => $data['birthday'],
        );

        $this->db->select('*');
        $this->db->where($array);
        $this->db->order_by("ID", "asc");

        $res = $this->db->get('appointment');

        return $res;
    }
    public function pediaprofile($fname, $lname, $id)
    {
        $query = $this->db->get_where('otheraccount', array('PatientID' => $id, 'Firstname' => $fname, 'Lastname' => $lname, 'Type' => 'pedia'));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function otherprofile($fname, $lname, $id)
    {
        $query = $this->db->get_where('otheraccount', array('PatientID' => $id, 'Firstname' => $fname, 'Lastname' => $lname, 'Type' => 'others'));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function nameEmail($email)
    {
        $this->db->select('*');
        $this->db->where('Email', $email);
        $query = $this->db->get('patient');

        return $query->row_array();
    }

    public function resetCode($data)
    {
        $query = $this->db->insert('password_reset', $data);
        return $query;
    }
    public function getResetLink($id)
    {
        $this->db->select('*');
        $this->db->where('linkID', $id);
        return $this->db->get('password_reset');
    }
    public function changepassuser($email, $password)
    {
        $this->db->where('Email', $email);
        $update = $this->db->update('patient', array('Password' => $password));

        if ($update) return true;
    }
    public function deleteresetlink($linkid)
    {
        $this->db->where('linkID', $linkid);
        $this->db->delete('password_reset');
    }

    public function insertdocnotif($data)
    {
        $query = $this->db->insert('doctor_notification', $data);
        return $query;
    }

    public function myselfExist($data)
    {
        $this->db->select('*');
        $this->db->where('patient_ID', $data['id']);
        $this->db->where('status', 'pending');
        $this->db->where('type', 'myself');
        $this->db->where('app_type', $data['apptype']);
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get('appointment');
        return $result;
    }

    public function otherExist($data)
    {
        $this->db->select('*');
        $this->db->where('lastname', $data['lastname']);
        $this->db->where('firstname', $data['firstname']);
        $this->db->where('status', 'pending');
        $this->db->where('type', $data['type']);
        $this->db->where('app_type', $data['apptype']);
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get('appointment');
        return $result;
    }
}
