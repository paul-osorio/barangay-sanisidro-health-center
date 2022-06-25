<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminAuth extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Admin_model');
        $this->load->helper('custom');
    }
    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect(base_url('Admin'));
    }

    public function loginauth()
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $json = file_get_contents(base_url('assets/admin.json'));
        $json_data = json_decode($json, true);




        $data = $this->Admin_model->login($username);

        if ($data) {
            if ($username === $json_data['username'] && $password === $json_data['password']) {
                $this->session->set_userdata('isSuperAdmin', true);
                $this->session->set_userdata('admin', $data);
                redirect(base_url('Admin/Dashboard'));
            } else {
                if ($password === $data['Password']) {
                    $this->session->set_userdata('isSuperAdmin', false);
                    $this->session->set_userdata('admin', $data);
                    redirect(base_url('Admin/Dashboard'));
                } else {

                    $this->session->set_flashdata('username', $username);
                    $this->session->set_flashdata('password_error', true);
                    redirect(base_url('Admin'));
                }
            }
        } else {

            $this->session->set_flashdata('username', $username);
            $this->session->set_flashdata('username_error', true);
            redirect(base_url('Admin'));
        }
    }

    public function addDoctor()
    {
        $monday = $_POST['monday'];
        $mfrom = $_POST['mfrom'];
        $mto = $_POST['mto'];

        $tuesday = $_POST['tuesday'];
        $tfrom = $_POST['tfrom'];
        $tto = $_POST['tto'];

        $wednesday = $_POST['wednesday'];
        $wfrom = $_POST['wfrom'];
        $wto = $_POST['wto'];

        $thursday = $_POST['thursday'];
        $thfrom = $_POST['thfrom'];
        $thto = $_POST['thto'];

        $friday = $_POST['friday'];
        $ffrom = $_POST['ffrom'];
        $fto = $_POST['fto'];

        $profilename = trim($_POST['firstname']) . '_profile_' . time();
        $signaturename = trim($_POST['firstname']) . '_signature_' . time();


        $this->load->library('upload');
        $profile_config['upload_path']          = './uploads/Doctor/';
        $profile_config['allowed_types']        = 'jpeg|jpg|png';
        $profile_filename = $_FILES['file']['name'];
        $profile_ext = pathinfo($profile_filename, PATHINFO_EXTENSION);
        $profile_config['file_name']        =  $profilename;
        $this->upload->initialize($profile_config);
        $this->upload->do_upload('file');

        $sign_config['upload_path']          = './uploads/Signature/';
        $sign_config['allowed_types']        = 'jpeg|jpg|png';
        $sign_filename = $_FILES['signfile']['name'];
        $sign_ext = pathinfo($sign_filename, PATHINFO_EXTENSION);
        $sign_config['file_name']        = $signaturename;
        $this->upload->initialize($sign_config);
        $this->upload->do_upload('signfile');

        $data = array(
            'Firstname' => trim($_POST['firstname']),
            'Lastname'  => trim($_POST['lastname']),
            'Middlename' => trim($_POST['middlename']),
            'Contact'   => trim($_POST['contact']),
            'Gender'    => $_POST['gender'],
            'Medical'    => $_POST['specialties'],
            'Email' => $_POST['email'],
            'Password' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT),
            'Picture' =>  $profilename . "." . $profile_ext,
            'signature' => $signaturename . "." . $sign_ext,
        );

        $ad = $this->session->userdata('admin');
        $adminname = $ad['Firstname'] . ' ' . $ad['Middlename'] . ' ' . $ad['Lastname'];
        $docname = trim($_POST['firstname']) . ' ' . trim($_POST['middlename']) . ' ' . trim($_POST['lastname']);
        $history = array(
            'Name' => $adminname,
            'Action' => 'Added ' . $docname . ' as  new medical staff',
            'Action_date' =>  date('Y-m-d H:i:s'),
        );

        $this->Admin_model->adminHistory($history);


        $res = $this->Admin_model->addDoctor($data);


        $schedata = array(
            'doctorID' => $res,
            'monday' => $monday . ',' . $mfrom . ',' . $mto,
            'tuesday' => $tuesday . ',' . $tfrom . ',' . $tto,
            'wednesday' => $wednesday . ',' . $wfrom . ',' . $wto,
            'thursday' => $thursday . ',' . $thfrom . ',' . $thto,
            'friday' => $friday . ',' . $ffrom . ',' . $fto,
        );


        $this->Admin_model->insertSchedule($schedata);

        if ($res) {
            $this->session->set_userdata('successaccount', true);
            redirect(base_url('Admin/ViewMedicalStaff'));
        } else {
            $this->session->set_userdata('successaccount', false);
            redirect(base_url('Admin/ViewMedicalStaff'));
        }
    }

    public function approveaccount($id)
    {
        $res = $this->Admin_model->approveaccount($id);
        if ($res) {
            redirect(base_url('Admin/PendingAccounts'));
        }
    }

    public function addResident()
    {
        $data = array(
            'Firstname' => $_POST['firstname'],
            'Lastname'  =>  $_POST['lastname'],
            'Middlename'    =>  $_POST['middlename'],
            'Address'   =>  $_POST['address'],
            'ID_number' =>  $_POST['idnumber'],
        );
        $res = $this->Admin_model->addresident($data);

        if ($res) {
            $this->session->set_flashdata('success', true);
            redirect(base_url('Admin/ResidentsList'));
        } else {
            $this->session->set_flashdata('success', false);
            redirect(base_url('Admin/ResidentsList'));
        }
    }

    public function updateResident()
    {

        $id = $_POST['ID'];

        $data = array(
            'Firstname' => $_POST['firstname'],
            'Lastname'  => $_POST['lastname'],
            'Middlename'    => $_POST['middlename'],
            'Address'   => $_POST['address']
        );

        $res = $this->Admin_model->updateResident($data, $id);
        if ($res) {
            $this->session->set_flashdata('success_update', true);
            redirect(base_url('Admin/ResidentsList'));
        } else {
            $this->session->set_flashdata('success_update', false);
            redirect(base_url('Admin/ResidentsList'));
        }
    }

    public function deleteResident($id)
    {
        $res = $this->Admin_model->deleteResident($id);

        if ($res) {
            $this->session->set_flashdata('success_delete', true);
            redirect(base_url('Admin/ResidentsList'));
        } else {
            $this->session->set_flashdata('success_delete', false);
            redirect(base_url('Admin/ResidentsList'));
        }
    }

    public function delvacc($id, $tablename)
    {
        $res = $this->Admin_model->delvacc($id, $tablename);
        if ($res) {
            $this->session->set_flashdata('success_delete', true);
            redirect(base_url('Admin/Dashboard'));
        }
    }

    public function addvacc()
    {
        $data = array(
            'Name' => $_POST['vaccname'],
            'For'   =>  $_POST['vaccdescription']
        );

        $res = $this->Admin_model->addvacc($data);
        if ($res) {
            $this->session->set_flashdata('success_add', true);
            redirect(base_url('Admin/Dashboard'));
        }
    }


    public function deletedoc()
    {
        $id = $_POST['ID'];
        $res = $this->Admin_model->deletedoc($id);

        $ad = $this->session->userdata('admin');
        $adminname = $ad['Firstname'] . ' ' . $ad['Middlename'] . ' ' . $ad['Lastname'];
        $history = array(
            'Name' => $adminname,
            'Action' => 'Move ' . $_POST['docname'] . ' account to archive',
            'Action_date' =>  date('Y-m-d H:i:s'),
        );

        $this->Admin_model->adminHistory($history);



        if ($res) {
            $this->session->set_userdata('success_archive', true);
            redirect(base_url('Admin/ViewMedicalStaff'));
        }
    }

    public function activedoc()
    {
        $id = $_POST['ID'];
        $res = $this->Admin_model->activedoc($id);

        $ad = $this->session->userdata('admin');
        $adminname = $ad['Firstname'] . ' ' . $ad['Middlename'] . ' ' . $ad['Lastname'];
        $history = array(
            'Name' => $adminname,
            'Action' => 'Move ' . $_POST['docname'] . ' account to active',
            'Action_date' =>  date('Y-m-d H:i:s'),
        );

        $this->Admin_model->adminHistory($history);



        if ($res) {
            $this->session->set_userdata('success_unarchive', true);

            redirect(base_url('Admin/ViewMedicalStaff'));
        }
    }





    public function updateDoctor()
    {

        $id = $_POST['thisid'];
        if ($_POST['password'] === "" || $_POST['password'] === null) {
            $data = array(
                'Firstname' => trim($_POST['firstname']),
                'Lastname'  => trim($_POST['lastname']),
                'Middlename'    => trim($_POST['middlename']),
                'Email'   => trim($_POST['email']),
                'Contact'   => trim($_POST['contact']),
                'Medical'  => $_POST['medspec'],
            );
        } else {
            $data = array(
                'Firstname' => trim($_POST['firstname']),
                'Lastname'  => trim($_POST['lastname']),
                'Middlename'    => trim($_POST['middlename']),
                'Email'   => trim($_POST['email']),
                'Contact'   => trim($_POST['contact']),
                'Medical'  => $_POST['medspec'],
                'Password' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT),
            );
        }


        $ad = $this->session->userdata('admin');
        $adminname = $ad['Firstname'] . ' ' . $ad['Middlename'] . ' ' . $ad['Lastname'];
        $docname = trim($_POST['firstname']) . ' ' . trim($_POST['middlename']) . ' ' . trim($_POST['lastname']);
        $history = array(
            'Name' => $adminname,
            'Action' => 'Updated ' . $docname . ' information',
            'Action_date' =>  date('Y-m-d H:i:s'),
        );

        $this->Admin_model->adminHistory($history);


        $res = $this->Admin_model->updateDoctor($data, $id);
        if ($res) {
            $this->session->set_userdata('success_update', true);
            redirect(base_url('Admin/ViewMedicalStaff'));
        } else {
            $this->session->set_userdata('success_update', false);
            redirect(base_url('Admin/ViewMedicalStaff'));
        }
    }
    public function backup()
    {
        $this->load->dbutil();


        $prefs = array(
            'format'      => 'txt',
            'filename'    => 'my_db_backup.sql'
        );


        $backup = &$this->dbutil->backup($prefs);

        $db_name = 'HealthCenter-DB-Backup-' . date("Y-m-d-H-i-s") . '.sql';
        $save = '/path/to/mybackup.gz/' . $db_name;

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($db_name, $backup);
    }

    public function restore()
    {
        $message = '';
        if (isset($_POST["import"])) {
            if ($_FILES["database"]["name"] != '') {
                $array = explode(".", $_FILES["database"]["name"]);
                $extension = end($array);
                if ($extension == 'sql') {
                    $connect = mysqli_connect("localhost", "root", "", "healthcenter");
                    $output = '';
                    $count = 0;
                    $file_data = file($_FILES["database"]["tmp_name"]);
                    foreach ($file_data as $row) {
                        $start_character = substr(trim($row), 0, 2);
                        if ($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '') {
                            $output = $output . $row;
                            $end_character = substr(trim($row), -1, 1);
                            if ($end_character == ';') {
                                if (!mysqli_query($connect, $output)) {
                                    $count++;
                                }
                                $output = '';
                            }
                        }
                    }
                    if ($count > 0) {
                        $this->session->set_flashdata('response', false);
                        redirect('Admin/BackupAndRestore');
                    } else {
                        $this->session->set_userdata('response', true);
                        redirect(base_url('Admin/BackupAndRestore'));
                    }
                } else {
                    $this->session->set_flashdata('response', false);
                    redirect('Admin/BackupAndRestore');
                }
            } else {
                $this->session->set_flashdata('response', false);
                redirect('Admin/BackupAndRestore');
            }

            echo $message;
        }
    }
    public function addAdminAccount()
    {
        $data = array(
            'Firstname' => trim($_POST['firstname']),
            'Lastname' => trim($_POST['lastname']),
            'Contact' => trim($_POST['contact']),
            'Email' => trim($_POST['email']),
            'Username' => trim($_POST['username']),
            'Password' => trim($_POST['pass']),
        );

        $res = $this->Admin_model->addAdmin($data);
        if ($res) {
            $this->session->set_userdata('addadmin_success', true);
            redirect(base_url('Admin/ViewAdminAccount'));
        }
    }

    public function updateAdminAcc()
    {

        $id = $_POST['uID'];
        $data = array(
            'Firstname' => trim($_POST['firstname']),
            'Lastname' => trim($_POST['lastname']),
            'Contact' => trim($_POST['contact']),
            'Email' => trim($_POST['username']),
        );

        $res = $this->Admin_model->updateAdmin($data, $id);
        if ($res) {
            $this->session->set_flashdata('updateadmin_success', true);
            redirect(base_url('Admin/AddAdminAccount'));
        }
    }
    public function checkadminusername()
    {
        $email = trim($_POST['username']);

        $data = $this->Admin_model->checkadminusername($email);
        if ($data) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function checkadminusername2()
    {
        $email = trim($_POST['username']);
        $id = $_POST['myid'];

        $data = $this->Admin_model->checkadminusername2($email, $id);
        if ($data) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function checkadmincontact2()
    {
        $contact = trim($_POST['contact']);
        $id = $_POST['myid'];


        $data = $this->Admin_model->checkadmincontact2($contact, $id);
        if ($data) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function checkadmincontact()
    {
        $contact = trim($_POST['contact']);

        $data = $this->Admin_model->checkadmincontact($contact);
        if ($data) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function deleteAdminAccount($id)
    {
        $res = $this->Admin_model->deleteAdmin($id);
        if ($res) {
            $this->session->set_flashdata('deladmin_success', true);
            redirect(base_url('Admin/AddAdminAccount'));
        }
    }

    public function changeadminpass()
    {
        $id = $_POST['ID'];
        $pass = array('Password' => trim($_POST['pass']));

        $this->Admin_model->updatepassadmin($pass, $id);

        $this->session->set_userdata('deladmin_success', true);
        redirect(base_url('Admin/ViewAdminAccount'));
    }
    public function checkemail()
    {
        $email = trim($_POST['email']);

        $res = $this->Admin_model->checkemail($email);
        if ($res) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function fetchNotification()
    {
        $start = $this->input->post('start');

        $res = $this->Admin_model->fetchNotification($start);
        $icon = 'fas fa-calendar-alt text-primary';

        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $data) {
                $output[] = array(
                    'id'    => $data['ID'],
                    'title' => $data['notif_title'],
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
}
