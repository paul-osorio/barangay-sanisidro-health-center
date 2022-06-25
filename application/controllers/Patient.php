<?php
defined('BASEPATH') or exit('No direct script access allowed');




class Patient extends CI_Controller
{
	public  function __construct()
	{
		parent::__construct();
		$this->load->helper('icons');
		$this->load->helper('custom');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Patient_model');
		$this->load->model('Pchat_model');
		$this->session->keep_flashdata('insert_success');
	}

	public function index()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['user'] = $this->Patient_model->fetchuser($patientsession);
			$data['active'] = 'healthservice';
			$data['app'] = $this->Patient_model->fetchapp($patientsession);
			$data['page_title'] = 'Health Service | Patient';


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/HealthService', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}
	public function formyself()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {

			$data['active'] = 'healthservice';

			$data['user'] = $this->Patient_model->fetchuser($patientsession);
			$data['page_title'] = 'For Myself | Patient';



			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ForMyself', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}
	public function forpedia()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'healthservice';
			$type = 'pedia';
			$data['profile'] = $this->Patient_model->fetchprofile($patientsession, $type);
			$data['page_title'] = 'For Pedia | Patient';


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ForPedia', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}
	public function forpedia2($id)
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'healthservice';
			$data['user'] = $this->Patient_model->fetchOneProfile($id);
			$data['immuno'] = $this->Patient_model->fetchimmuno();
			$data['page_title'] = 'For Pedia - Appointment | Patient';


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ForPedia2', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}

	public function forgotpasswordemail()
	{
		$patientsession = $this->session->userdata('patient_id');
		if (!$patientsession) {
			$data['page_title'] = 'Reset Password Link | Patient';

			$this->load->view('Layouts/header', $data);
			$this->load->view('Patient/PasswordReset//ForgotPasswordEmail');
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/HealthService'));
		}
	}

	public function forgotpassword($email, $link)
	{
		$patientsession = $this->session->userdata('patient_id');
		if (!$patientsession) {



			$resp = $this->Patient_model->getResetLink($link);

			if ($resp->num_rows() > 0) {
				if (time() > ($resp->row_array()['time'] + 340)) {
					$data['page_title'] = 'Expired Link';

					$this->load->view('Layouts/header', $data);
					$this->load->view('Patient/PasswordReset/ExpiredLink');
					$this->load->view('Layouts/footer');
				} else {
					$data['email'] = $email;
					$data['linkID'] = $link;
					$data['page_title'] = 'Forgot Password';

					$this->load->view('Layouts/header', $data);
					$this->load->view('Patient/PasswordReset/ForgotPassword', $data);
					$this->load->view('Layouts/footer');
				}
			} else {
				$data['page_title'] = 'Expired Link';

				$this->load->view('Layouts/header', $data);
				$this->load->view('Patient/PasswordReset/ExpiredLink');
				$this->load->view('Layouts/footer');
			}
		} else {
			redirect(base_url('P/HealthService'));
		}
	}


	public function successchange()
	{
		$patientsession = $this->session->userdata('patient_id');
		if (!$patientsession) {
			$data['page_title'] = 'Success Password Change';

			$this->load->view('Layouts/header', $data);
			$this->load->view('Patient/PasswordReset/SuccessChange');
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/HealthService'));
		}
	}
	public function forgotemailsent($email)
	{
		$patientsession = $this->session->userdata('patient_id');
		if (!$patientsession) {
			$data['email'] = $email;
			$data['page_title'] = 'Email Sent';

			$this->load->view('Layouts/header', $data);
			$this->load->view('Patient/PasswordReset/ForgotEmailSent', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/HealthService'));
		}
	}
	public function viewapp($id)
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'healthservice';
			$data['user'] = $this->db->query('SELECT * FROM appointment WHERE ID=' . $id)->row_array();
			$user = $this->db->query('SELECT * FROM appointment WHERE ID=' . $id)->row_array();

			$array = array(
				'status' => 'complete',
				'firstname' => $user['firstname'],
				'lastname' => $user['lastname'],
				'birthday' => $user['birthday'],
			);

			$data['app'] = $this->Patient_model->fetchprevapp($array);
			$data['page_title'] = 'View History | Patient';

			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ViewHistory', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}



	public function forothers()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'healthservice';
			$data['page_title'] = 'For Others | Patient';

			$data['profile'] = $this->Patient_model->fetchprofile($patientsession, 'others');


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ForOthers', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}

	public function forothers2($id)
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'healthservice';
			$data['user'] = $this->Patient_model->fetchOneProfile($id);
			$data['page_title'] = 'For Others - Appointment | Patient';


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ForOthers2', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}

	public function notifications()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'notification';
			$data['count'] = $this->Patient_model->countnotif($patientsession);
			$data['page_title'] = 'Notifications | Patient';
			$data['count1'] = $this->Patient_model->countnotif1($patientsession);


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/Notifications', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}




	public function doctorsetappoint($id)
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'healthservice';
			$data['appoint'] = $this->Patient_model->fetchpatient($id);
			$data['page_title'] = 'Set Appointment | Patient';
			$data['id'] = $patientsession;

			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ViewSetAppointment', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}




	public function viewnotification($id)
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'notification';
			$data['notif'] = $this->Patient_model->fetchOneNotif($id);
			$data['page_title'] = 'View Notifications | Patient';
			$this->db->query('UPDATE patient_notification SET status="read" WHERE ID=' . $id);


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/ViewNotification', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}
	public function login()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			redirect(base_url('P/HealthService'));
		} else {
			$data['page_title'] = 'Login | Patient';

			$this->load->view('Layouts/header', $data);
			$this->load->view('Patient/Login');
			$this->load->view('Layouts/footer');
		}
	}
	public function register()
	{
		$data['page_title'] = 'Register | Patient';

		$this->load->view('Layouts/header', $data);
		$this->load->view('Patient/Register');
		$this->load->view('Layouts/footer');
	}

	public function registersuccess()
	{
		$data['page_title'] = 'Success Register | Patient';

		$this->load->view('Layouts/header', $data);
		$this->load->view('Patient/SuccessRegister');
		$this->load->view('Layouts/footer');
	}

	public function account()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'account';
			$data['user'] = $this->Patient_model->fetchuser($patientsession);
			$data['page_title'] = 'Account | Patient';


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/Account', $data);
			$this->load->view('Layouts/footer');

			$arrtem = array('changepass_success', 'edit_success');
			$this->session->unset_userdata($arrtem);
		} else {
			redirect(base_url('P/Login'));
		}
	}



	// public function generate_to_pdf()
	// {
	// 	$this->load->library('pdf');
	// 	$this->pdf->load_view('example_to_pdf');
	// 	$this->pdf->render();
	// 	$this->pdf->stream("name-file.pdf");
	// }

	// public function referral_form($id)
	// {
	// 	$this->load->view('referral_form');
	// }

	public function referral_form($id)
	{
		$res = $this->db->query('SELECT * FROM referral_form WHERE ID=' . $id)->row_array();
		$data['refer'] = $res;
		$filename = $res['name'] . ' - Referral Form.pdf';

		$this->load->view('referral_form', $data);

		// Get output html
		$html = $this->output->get_output();

		// Load pdf library
		$this->load->library('pdf');

		// Load HTML content
		$this->dompdf->loadHtml($html);


		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('legal', 'portrait');

		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream($filename, array("Attachment" => true));
	}
	public function printdoc($id)
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'healthservice';
			$data['appoint'] = $this->Patient_model->fetchpatient($id);
			$data['page_title'] = 'Set Appointment | Patient';

			$this->load->view('Layouts/header', $data);
			$this->load->view('Patient/printdoc', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}


	public function printdocc($id)
	{
		$data['appoint'] = $this->Patient_model->fetchpatient($id);
		$appoint = $this->Patient_model->fetchpatient($id);
		$filename = $appoint['lastname'] . '_' . $appoint['firstname'] . ' - APPOINTMENT_SLIP.pdf';


		$this->load->view('Patient/printdoc', $data);

		// Get output html
		$html = $this->output->get_output();

		// Load pdf library
		$this->load->library('pdf');

		// Load HTML content
		$this->dompdf->loadHtml($html);


		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('legal', 'portrait');

		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream($filename, array("Attachment" => true));
	}

	public function mainchat()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'messages';
			$receiver_id = $this->session->userdata('receiver1');
			$data['receiver_id'] = $this->session->userdata('receiver1');
			$data['receiver'] = $this->Pchat_model->receiverprofile($receiver_id);
			$data['myid'] = $patientsession;
			$data['page_title'] = 'Inbox | Patient';


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/MainMessage', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}

	public function chat()
	{
		$patientsession = $this->session->userdata('patient_id');
		if ($patientsession) {
			$data['active'] = 'messages';
			$receiver_id = $this->session->userdata('receiver1');
			$data['receiver_id'] = $this->session->userdata('receiver1');
			$data['receiver'] = $this->Pchat_model->receiverprofile($receiver_id);
			$data['myid'] = $patientsession;
			$data['page_title'] = 'Messages | Patient';


			$this->load->view('Layouts/header', $data);
			$this->load->view('Navigations/PatientNavbar', $data);
			$this->load->view('Patient/Messages', $data);
			$this->load->view('Layouts/footer');
		} else {
			redirect(base_url('P/Login'));
		}
	}
}
