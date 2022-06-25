<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('icons');
        $this->load->library('session');
        $this->load->helper('custom');
        $this->load->model('Doctor_model');
        $this->load->model('Chat_model');
        $this->load->helper('url');
    }
    public function appointment()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'appointment';

            $doctortype = $this->Doctor_model->fetchuser($doctorsession)['Medical'];
            $data['patient'] = $this->Doctor_model->fetchpatient2($doctortype);
            $data['page_title'] = 'Appointment List | Medical Staff';



            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/Appointment', $data);
            $this->load->view('Layouts/footer');

            $array_items = array('success', 'successnewapp', 'referralsuccess', 'declinesuccess', 'complete_success');
            $this->session->unset_userdata($array_items);
        } else {
            redirect(base_url('D/Login'));
        }
    }

    public function doctorappoint($id)
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'patient';
            $data['appoint'] = $this->Doctor_model->fetchpatient($id);
            $data['page_title'] = 'Set Appointment | Medical Staff';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/DoctorAppoint', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('D/Login'));
        }
    }
    public function doctorsetappoint($id)
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'patient';
            $data['appoint'] = $this->Doctor_model->fetchpatientd($id);
            $data['page_title'] = 'View Set Appointment | Medical Staff';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/ViewSetAppoint', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('D/Login'));
        }
    }



    public function viewappointment($id)
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'appointment';

            $data['user'] = $this->Doctor_model->fetchOneProfile($id);
            $type = $this->Doctor_model->fetchpatient($id)['app_type'];
            $user =  $this->Doctor_model->fetchOneProfile($id);
            $data['id'] = $id;


            $array = array(
                'status' => 'complete',
                'type' => $type,
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'birthday' => $user['birthday'],
            );

            $data['app'] = $this->Doctor_model->fetchprevapp($array);
            $data['page_title'] = 'View Appointment | Medical Staff';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/ViewAppointment', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('D/Login'));
        }
    }

    public function index()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'patient';
            $data['appoint'] = $this->Doctor_model->appointment();
            $data['user'] = $this->Doctor_model->fetchuser($doctorsession);
            $data['page_title'] = 'Patient List | Medical Staff';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/Patient', $data);
            $this->load->view('Layouts/footer');
            $this->session->unset_userdata('complete_success');

            $this->session->unset_userdata('deladmin_success');
        } else {
            redirect(base_url('D/Login'));
        }
    }

    public function searchPatient()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        $user = $this->Doctor_model->fetchuser($doctorsession);
        $appoint = $this->Doctor_model->appoint($user['Medical'], $this->input->post('status'));
        if ($this->input->post('search')) {

            $appoint = $this->Doctor_model->search_user_data($user['Medical'], $this->input->post('search'));

            if ($appoint->num_rows() > 0) {
                foreach ($appoint->result_array() as $data) {
                    $query = $this->db->query('SELECT * FROM patient WHERE ID=' . $data['patient_ID']);
                    $patient = $query->row_array();


                    if ($patient['Profile'] === '' || $patient['Profile'] === null)
                        $profile = base_url('assets/images/profile.png');
                    else
                        $profile = base_url('uploads/Patient/Profile/' . $patient['Profile']);

                    $middlename = (($data['middlename'] === "" || $data['middlename'] === null) ? '' : $data['middlename'][0] . '.');
                    $name =  $data['lastname'] . ', ' . $data['firstname'] . ' ' . $middlename;
                    $date = $data['app_date'];

                    switch ($data['type']) {
                        case 'myself':
                            $type = 'For Myself';
                            break;
                        case 'pedia':
                            $type = 'For Pedia';
                            break;
                        case 'others':
                            $type = 'For Others';
                            break;
                        default:
                            $type = 'For Myself';
                    }

                    $output[] = array(
                        'ID'        => $data['ID'],
                        'patientID' => $patient['ID'],
                        'profile'   => $profile,
                        'name'      => $name,
                        'type'      => $type,
                        'date'      => $date,
                        'messageIcon' => message(25, 25, "messageIcon"),
                        'viewIcon' => viewIcon(30, 30, "viewIcon"),
                    );
                }
            } else {
                $output = 0;
            }
            echo json_encode($output);
        }
    }

    public function fetchpatientlist()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        $user = $this->Doctor_model->fetchuser($doctorsession);

        $appoint = $this->Doctor_model->appoint($user['Medical'], $this->input->post('status'), $doctorsession);

        if ($this->input->post('patient')) {
            if ($appoint->num_rows() > 0) {
                foreach ($appoint->result_array() as $data) {
                    $query = $this->db->query('SELECT * FROM patient WHERE ID=' . $data['patient_ID']);
                    $patient = $query->row_array();

                    if ($patient['Profile'] === '' || $patient['Profile'] === null)
                        $profile = base_url('assets/images/profile.png');
                    else
                        $profile = base_url('uploads/Patient/Profile/' . $patient['Profile']);


                    $middlename = (($data['middlename'] === "" || $data['middlename'] === null) ? '' : $data['middlename'][0] . '.');
                    $name =  $data['lastname'] . ', ' . $data['firstname'] . ' ' . $middlename;
                    $date = $data['app_date'];



                    $output[] = array(
                        'ID'        => $data['ID'],
                        'patientID' => $patient['ID'],
                        'profile'   => $profile,
                        'name'      => $name,
                        'type'      => 'For ' . ucfirst($data['type']),
                        'apptype'   => ucfirst($data['app_type']),
                        'date'      => $date,
                        'messageIcon' => message(25, 25, "messageIcon"),
                        'viewIcon' => viewIcon(30, 30, "viewIcon"),
                        'status'    => $data['status'],
                    );
                }
            } else {
                $output = 0;
            }
            echo json_encode($output);
        }
    }







    // public function pedia($id)
    // {
    //     $doctorsession = $this->session->userdata('doctor_id');
    //     if ($doctorsession) {
    //         $data['active'] = 'patient';
    //         $data['user'] = $this->Doctor_model->fetchpatient($id);


    //         $this->load->view('Layouts/header');
    //         $this->load->view('Navigations/DoctorNavbar', $data);
    //         $this->load->view('Doctor/Patient/Pedia', $data);
    //         $this->load->view('Layouts/footer');
    //     } else {
    //         redirect(base_url('D/Login'));
    //     }
    // }
    public function viewpatient($id)
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {

            $data['user'] = $this->Doctor_model->fetchpatient($id);
            $type = $this->Doctor_model->fetchpatient($id)['app_type'];
            $data['active'] = 'patient';
            $data['page_title'] = 'View Patient | Medical Staff';


            $user =  $this->Doctor_model->fetchOneProfile2($id);

            $array = array(
                'status' => 'complete',
                'type' => $type,
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'birthday' => $user['birthday'],
            );

            $data['app'] = $this->Doctor_model->fetchprevapp($array);


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/ViewPatient', $data);
            $this->load->view('Layouts/footer');


            $this->session->unset_userdata('successnewapp');
        } else {
            redirect(base_url('D/Login'));
        }
    }
    // public function others($id)
    // {
    //     $doctorsession = $this->session->userdata('doctor_id');
    //     if ($doctorsession) {
    //         $data['active'] = 'patient';
    //         $data['user'] = $this->Doctor_model->fetchpatient($id);


    //         $this->load->view('Layouts/header');
    //         $this->load->view('Navigations/DoctorNavbar', $data);
    //         $this->load->view('Doctor/Patient/Others', $data);
    //         $this->load->view('Layouts/footer');
    //     } else {
    //         redirect(base_url('D/Login'));
    //     }
    // }

    // public function reminder()
    // {
    //     $doctorsession = $this->session->userdata('doctor_id');
    //     if ($doctorsession) {
    //         $data['active'] = 'patient';

    //         $this->load->view('Layouts/header');
    //         $this->load->view('Navigations/DoctorNavbar');
    //         $this->load->view('Doctor/Patient/Reminder');
    //         $this->load->view('Layouts/footer');
    //     } else {
    //         redirect(base_url('D/Login'));
    //     }
    // }


    public function notifications()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {

            $doc = $this->db->query('SELECT * FROM doctor WHERE ID=' . $doctorsession)->row_array();

            $data['active'] = 'notification';
            $data['count'] = $this->Doctor_model->countnotif($doctorsession, $doc['Medical']);
            $data['page_title'] = 'Notifications | Doctor';
            $data['count1'] = $this->Doctor_model->countnotif1($doctorsession, $doc['Medical']);


            $this->Doctor_model->updatenotif($doc['Medical']);

            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/Notifications', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('D/Login'));
        }
    }




    public function profile()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'profile';
            $data['page_title'] = 'Profile | Medical Staff';


            $data['user'] = $this->Doctor_model->fetchuser($doctorsession);
            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/Profile', $data);
            $this->load->view('Layouts/footer');
            $this->session->unset_userdata('change_succ');
        } else {
            redirect(base_url('D/Login'));
        }
    }
    public function login()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            redirect(base_url('D/Appointments'));
        } else {
            $data['page_title'] = 'Login | Medical Staff';

            $this->load->view('Layouts/header', $data);
            $this->load->view('Doctor/Login');
            $this->load->view('Layouts/footer');
        }
    }
    public function chat()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'messages';
            $receiver_id = $this->session->userdata('receiver');
            $data['receiver_id'] = $this->session->userdata('receiver');
            $data['receiver'] = $this->Chat_model->receiverprofile($receiver_id);
            $data['myid'] = $doctorsession;
            $data['page_title'] = 'Message | Medical Staff';


            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/Messages', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('D/Login'));
        }
    }
    public function mainchat()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        if ($doctorsession) {
            $data['active'] = 'messages';
            $receiver_id = $this->session->userdata('receiver');
            $data['receiver_id'] = $this->session->userdata('receiver');
            $data['receiver'] = $this->Chat_model->receiverprofile($receiver_id);
            $data['myid'] = $doctorsession;

            $data['page_title'] = 'Inbox | Medical Staff';

            $this->load->view('Layouts/header', $data);
            $this->load->view('Navigations/DoctorNavbar', $data);
            $this->load->view('Doctor/MainMessage', $data);
            $this->load->view('Layouts/footer');
        } else {
            redirect(base_url('D/Login'));
        }
    }
}
