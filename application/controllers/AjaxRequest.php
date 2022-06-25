<?php

use Shuchkin\SimpleXLSX;


defined('BASEPATH') or exit('No direct script access allowed');


require_once APPPATH . "/third_party/SimpleXLSX.php";


class AjaxRequest extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('icons');
        $this->load->library('session');
        $this->load->helper('custom');
        $this->load->model('Patient_model');
        $this->load->model('Admin_model');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->model('Healthworker_model', 'Health');
    }



    public function timestamp()
    {
        echo date('l, F j - g:i:s A');
    }
    public function patientAppointmentAjax()
    {
        $id = $this->session->userdata('patient_id');
        // if ($this->input->post('status')) {
        $res = $this->Patient_model->fetchapplist($id, $this->input->post('status'));
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $data = array();

        foreach ($res->result_array() as $r) {
            $fullname = $r['lastname'] . ', ' . $r['firstname'] . ' ' . $r['middlename'];

            switch ($r['app_time']) {
                case 830:
                    $time = "8:30 AM";
                    break;
                case 930:
                    $time = "9:30 AM";
                    break;
                case 1030:
                    $time = "10:30 AM";
                    break;
                case 1130:
                    $time = "11:30 AM";
                    break;
                case 130:
                    $time = "1:30 PM";
                    break;
                case 230:
                    $time = "2:30 PM";
                    break;
                case 330:
                    $time = "3:30 PM";
                    break;
                case 430:
                    $time = "4:30 PM";
                    break;
                default:
                    $time = "wrong time";
            }

            $data[] = array(
                'id' => $r['ID'],
                'name' => $fullname,
                'date' => $r['app_date'],
                'time' => $time,
                'patientType' => 'For ' . ucfirst($r['type']),
                'appType' => ucfirst($r['app_type']),
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $res->num_rows(),
            "recordsFiltered" => $res->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();

        // if ($res->num_rows() > 0) {
        //     foreach ($res->result_array() as $data) {
        //         $fullname = $data['lastname'] . ', ' . $data['firstname'] . ' ' . $data['middlename'];

        //         switch ($data['app_time']) {
        //             case 830:
        //                 $time = "8:30 AM";
        //                 break;
        //             case 930:
        //                 $time = "9:30 AM";
        //                 break;
        //             case 1030:
        //                 $time = "10:30 AM";
        //                 break;
        //             case 1130:
        //                 $time = "11:30 AM";
        //                 break;
        //             case 130:
        //                 $time = "1:30 PM";
        //                 break;
        //             case 230:
        //                 $time = "2:30 PM";
        //                 break;
        //             case 330:
        //                 $time = "3:30 PM";
        //                 break;
        //             case 430:
        //                 $time = "4:30 PM";
        //                 break;
        //             default:
        //                 $time = "wrong time";
        //         }


        //         $output[] = array(
        //             'name' => $fullname,
        //             'date' => $data['app_date'],
        //             'time' => $time,
        //             'patientType' => $data['type'],
        //             'appType' => $data['app_type'],
        //         );
        //     }
        // }
        // echo json_encode($output);
        // }
    }

    public function countAppointment()
    {
        $id = $this->session->userdata('patient_id');
        $res = $this->Patient_model->fetchapplist($id, $this->input->post('status'));
        echo $res->num_rows();
    }
    function upload()
    {
        $filesop = [];
        $file = $_FILES['csv']['tmp_name'];

        $x = SimpleXLSX::parse($file);
        if ($x) {
            $fields = $x->rows();
        }

        $colxlsx = count($x->rows()[0]);
        if ($colxlsx === 6) {
            $c = 0; //
            $i = 0;
            $this->Admin_model->truncaterecord();

            foreach ($fields as $filesop) {
                $data = array(
                    'ID_number' => $filesop[0],
                    'Firstname' => $filesop[1],
                    'Lastname' => $filesop[2],
                    'Middlename' => $filesop[3],
                    'Address' => $filesop[4],
                    'Year' => $filesop[5]
                );
                if ($c != 0) {
                    $this->Admin_model->saverecords($data);
                    $i = $i + 1;
                }
                $c = $c + 1;
            }

            $this->session->set_flashdata('success_import', true);
            redirect(base_url('Admin/ResidentsList'));
        } else {
            $this->session->set_userdata('error_import', true);
            redirect(base_url('Admin/ResidentsList'));
        }
    }
    function updateServices()
    {
        $filesop = [];
        $file = $_FILES['csv']['tmp_name'];
        $service = $_POST['services'];
        $x = SimpleXLSX::parse($file);
        if ($x) {
            $fields = $x->rows();
        }
        $colxlsx = count($x->rows()[0]);
        if ($colxlsx === 2) {

            $c = 0; //
            $i = 0;
            $this->Admin_model->truncateServices($service);
            foreach ($fields as $filesop) {
                $data = array(
                    'Name' => $filesop[0],
                    'Description' => $filesop[1],
                );
                if ($c != 0) {
                    $this->Admin_model->saverecordservices($data, $service);
                    $i = $i + 1;
                }
                $c = $c + 1;
            }

            $ad = $this->session->userdata('admin');
            $adminname = $ad['Firstname'] . ' ' . $ad['Middlename'] . ' ' . $ad['Lastname'];
            $history = array(
                'Name' => $adminname,
                'Action' => 'Updated ' . ucfirst($service) . ' services list',
                'Action_date' =>  date('Y-m-d H:i:s'),
            );

            $this->Admin_model->adminHistory($history);


            $this->session->set_userdata('success_import', true);
            redirect(base_url('Admin/Dashboard'));
        } else {
            $this->session->set_userdata('error_import', true);
            redirect(base_url('Admin/Dashboard'));
        }
    }

    function importHW()
    {
        $filesop = [];
        $file = $_FILES['csv']['tmp_name'];
        $x = SimpleXLSX::parse($file);
        if ($x) {
            $fields = $x->rows();
        }
        $colxlsx = count($x->rows()[0]);
        if ($colxlsx === 6) {

            $c = 0; //
            $i = 0;
            $this->Admin_model->truncaterecordHW();
            foreach ($fields as $filesop) {
                $data = array(
                    'ID_number' => $filesop[0],
                    'Firstname' => $filesop[1],
                    'Lastname' => $filesop[2],
                    'Email' => $filesop[3],
                    'Contact' => $filesop[4],
                    'Address' => $filesop[5],
                );
                if ($c != 0) {
                    $this->Admin_model->saverecordsHW($data);
                    $i = $i + 1;
                }
                $c = $c + 1;
            }

            $ad = $this->session->userdata('admin');
            $adminname = $ad['Firstname'] . ' ' . $ad['Middlename'] . ' ' . $ad['Lastname'];
            $history = array(
                'Name' => $adminname,
                'Action' => 'Updated health worker list',
                'Action_date' =>  date('Y-m-d H:i:s'),
            );

            $this->Admin_model->adminHistory($history);

            $this->session->set_flashdata('success_import', true);
            redirect(base_url('Admin/ViewHealthWorker'));
        } else {
            $this->session->set_flashdata('error_import', true);
            redirect(base_url('Admin/ViewHealthWorker'));
        }
    }


    public function adminRegisteredList()
    {
        // if ($this->input->post('status')) {
        $res = $this->Admin_model->fetchRegistered1();
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $data = array();

        foreach ($res->result_array() as $r) {
            $fullname = $r['Lastname'] . ', ' . $r['Firstname'] . ' ' . $r['Middlename'];

            if ($r['Profile'] === "" || $r['Profile'] === null) {
                $image = base_url('assets/images/profile.png');
            } else {
                $image = base_url('uploads/Patient/Profile/' . $r['Profile']);
            }
            $data[] = array(
                'idnumber' => $r['ID_number'],
                'name' => $fullname,
                'bday' => $r['Birthday'],
                'email' => $r['Email'],
                'contact' => $r['Contact'],
                'gender' => $r['Gender'],
                'address' => $r['Address'],
                'created_at' => $r['Created_at'],
                'profile' => $image,
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $res->num_rows(),
            "recordsFiltered" => $res->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function walkinPatient()
    {
        // if ($this->input->post('status')) {
        $res = $this->Health->fetchWalkin();
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $data = array();

        foreach ($res->result_array() as $r) {
            $fullname = $r['Lastname'] . ', ' . $r['Firstname'] . ' ' . $r['Middlename'];

            $data[] = array(
                'name' => $fullname,
                'email' => $r['Email'],
                'contact' => $r['Contact'],
                'address' => $r['Address'],
                'created_at' => $r['created_at'],
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $res->num_rows(),
            "recordsFiltered" => $res->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }


    public function emailscan()
    {
        $email = trim($_POST['email']);
        $res = $this->db->query('SELECT * FROM patient WHERE Email="' . $email . '"');

        if ($res->num_rows() > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function emailcorrect()
    {
        $email = $_POST['email'];
        $this->sendResetEmail($email, 'patient');
        redirect(base_url('P/SuccessEmailSent/' . $email));
    }


    // public function sendResetEmail($email, $type)
    // {
    //     $user = $this->Patient_model->nameEmail($email);

    //     $name = $user['Firstname'];
    //     $linkID = hexdec(uniqid());

    //     $data = array(
    //         'patientID'  => $user['ID'],
    //         'linkID'        => $linkID,
    //         'time'          => time(),
    //         'usertype' => $type
    //     );

    //     $this->Patient_model->resetCode($data);

    //     $to = $email;
    //     $from = 'brgysanisidro31@gmail.com';
    //     $fromName = 'Barangay San Isidro Health Center';

    //     $subject = "Hi! " . $name . ", This is your password reset link";

    //     $htmlContent = 'Here is the link for your password reset ' . base_url('P/ForgotPassword/' . $email . '/' . $linkID);
    //     // Set content-type header for sending HTML email 
    //     $headers = "MIME-Version: 1.0" . "\r\n";
    //     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //     // Additional headers 
    //     $headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";

    //     // Send email 
    //     mail($to, $subject, $htmlContent, $headers);
    // }

    function sendResetEmail($email, $type)
    {

        $user = $this->Patient_model->nameEmail($email);

        $name = $user['Firstname'];
        $linkID = hexdec(uniqid());

        $data = array(
            'patientID'  => $user['ID'],
            'linkID'        => $linkID,
            'time'          => time(),
            'usertype' => $type
        );
        $this->Patient_model->resetCode($data);
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'brgysanisidro31@gmail.com';
        $mail->Password = 'zrojnfmzwcahkhxp';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('brgysanisidro31@gmail.com', 'Barangay San Isidro Health Center');
        // $mail->addReplyTo('info@example.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress($email);

        // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Email subject
        $mail->Subject = "Hi! " . $name . ", This is your password reset link";

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = 'Here is the link for your password reset ' . base_url('P/ForgotPassword/' . $email . '/' . $linkID);;
        $mail->Body = $mailContent;
        $mail->send();
    }

    public function changepass()
    {
        $confpassword = $_POST['confirm_password'];
        $hashpass = password_hash($confpassword, PASSWORD_DEFAULT);
        $email = trim($_POST['email']);
        $linkid = $_POST['linkid'];


        if (isset($_POST['change'])) {

            $res = $this->Patient_model->changepassuser($email, $hashpass);
            if ($res) {
                $this->Patient_model->deleteresetlink($linkid);
                redirect(base_url('Patient/successchange'));
            }
        }
    }
}
