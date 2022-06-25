<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('icons');
        $this->load->helper('custom');
        $this->load->model('Admin_model');
        $this->load->library('session');
    }
    public function json()
    {
    }


    public function index()
    {
        $adminsession = $this->session->userdata('admin');

        $data['page_title'] = 'Login | Admin';
        if ($adminsession) {
            redirect(base_url('Admin/Dashboard'));
        } else {
            $this->load->view('Layouts/header', $data);
            $this->load->view('Admin/Login', $data);
            $this->load->view('Layouts/footer');
        }
    }
    public function residentlist()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'resident';
            $data['user'] = $this->Admin_model->fetchResident();
            $data['data'] = $this->Admin_model->fetchRegistered();
            $data['page_title'] = 'Resident List | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/ResidentList', $data);
            $this->load->view('Layouts/footer');


            $arrayitem = array('error_import', 'success_import');
            $this->session->unset_userdata($arrayitem);
        } else {
            redirect(base_url('Admin'));
        }
    }

    public function addaccount()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'adddoctor';
            $data['page_title'] = 'Add Medical Staff | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/Addaccountdoctor');
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function manageaccount()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'addadmin';
            $data['page_title'] = 'Manage Accounts | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/ManageAccount');
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function viewadminaccount()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'addadmin';
            $data['user'] = $this->Admin_model->fetchadminaccount('active');
            $data['user2'] = $this->Admin_model->fetchadminaccount('archive');
            $data['page_title'] = 'View Admin Accounts | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/ViewAdminAccount', $data);
            $this->load->view('Layouts/footer');

            $arrtem = array('addadmin_success', 'deladmin_success');
            $this->session->unset_userdata($arrtem);
        } else {
            redirect(base_url('Admin'));
        }
    }

    public function viewnotification($id)
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'notif';
            $data['page_title'] = 'View Notification | Admin';
            $this->Admin_model->updatenotif($id);

            $data['user'] = $this->db->query('SELECT * FROM admin_notif WHERE ID=' . $id)->row_array();


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/ViewNotification', $data);
            $this->load->view('Layouts/footer');

            $arrayitem = array('error_import', 'success_import');
            $this->session->unset_userdata($arrayitem);
        } else {
            redirect(base_url('Admin'));
        }
    }


    public function viewhealthworker()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'addadmin';
            $data['page_title'] = 'View Health Worker Accounts | Admin';

            $data['user'] = $this->db->query('SELECT * FROM health_worker')->result_array();


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/HealthWorker', $data);
            $this->load->view('Layouts/footer');

            $arrayitem = array('error_import', 'success_import');
            $this->session->unset_userdata($arrayitem);
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function backupandrestore()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'backuprestore';
            $data['page_title'] = 'Backup & Restore | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/BackupRestore');
            $this->load->view('Layouts/footer');

            $this->session->unset_userdata('response');
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function registeredaccount()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'pending';
            $data['user'] = $this->Admin_model->fetchRegistered();
            $data['page_title'] = 'Registered Accounts | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/RegisteredAccounts', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function viewaccounts($id)
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'pending';
            $data['user'] = $this->Admin_model->fetchOneResident($id);
            $data['page_title'] = 'View Account | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/ViewAccount', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('Admin'));
        }
    }

    public function viewrecord()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'walkin';
            $data['page_title'] = 'View Walk-In List | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/ViewRecord');
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function notif()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'notif';
            $data['page_title'] = 'Notification | Admin';
            $data['count'] = $this->Admin_model->countnotif();


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/Notification');
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function countNotif()
    {
        echo $this->Admin_model->countnotif();
    }

    public function dashboard()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'dashboard';
            $data['immuno'] = $this->Admin_model->fetchimmuno();
            $data['countres'] = $this->Admin_model->countunregistered();
            $data['countreg'] = $this->db->count_all('patient');
            $data['countdoc'] = $this->db->count_all('doctor');
            $data['counthelth'] = $this->db->count_all('health_worker');
            $data['page_title'] = 'Dashboard | Admin';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/Dashboard', $data);
            $this->load->view('Layouts/footer');

            $arrayitem = array('error_import', 'success_import');
            $this->session->unset_userdata($arrayitem);
        } else {
            redirect(base_url('Admin'));
        }
    }



    public function medicalaccount()
    {
        $adminsession = $this->session->userdata('admin');
        if ($adminsession) {
            $data['active'] = 'addaccount';
            $data['med'] = $this->Admin_model->fetchdoctor();
            $data['page_title'] = 'View Medical Staff Account | Admin';



            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/AdminNavbar', $data);
            $this->load->view('Admin/ViewMedicalAccount', $data);
            $this->load->view('Layouts/footer');
            $sessarray = array('successaccount', 'success_archive', 'success_unarchive', 'success_update');
            $this->session->unset_userdata($sessarray);
        } else {
            redirect(base_url('Admin'));
        }
    }
}
