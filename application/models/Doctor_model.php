<?php
class Doctor_model extends CI_Model
{
    public function login($email)
    {
        $query = $this->db->get_where('doctor', array('Email' => $email, 'status' => 'active'));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function appointment()
    {
        $this->db->select('*');
        $this->db->where('status', 'approve');
        return $this->db->get('appointment')->result_array();
    }
    public function appoint($type, $status, $did)
    {

        if ($type === "midwife") {
            $array = '(app_type = "prenatal" OR app_type = "immunization")';
        } elseif ($type === "dentist") {
            $array = '(app_type = "dental")';
        } elseif ($type === "nurse") {
            $array = '(app_type = "immunization")';
        }

        $this->db->select('*');
        $this->db->where($array);
        $this->db->where('status', $status);
        $this->db->where('doctorApp_ID', $did);
        return $this->db->get('appointment');
    }

    public function fetchuser($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('doctor');

        return $res->row_array();
    }
    public function addBio($bio, $id)
    {
        $data = [
            'Bio' => $bio
        ];
        $this->db->where('ID', $id);
        $this->db->update('doctor', $data);

        return true;
    }

    public function fetchpatient($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $this->db->order_by('ID', 'DESC');
        $res = $this->db->get('appointment');

        return $res->row_array();
    }
    public function fetchpatientd($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('doctor_appointment');

        return $res->row_array();
    }



    public function fetchpatient2($type)

    {

        if ($type === "midwife") {
            $array = '(app_type = "prenatal" OR app_type = "immunization")';
        } elseif ($type === "dentist") {
            $array = '(app_type = "dental")';
        } elseif ($type === "nurse") {
            $array = '(app_type = "immunization")';
        }

        $this->db->select('*');
        $this->db->where($array);
        $this->db->where('status', 'pending');
        $this->db->order_by("ID", "desc");

        $res = $this->db->get('appointment');

        return $res->result_array();
    }

    public function approveappointment($id, $did)
    {
        $data = [
            'status' => 'approve',
            'doctorApp_ID' => $did
        ];
        $this->db->where('ID', $id);
        $this->db->update('appointment', $data);

        return true;
    }

    public function completedappointment($id)
    {
        $data = [
            'status' => 'complete'
        ];
        $this->db->where('ID', $id);
        $this->db->update('appointment', $data);

        return true;
    }
    public function fetchOneProfile($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $this->db->where('status', 'pending');
        $res = $this->db->get('appointment');

        return $res->row_array();
    }

    public function fetchOneProfile1($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $this->db->where('status', 'approve');
        $res = $this->db->get('appointment');

        return $res->row_array();
    }

    public function fetchOneProfile2($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $res = $this->db->get('appointment');

        return $res->row_array();
    }

    public function declinereason($data, $id)
    {


        $data1 = [
            'status' => 'declined'
        ];
        $this->db->where('ID', $id);
        $this->db->update('appointment', $data1);

        $this->db->insert('appointment_declined', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function referralform($data, $id)
    {


        $data1 = [
            'status' => 'referred'
        ];
        $this->db->where('ID', $id);
        $this->db->update('appointment', $data1);

        $this->db->insert('referral_form', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    public function addnote($note, $id)
    {
        $data = [
            'note' => $note
        ];
        $this->db->where('ID', $id);
        $this->db->update('appointment', $data);
        return true;
    }

    public function fetchprevapp($data)
    {


        $array = array(
            'status' => 'complete',
            'app_type' => $data['type'],
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

    function search_user_data($type, $query)
    {

        if ($type === "midwife") {
            $array = '(app_type = "prenatal" OR app_type = "immunization")';
        } elseif ($type === "dentist") {
            $array = '(app_type = "dental")';
        } elseif ($type === "nurse") {
            $array = '(app_type = "immunization")';
        }
        // $array1 = array('firstname' => $query, 'lastname' => $query);
        $where = "(firstname LIKE '%" . $query . "%' OR lastname LIKE '%" . $query . "%')";

        // $this->db->like($array1);
        $this->db->where($where);
        $this->db->where($array);
        $this->db->where('status', 'approve');

        return $this->db->get('appointment');
    }

    public function selectdate($date, $type)
    {

        $this->db->select('*');
        $this->db->where('app_date', $date);
        $this->db->where('appointmentType', $type);
        $res = $this->db->get('doctor_appointment');

        return $res;
    }

    public function insertdoctorapp($data)
    {
        $this->db->insert('doctor_appointment', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function updateApp($id, $dID)
    {
        $data = [
            'newapp' => 'Yes',
            'docid' => $dID,

        ];
        $this->db->where('ID', $id);
        $this->db->update('appointment', $data);

        return true;
    }

    public function insertnotif($data)
    {
        $this->db->insert('patient_notification', $data);
        return true;
    }

    public function updateSchedule($data, $id)
    {
        $this->db->where('doctorID', $id);
        $this->db->update('doctor_schedule', $data);

        return true;
    }
    public function insertAdminNotif($data)
    {
        $this->db->insert('admin_notif', $data);
        return true;
    }

    public function countnotif($id, $type)
    {

        if ($type === "midwife") {
            $where = "notif_status='unread' AND notif_apptype='prenatal' OR notif_apptype='immunization'";
        } else if ($type === "nurse") {
            $where = "notif_status='unread' AND notif_apptype='immunization'";
        } else {
            $where = "notif_status='unread' AND notif_apptype='dental'";
        }
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('doctor_notification');
        return $query->num_rows();
    }





    public function countnotif1($id, $type)
    {

        if ($type === "midwife") {
            $where = "notif_apptype='prenatal' OR notif_apptype='immunization'";
        } else if ($type === "nurse") {
            $where = "notif_apptype='immunization'";
        } else {
            $where = "notif_apptype='dental'";
        }
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('doctor_notification');
        return $query->num_rows();
    }


    public function fetchNotification($start, $type)
    {

        if ($type === "midwife") {
            $where = "notif_apptype='prenatal' OR notif_apptype='immunization'";
        } else if ($type === "nurse") {
            $where = "notif_apptype='immunization'";
        } else {
            $where = "notif_apptype='dental'";
        }


        // $res = $this->db->query('SELECT * FROM doctor_notification ORDER BY ID DESC LIMIT ' . $start . ',' . 6);
        $this->db->select('*');
        $this->db->where($where);
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(6, $start);
        $res = $this->db->get('doctor_notification');
        return $res;
    }


    public function updatenotif($type)
    {
        if ($type === "midwife") {
            $where = "notif_apptype='prenatal' OR notif_apptype='immunization'";
        } else if ($type === "nurse") {
            $where = "notif_apptype='immunization'";
        } else {
            $where = "notif_apptype='dental'";
        }
        $this->db->set('notif_status', 'read');
        $this->db->where($where);
        $this->db->update('doctor_notification');
    }
}
