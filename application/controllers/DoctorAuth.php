<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DoctorAuth extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Doctor_model');
        $this->load->helper('custom');
    }

    public function logout()
    {
        $this->session->unset_userdata('doctor_id');
        redirect(base_url('D/Login'));
    }

    public function login()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $data = $this->Doctor_model->login($email);

        if ($data) {
            if (password_verify($password, $data['Password'])) {
                $this->session->set_userdata('doctor_id', $data['ID']);
                redirect(base_url('D/Appointments'));
            } else {
                $this->session->set_flashdata('email', $email);
                $this->session->set_flashdata('password_error', true);
                redirect(base_url('D/Login'));
            }
        } else {
            echo "Email not found";
        }
    }

    public function checkemailLogin()
    {
        $email = trim($_POST['email']);

        $data = $this->Doctor_model->login($email);
        if ($data) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function addbio()
    {
        $bio = $_POST['bio'];
        $id = $this->session->userdata('doctor_id');

        $res = $this->Doctor_model->addBio($bio, $id);
        if ($res) {
            redirect(base_url('D/Profile'));
        }
    }
    public function approveappointment($id, $patientID)
    {
        $docID = $this->session->userdata('doctor_id');


        $query = $this->db->query('SELECT * FROM doctor WHERE ID=' . $docID)->row_array();
        $this->Doctor_model->approveappointment($id, $docID);

        if ($query['Medical'] === "nurse") {
            $docname = $query['Firstname'] . ' ' . $query['Lastname'] . ', RN';
        } else {
            $docname = 'Dr. ' . $query['Firstname'] . ' ' . $query['Lastname'];
        }

        $pat = $this->db->query('SELECT * FROM patient WHERE ID=' . $patientID)->row_array();

        $emaildata = array(
            'email' => $pat['Email'],
            'subject' => 'Hi! ' . $pat['Firstname'] . ', Your appointment has been approved',
            'content' => 'Your online appointment has been accepted by ' . $docname . '. Visit the <a href="' . base_url() . '">website</a> to talk to your doctor.',
        );
        $this->sendEmail($emaildata);

        $data = array(
            'patient_id' => $patientID,
            'content'    => 'Your online appointment has been accepted by ' . $docname,
            'title'      => 'Appointment approved',
            'type'       => 'appointment',
            'notif_date' =>  date('Y-m-d H:i:s'),
            'declineID'  => $id,
        );




        $this->Doctor_model->insertnotif($data);

        $this->session->set_userdata('success', true);
        redirect(base_url('D/Appointments'));
    }


    public function completeappointment($id, $patientID)
    {
        $docID = $this->session->userdata('doctor_id');

        $query = $this->db->query('SELECT * FROM doctor WHERE ID=' . $docID)->row_array();

        if ($query['Medical'] === "nurse") {
            $docname = 'Nurse ' . $query['Firstname'] . ' ' . $query['Lastname'];
        } else {
            $docname = 'Dr. ' . $query['Firstname'] . ' ' . $query['Lastname'];
        }

        $data = array(
            'patient_id' => $patientID,
            'content'    => 'Your online appointment has been mark as complete by ' . $docname,
            'title'      => 'Appointment completed',
            'type'       => 'appointment',
            'notif_date' =>  date('Y-m-d H:i:s'),
            'declineID'  => $id,
        );

        $pat = $this->db->query('SELECT * FROM patient WHERE ID=' . $patientID)->row_array();

        $link = '<a href="' . base_url('Patient/referral_form/' . $id) . '">' . base_url('Patient/referral_form/' . $id) . '</a>';
        $emaildata = array(
            'email' => $pat['Email'],
            'subject' => 'Hi ' . $pat['Firstname'] . ', Your appointment has been completed',
            'content' => 'Your online appointment has been mark as complete by ' . $docname,
        );
        $this->sendEmail($emaildata);


        $this->Doctor_model->completedappointment($id);
        $this->Doctor_model->insertnotif($data);
        $this->session->set_userdata('complete_success', true);
        redirect(base_url('D/Patient'));
    }
    public function patientList()
    {
    }

    public function declinereason()
    {

        $docID = $this->session->userdata('doctor_id');

        $query = $this->db->query('SELECT * FROM doctor WHERE ID=' . $docID)->row_array();

        if ($query['Medical'] === "nurse") {
            $docname = 'Nurse ' . $query['Firstname'] . ' ' . $query['Lastname'];
        } else {
            $docname = 'Dr. ' . $query['Firstname'] . ' ' . $query['Lastname'];
        }


        $data = array(
            'appointmentID' => $_POST['ID'],
            'reason' => substr(implode(', ', $this->input->post('reason')), 0),
            'others' => trim($_POST['others']),
            'decline_date' => date('Y-m-d g:i a'),
        );


        $id = $this->Doctor_model->declinereason($data, $_POST['ID']);

        $data1 = array(
            'patient_id' => $_POST['patientid'],
            'content'    => 'Your online appointment has been declined by ' . $docname,
            'title'      => 'Appointment declined',
            'type'       => 'appointment',
            'notif_date' =>  date('Y-m-d H:i:s'),
            'declineID'  => $_POST['ID'],
        );

        $this->Doctor_model->insertnotif($data1);

        $pat = $this->db->query('SELECT * FROM patient WHERE ID=' . $_POST['patientid'])->row_array();

        $link = '<a href="' . base_url('Patient/referral_form/' . $id) . '">' . base_url('Patient/referral_form/' . $id) . '</a>';
        $emaildata = array(
            'email' => $pat['Email'],
            'subject' => 'Hi ' . $pat['Firstname'] . ', Your appointment has been declined',
            'content' => 'Your online appointment has been declined by ' . $docname . '. Login to your account to review details',
        );
        $this->sendEmail($emaildata);

        $this->session->set_userdata('declinesuccess', true);
        redirect(base_url('D/Appointments'));
    }

    public function referralForm()
    {

        $docID = $this->session->userdata('doctor_id');

        $query = $this->db->query('SELECT * FROM doctor WHERE ID=' . $docID)->row_array();

        if ($query['Medical'] === "nurse") {
            $docname = 'Nurse ' . $query['Firstname'] . ' ' . $query['Lastname'];
        } else {
            $docname = 'Dr. ' . $query['Firstname'] . ' ' . $query['Lastname'];
        }


        $data = array(
            'appointmentID' => $_POST['ID'],
            'doctor_name' => $docname,
            'name' => $_POST['name'],
            'contact' => $_POST['contact'],
            'address' => $_POST['address'],
            'signature' => $query['signature'],
            'reason' => substr(implode(', ', $this->input->post('referralreason')), 0),
            'others' => $_POST['others'],
            'referral_date' => date('Y-m-d g:i a'),
        );


        $id = $this->Doctor_model->referralform($data, $_POST['ID']);

        $data1 = array(
            'patient_id' => $_POST['patientid'],
            'content'    => $docname . ' has sent you a referral form',
            'title'      => 'Referral Form',
            'type'       => 'referral',
            'notif_date' =>  date('Y-m-d H:i:s'),
            'declineID'  => $id,
        );
        $this->Doctor_model->insertnotif($data1);
        $pat = $this->db->query('SELECT * FROM patient WHERE ID=' . $_POST['patientid'])->row_array();

        $link = '<a href="' . base_url('Patient/referral_form/' . $id) . '">' . base_url('Patient/referral_form/' . $id) . '</a>';
        $emaildata = array(
            'email' => $pat['Email'],
            'subject' => 'Hi ' . $pat['Firstname'] . ', You have a referral form',
            'content' => $docname . ' has sent you a referral form. Here\'s the download link for the copy of your referral form ' . $link,
        );
        $this->sendEmail($emaildata);




        $this->session->set_userdata('referralsuccess', true);
        redirect(base_url('D/Appointments'));
    }
    public function addnote()
    {
        $id = $_POST['ID'];
        $note = trim($_POST['note']);


        $res = $this->Doctor_model->addnote($note, $id);

        $this->session->set_flashdata('addnotesuccess', true);
        redirect(base_url('D/ViewPatient/' . $id));
    }

    public function selectdate()
    {
        $date = $_POST['date'];
        $apptype = $_POST['apptype'];

        $res = $this->Doctor_model->selectdate($date, $apptype);

        if ($res->num_rows() > 0) {
            $val = $res->result_array();
            foreach ($val as $time) {
                $array[] =  $time['app_time'];
            }
        } else {
            $array = 0;
        }
        echo json_encode($array);
    }

    public function insertdoctorapp()
    {


        $docID = $this->session->userdata('doctor_id');

        $query = $this->db->query('SELECT * FROM doctor WHERE ID=' . $docID)->row_array();

        if ($query['Medical'] === "nurse") {
            $docname = 'Nurse ' . $query['Firstname'] . ' ' . $query['Lastname'];
        } else {
            $docname = 'Dr. ' . $query['Firstname'] . ' ' . $query['Lastname'];
        }

        switch ($_POST['apptime']) {
            case '800':
                $time = '8:00 AM';
                break;
            case '900':
                $time = '9:00 AM';
                break;
            case '1000':
                $time = '10:00 AM';
                break;
            case '1100':
                $time = '11:00 AM';
                break;
            case '100':
                $time = '1:00 PM';
                break;
            case '200':
                $time = '2:00 PM';
                break;
            case '300':
                $time = '3:00 PM';
                break;
            case '400':
                $time = '4:00 PM';
                break;
            default:
                $time = 'Invalid Time';
                break;
        }
        $pat = $this->db->query('SELECT * FROM patient WHERE ID=' . $_POST['patientid'])->row_array();


        $data1 = array(
            'patientID'         =>  $_POST['patientid'],
            'appID'             =>  $_POST['id'],
            'doctorID'          =>  $this->session->userdata('doctor_id'),
            'firstname'         =>  $_POST['firstname'],
            'lastname'          =>  $_POST['lastname'],
            'middlename'        =>  $_POST['middlename'],
            'birthday'          =>  $_POST['birthday'],
            'gender'            =>  $_POST['gender'],
            'patientType'       =>  $_POST['patientType'],
            'appointmentType'   =>  $_POST['apptype'],
            'app_date'          =>  $_POST['appdate'],
            'app_time'          =>  $_POST['apptime'],
        );

        $res = $this->Doctor_model->insertdoctorapp($data1);

        $data = array(
            'patient_id' => $_POST['patientid'],
            'content'    => $docname . ' set a meet-up appointment on ' . $_POST['appdate'] . ' at ' . $time,
            'title'      => 'New appointment',
            'type'       => 'appointment',
            'notif_date' =>  date('Y-m-d H:i:s'),
            'declineID'  => $res
        );

        $link = '<a href="' . base_url('Patient/printdocc/' . $res) . '">' . base_url('Patient/printdocc/' . $res) . '</a>';
        $emaildata = array(
            'email' => $pat['Email'],
            'subject' => 'Hi ' . $pat['Firstname'] . ', You have a new appointment',
            'content' => $docname . ' set a meet-up appointment on ' . $_POST['appdate'] . ' at ' . $time . '. Here\'s the download link for the copy of your appointment slip ' . $link,
        );
        $this->sendEmail($emaildata);


        $this->Doctor_model->insertnotif($data);


        $this->Doctor_model->updateApp($_POST['id'], $res);



        $this->session->set_userdata('successnewapp', true);
        redirect(base_url('D/ViewPatient/' . $_POST['id']));
    }

    public function changeSchedule()
    {

        $doctorID = $_POST['doctorID'];
        $doc = $this->db->query('SELECT * FROM doctor WHERE ID=' . $doctorID)->row_array();
        $fn = '';
        if ($doc['Medical'] !== "nurse") {
            $fn = 'Dr. ';
        }

        $docname = $fn . $doc['Lastname'] . ', ' . $doc['Firstname'] . ' ' . $doc['Middlename'];

        $monday = (isset($_POST['monday'])) ? 'yes' : 'no';
        $mfrom = $_POST['mondayfrom'];
        $mto = $_POST['mondayto'];

        $tuesday = (isset($_POST['tuesday'])) ? 'yes' : 'no';
        $tfrom = $_POST['tuesdayfrom'];
        $tto = $_POST['tuesdayto'];

        $wednesday = (isset($_POST['wednesday'])) ? 'yes' : 'no';
        $wfrom = $_POST['wednesdayfrom'];
        $wto = $_POST['wednesdayto'];

        $thursday = (isset($_POST['thursday'])) ? 'yes' : 'no';
        $thfrom = $_POST['thursdayfrom'];
        $thto = $_POST['thursdayto'];

        $friday = (isset($_POST['friday'])) ? 'yes' : 'no';
        $ffrom = $_POST['fridayfrom'];
        $fto = $_POST['fridayto'];

        $data = array(
            'monday' => $monday . ',' . $mfrom . ',' . $mto,
            'tuesday' => $tuesday . ',' . $tfrom . ',' . $tto,
            'wednesday' => $wednesday . ',' . $wfrom . ',' . $wto,
            'thursday' => $thursday . ',' . $thfrom . ',' . $thto,
            'friday' => $friday . ',' . $ffrom . ',' . $fto,
        );
        $gnd = "his";
        if ($doc['Gender'] === "Female") {
            $gnd = 'her';
        }
        $data1 = array(
            'doctor_id' => $doctorID,
            'notif_title' => $docname . ' updated ' . $gnd . ' schedule',
            'notif_date' => date('Y-m-d H:i:s'),
            'status' => 'unread',
        );
        $this->Doctor_model->insertAdminNotif($data1);
        $res = $this->Doctor_model->updateSchedule($data, $doctorID);

        if ($res) {
            $this->session->set_userdata('change_succ', true);
            redirect(base_url('D/Profile'));
        }
    }
    public function countNotif()
    {
        $myid = $this->session->userdata('doctor_id');

        $doc = $this->db->query('SELECT * FROM doctor WHERE ID=' . $myid)->row_array();
        echo $this->Doctor_model->countnotif($myid, $doc['Medical']);
    }
    public function fetchNotification()
    {
        $myid = $this->session->userdata('doctor_id');

        $doc = $this->db->query('SELECT * FROM doctor WHERE ID=' . $myid)->row_array();
        $start = $this->input->post('start');

        $res = $this->Doctor_model->fetchNotification($start, $doc['Medical']);

        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $data) {
                $output[] = array(
                    'id'    => $data['ID'],
                    'title' => $data['notif_title'],
                    'type'  =>  $data['notif_type'],
                    'status' => $data['notif_status'],
                    'time' => get_time_ago(strtotime($data['notif_date'])),
                    'appID'  =>  $data['notif_appID'],
                    'apptype'  =>  $data['notif_apptype'],
                    'start' => $this->input->post('start'),
                );
            }
        } else {
            $output = 0;
        }
        echo json_encode($output);
    }

    // public function sendEmail($data)
    // {
    //     $to = $data['email'];
    //     $from = 'brgysanisidro31@gmail.com';
    //     $fromName = 'Barangay San Isidro Health Center';

    //     $subject = $data['subject'];

    //     $htmlContent = $data['content'];
    //     // Set content-type header for sending HTML email 
    //     $headers = "MIME-Version: 1.0" . "\r\n";
    //     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //     // Additional headers 
    //     $headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";

    //     // Send email 
    //     mail($to, $subject, $htmlContent, $headers);
    // }

    function sendEmail($data)
    {
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
        $mail->addAddress($data['email']);

        // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Email subject
        $mail->Subject = $data['subject'];

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $data['content'];
        $mail->Body = $mailContent;
        $mail->send();
    }
}
