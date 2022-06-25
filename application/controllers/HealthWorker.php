<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HealthWorker extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('icons');
        $this->load->helper('custom');
        $this->load->model('Healthworker_model', 'Health');
        $this->load->library('session');
    }
    public function index()
    {
        $usersess = $this->session->userdata('hwuser');
        $data['page_title'] = 'Login | Health Worker';

        if ($usersess) {
            redirect(base_url('HealthWorker/Record'));
        } else {
            $this->load->view('Layouts/header', $data);
            $this->load->view('HealthWorker/Front');
            $this->load->view('Layouts/footer');
        }
    }
    public function Record()
    {
        $usersess = $this->session->userdata('hwuser');
        if ($usersess) {
            $data['active'] = 'walkin';
            $data['page_title'] = 'Walk-In | Health Worker';

            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/HealthWorkerNavbar', $data);
            $this->load->view('HealthWorker/Record');
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('HealthWorker'));
        }
    }
    public function ViewRecord()
    {
        $usersess = $this->session->userdata('hwuser');
        if ($usersess) {
            $data['active'] = 'walkinview';
            $data['page_title'] = 'View Walk-In | Health Worker';
            $data['user'] = $this->Health->fetchWalkin();

            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/HealthWorkerNavbar', $data);
            $this->load->view('HealthWorker/ViewRecord');
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('HealthWorker'));
        }
    }

    public function ViewAppointments()
    {
        $usersess = $this->session->userdata('hwuser');
        if ($usersess) {
            $data['active'] = 'appoint';
            $data['page_title'] = 'View Appointment | Health Worker';

            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/HealthWorkerNavbar');
            $this->load->view('HealthWorker/Appointments');
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('HealthWorker'));
        }
    }

    public function login()
    {
        $number = $_POST['number'];

        $res = $this->db->query('SELECT * FROM health_worker WHERE ID_number=' . $number)->row_array();

        $this->session->set_userdata('hwuser', $res);
        redirect(base_url('HealthWorker/Record'));
    }

    public function checkNumber()
    {
        $number = $_POST['number'];

        $res = $this->db->query('SELECT * FROM health_worker WHERE ID_number=' . $number);
        if ($res->num_rows() > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function savewalkin()
    {

        $data = array(
            'Firstname'     => trim($_POST['firstname']),
            'Lastname'      => trim($_POST['lastname']),
            'Middlename'    => trim($_POST['middlename']),
            'Contact'       => trim($_POST['contact']),
            'Email'         => trim($_POST['email']),
            'Gender'         => $_POST['gender'],
            'Address'       => trim($_POST['address']),
            'app_type'      => $_POST['apptype'],
            'app_services'  => $_POST['apptypeinfo'],
            'emergency'     => trim($_POST['emergency']),
            'others'        => trim($_POST['others']),
            'created_at'    => date('Y-m-d H:i:s'),
        );

        $res = $this->Health->insertWalkin($data);

        if ($res) {
            $this->session->set_flashdata('success_save', true);
            redirect(base_url('HealthWorker/Record'));
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('hwuser');
        redirect(base_url('HealthWorker'));
    }
}
