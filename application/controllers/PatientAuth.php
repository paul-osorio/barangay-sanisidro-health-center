<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientAuth extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('custom');

        $this->load->library('session');
        $this->load->model('Patient_model');
    }
    public function register()
    {
        $this->load->library('upload');
        $id_config['upload_path']          = './uploads/Patient/ID';
        $id_config['allowed_types']        = 'jpeg|jpg|png';
        $id_filename = $_FILES['id']['name'];
        $id_ext = pathinfo($id_filename, PATHINFO_EXTENSION);
        $id_config['file_name']        = md5(trim($_POST['email'])) . time();
        $this->upload->initialize($id_config);
        $this->upload->do_upload('id');

        $data = array(
            'ID_number' => $_POST['idnumber'],
            'Firstname' => $_POST['firstname'],
            'Lastname'  => $_POST['lastname'],
            'Middlename'    => $_POST['middlename'],
            'Email' => trim($_POST['email']),
            'Birthday' => $_POST['dob'],
            'Contact'   => trim($_POST['mobile']),
            'Gender'    => $_POST['gender'],
            'Address'   => trim($_POST['address']),
            'status'   => 'pending',
            'Created_at'   => date('n/d/Y'),
            'Password'  => password_hash(trim($_POST['password']), PASSWORD_DEFAULT),
            'Govid' =>  md5(trim($_POST['email'])) . time() . "." . $id_ext,
        );

        $res = $this->Patient_model->register($data);

        if ($res) {
            redirect(base_url('P/Success'));
        } else {
        }
    }

    public function checkemail()
    {
        $email = $_POST['email'];

        $res = $this->Patient_model->checkemail($email);
        if ($res) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function checkmobile()
    {
        $mobile = $_POST['mobile'];

        $res = $this->Patient_model->checkmobile($mobile);
        if ($res) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function login()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $data = $this->Patient_model->login($email);

        if ($data) {
            if (password_verify($password, $data['Password'])) {
                $this->session->set_userdata('patient_id', $data['ID']);
                redirect(base_url('P/HealthService'));
            } else {
                $this->session->set_flashdata('email', $email);
                $this->session->set_flashdata('password_error', true);
                redirect(base_url('P/Login'));
            }
        } else {
            echo "Email not found";
        }
    }

    public function noreloadlogin()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $data = $this->Patient_model->login($email);

        if ($data) {
            if (password_verify($password, $data['Password'])) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo "Email not found";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('patient_id');
        redirect(base_url('P/Login'));
    }


    public function checkemailLogin()
    {
        $email = trim($_POST['email']);

        $data = $this->Patient_model->login($email);
        if ($data) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function updateshowlimit()
    {
        $id = $_POST['id'];

        $this->Patient_model->updateshowlimit($id);
    }

    public function appointment()
    {
        $patientiD = $this->session->userdata('patient_id');
        $health = $_POST['symptoms'];
        for ($i = 0; $i < sizeof($health); $i++) {
            $data[] = $health[$i];
        }

        $data = array(
            'patient_ID' => $patientiD,
            'firstname' => trim($_POST['firstname']),
            'lastname' => trim($_POST['lastname']),
            'middlename' => trim($_POST['middlename']),
            'birthday' => $_POST['birthday'],
            'gender' => $_POST['gender'],
            'symptoms' => json_encode($data),
            'healthcondition' => $_POST['healthcondition'],
            'app_date' => $_POST['date'],
            'app_time'   => $_POST['etime'],
            'type'  => $_POST['type']
        );

        $res = $this->Patient_model->appointment($data);

        if ($res) {
            $this->session->set_flashdata('appointment_success', true);
            redirect(base_url('P/HealthService'));
        }
    }

    public function addprofile()
    {
        $patientID = $this->session->userdata('patient_id');
        $type = $_POST['type'];

        $data = array(
            'PatientID' => $patientID,
            'Firstname' => trim($_POST['firstname']),
            'Lastname'  => trim($_POST['lastname']),
            'Middlename' => trim($_POST['middlename']),
            'Birthday' => $_POST['birthday'],
            'Gender'    => $_POST['gender'],
            'Type'  => $_POST['type']
        );

        $res = $this->Patient_model->addprofile($data);

        if ($res) {
            if ($type === 'pedia') {
                redirect(base_url('P/ForPedia'));
            } else {
                redirect(base_url('P/ForOthers'));
            }
        }
    }

    public function updateprofile()
    {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $data = array(
            'Firstname' => trim($_POST['firstname']),
            'Lastname' => trim($_POST['lastname']),
            'Middlename' => trim($_POST['middlename']),
            'Birthday' => $_POST['birthday'],
            'Gender' => $_POST['gender'],
        );

        $res = $this->Patient_model->updateprofile($data, $id);

        if ($res) {
            if ($type === 'pedia') {
                $this->session->set_flashdata('edit_success', true);
                redirect(base_url('P/ForPedia'));
            } else {
                $this->session->set_flashdata('edit_success', false);
                redirect(base_url('P/ForOthers'));
            }
        }
    }

    public function editAccount()
    {

        if ($_FILES['profilepic']['size'] == 0) {
            if ($_POST['prof'] !== "") {
                $filename = $_POST['prof'];
            } else {
                $filename = "";
            }
        } else {

            $this->load->library('upload');
            $profile_config['upload_path']          = './uploads/Patient/Profile';
            $profile_config['allowed_types']        = 'jpeg|jpg|png';
            $profile_filename = $_FILES['profilepic']['name'];
            $profile_ext = pathinfo($profile_filename, PATHINFO_EXTENSION);
            $profile_config['file_name']        = md5(trim($_POST['email'])) . time();
            $this->upload->initialize($profile_config);
            $this->upload->do_upload('profilepic');
            $filename = md5(trim($_POST['email'])) . time() . '.' . $profile_ext;
        }


        $id = $this->session->userdata('patient_id');


        $data = array(
            'Email'         =>  trim($_POST['email']),
            'Contact'       =>  trim($_POST['contact']),
            'Address'       =>  trim($_POST['address']),
            'Profile'       =>  $filename
        );

        $res = $this->Patient_model->updateAccount($data, $id);

        if ($res) {
            $this->session->set_userdata('edit_success', true);
            redirect(base_url('P/Account'));
        }
    }

    public function fillRegister()
    {
        $idnumber = $_POST['idnumber'];

        $res = $this->Patient_model->selectDetails($idnumber);

        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $user) {
                $data = array(
                    'firstname' => $user['Firstname'],
                    'lastname' => $user['Lastname'],
                    'middlename' => $user['Middlename'],
                    'address' => $user['Address'],
                );
            }
            echo json_encode($data, JSON_PRETTY_PRINT);
        } else {
            echo "false";
        }
    }
    public function selectdate()
    {
        $date = $_POST['date'];
        $apptype = $_POST['apptype'];

        $res = $this->Patient_model->selectdate($date, $apptype);

        if ($res->num_rows() > 0) {
            $val = $res->result_array();
            foreach ($val as $time) {
                $array[] =  $time['app_time'];
            }
            echo json_encode($array);
        } else {
            echo "false";
        }
    }

    public function checkAccount()
    {
        $idnum = $_POST['id'];
        $res = $this->Patient_model->userExist($idnum);

        echo $res;
    }

    public function checkidexist()
    {
        $idnum = $_POST['id'];
        $res = $this->Patient_model->checkuserExist($idnum);

        echo $res;
    }

    public function checkpass()
    {
        $password = $_POST['password'];
        $id = $this->session->userdata('patient_id');

        $data = $this->Patient_model->checkpassword($password, $id);
        if ($data) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
    public function changepass()
    {
        $data = array(
            'Password' => password_hash(trim($_POST['pass']), PASSWORD_DEFAULT),
        );
        $id = $this->session->userdata('patient_id');
        $res = $this->Patient_model->changepass($data, $id);
        if ($res) {
            $this->session->set_userdata('changepass_success', true);
            redirect(base_url('P/Account'));
        }
    }

    public function addappointment()
    {
        $id = $this->session->userdata('patient_id');

        $data = array(
            'patient_ID'    =>  $id,
            'firstname'     =>  trim($_POST['firstname']),
            'lastname'      =>  trim($_POST['lastname']),
            'middlename'    =>  trim($_POST['middlename']),
            'birthday'      =>  $_POST['dob'],
            'gender'        =>  $_POST['gender'],
            'app_type'      =>  $_POST['app_type'],
            'app_desc'      =>  $_POST['vaccine'],
            'app_date'      =>  $_POST['date'],
            'app_time'      =>  $_POST['schedtime'],
            'type'          =>  $_POST['profiletype'],
        );

        $res = $this->Patient_model->addappointment($data);

        if ($res) {
            $this->session->set_flashdata('insert_success', true);
            redirect(base_url('P/HealthService'));
        }
    }

    public function deleteotheruser($id, $type)
    {
        $res = $this->Patient_model->deleteotheruser($id);
        if ($res) {
            if ($type === "pedia") {
                $this->session->set_flashdata('deletesuccess', true);
                redirect(base_url('P/ForPedia'));
            } elseif ($type === "others") {
                $this->session->set_flashdata('deletesuccess', true);
                redirect(base_url('P/ForOthers'));
            }
        }
    }
    public function countNotif()
    {
        $myid = $this->session->userdata('patient_id');

        echo $this->Patient_model->countnotif($myid);
    }

    public function fetchNotification()
    {
        $myid = $this->session->userdata('patient_id');
        $start = $this->input->post('start');

        $res = $this->Patient_model->fetchNotification($myid, $start);
        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $data) {

                switch ($data['title']) {
                    case 'Appointment approved':
                        $icon = "fad fa-thumbs-up text-success";
                        break;
                    case 'Appointment declined':
                        $icon = "fad fa-times-circle text-danger";
                        break;
                    case 'Appointment completed':
                        $icon = "fad fa-clipboard-list-check text-primary";
                        break;
                    case 'New appointment':
                        $icon = "fad fa-calendar-check text-warning";
                        break;
                    default:
                        $icon = "fad fa-circle";
                }

                $output[] = array(
                    'id'    => $data['ID'],
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'type'  =>  $data['type'],
                    'status' => $data['status'],
                    'icon' => $icon,
                    'time' => get_time_ago(strtotime($data['notif_date'])),
                    'start' => $this->input->post('start'),
                );
            }
        } else {
            $output = 0;
        }
        echo json_encode($output);
    }

    public function pediaprofile()
    {
        $id = $this->session->userdata('patient_id');
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);

        $data = $this->Patient_model->pediaprofile($fname, $lname, $id);
        if ($data) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function otherprofile()
    {
        $id = $this->session->userdata('patient_id');
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);

        $data = $this->Patient_model->otherprofile($fname, $lname, $id);
        if ($data) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function cancelapp()
    {

        $id = $_POST['userid'];
        $uid = $_POST['patientid'];
        $type = $_POST['type'];
        $aptype = $_POST['apptype'];

        $res = $this->db->query('UPDATE appointment SET status="cancel" WHERE ID=' . $id);

        $user = $this->db->query('SELECT * FROM patient WHERE  ID=' . $uid)->row_array();

        $fullname = $user['Lastname'] . ', ' . $user['Firstname'] . ' ' . $user['Middlename'];


        if ($res) {
            $data = array(
                'notif_title' => $fullname . ' cancelled an appointment',
                'notif_type'  => ucfirst($type),
                'notif_status' => 'unread',
                'notif_date' => date('Y-m-d H:i:s'),
                'notif_appID' => $id,
                'notif_apptype' => $aptype
            );
            $this->Patient_model->insertdocnotif($data);

            $this->session->set_userdata('successcancel', true);
            redirect(base_url('P/HealthService'));
        }
    }
}
