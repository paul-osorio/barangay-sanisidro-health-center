<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DoctorChat extends CI_Controller
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
    public  function setReceiverSession($id)
    {
        $this->session->set_userdata('receiver', $id);
        redirect(base_url('D/OpenMessages'));
    }
    public function setReceiverSessionAjax()
    {
        $id = $_POST['ID'];
        $this->session->set_userdata('receiver', $id);
    }

    // public function chat()
    // {
    //     $doctorsession = $this->session->userdata('doctor_id');
    //     if ($doctorsession) {
    //         $data['active'] = 'messages';
    //         $receiver_id = $this->session->userdata('receiver');
    //         $data['receiver_id'] = $this->session->userdata('receiver');
    //         $data['receiver'] = $this->Chat_model->receiverprofile($receiver_id);
    //         $data['myid'] = $doctorsession;

    //         $this->load->view('Layouts/header');
    //         $this->load->view('Navigations/DoctorNavbar', $data);
    //         $this->load->view('Doctor/Messages', $data);
    //         $this->load->view('Layouts/footer');
    //     } else {
    //         redirect(base_url('D/Login'));
    //     }
    // }
    // public function mainchat()
    // {
    //     $doctorsession = $this->session->userdata('doctor_id');
    //     if ($doctorsession) {
    //         $data['active'] = 'messages';
    //         $receiver_id = $this->session->userdata('receiver');
    //         $data['receiver_id'] = $this->session->userdata('receiver');
    //         $data['receiver'] = $this->Chat_model->receiverprofile($receiver_id);
    //         $data['myid'] = $doctorsession;

    //         $this->load->view('Layouts/header');
    //         $this->load->view('Navigations/DoctorNavbar', $data);
    //         $this->load->view('Doctor/MainMessage', $data);
    //         $this->load->view('Layouts/footer');
    //     } else {
    //         redirect(base_url('D/Login'));
    //     }
    // }

    public function send_chat()
    {
        if ($this->input->post('receiver_id')) {


            if ($_FILES['messageimg']['size'] == 0) {

                $filename = "";
            } else {

                $this->load->library('upload');
                $message_config['upload_path']          = './uploads/Messages';
                $message_config['allowed_types']        = 'jpeg|jpg|png';
                $message_filename = $_FILES['messageimg']['name'];
                $message_ext = pathinfo($message_filename, PATHINFO_EXTENSION);
                $message_config['file_name']        = md5($this->input->post('replyid')) . time();
                $this->upload->initialize($message_config);
                $this->upload->do_upload('messageimg');
                $filename = md5($this->input->post('replyid')) . time() . '.' . $message_ext;
            }


            $data = array(
                'sender_id'  => $this->session->userdata('doctor_id'),
                'receiver_id' => $this->input->post('receiver_id'),
                'chat_messages_text' => $this->input->post('chat_message'),
                'chat_messages_status' => 'unread',
                'chat_messages_datetime' => date('Y-m-d H:i:s'),
                'replyID' => $this->input->post('replyid'),
                'sender_type' => 'doctor',
                'receiver_type' => 'patient',
                'images' => $filename

            );

            $this->Chat_model->insertNewChat($data);
        }
    }






    public function load_chat_user()
    {
        if ($this->input->post('action')) {
            $sender_id = $this->session->userdata('doctor_id');
            $receiver_id = '';
            $myid = '';
            $data = $this->Chat_model->fetchUser($sender_id);

            if ($data->num_rows() > 0) {

                foreach ($data->result() as $row) {
                    if ($row->sender_id == $sender_id) {
                        $res = $this->db->query('SELECT * FROM patient WHERE ID=' . $row->receiver_id)->row_array();
                        $who = $res['Firstname'];

                        $receiver_id = $row->receiver_id;
                    } else {
                        $who = 'You';

                        $receiver_id = $row->sender_id;
                    }
                    $data1 = $this->Chat_model->fetchUser1($receiver_id);

                    if ($data1['sender_id'] === $sender_id) {
                        $myid = true;
                    } else {
                        $myid = false;
                    }

                    $lastchat = $this->Chat_model->fetchLastChat($sender_id, $receiver_id);
                    $userdata = $this->Chat_model->getUser($receiver_id);
                    $hasProfile = '';
                    if ($userdata['Profile'] === "" || $userdata['Profile'] === null) {
                        $hasProfile = false;
                    } else {
                        $hasProfile = true;
                    }

                    $output[] = array(
                        'receiver_id'  => $receiver_id,
                        'mymess' => $myid,
                        'firstname'  => $userdata['Firstname'],
                        'lastname'   => $userdata['Lastname'],
                        'hasProfile' => $hasProfile,
                        'profile' => $userdata['Profile'],
                        'lastchat' => $lastchat['chat_messages_text'],
                        'chatstatus' => $lastchat['chat_messages_status'],
                        'image' => $lastchat['images'],
                        'who' => $who

                    );
                }
            } else {
                $output = 0;
            }
            // echo $lastchat;
            echo json_encode($output);
        }
    }

    public function checkunread()
    {
        $sender_id = $this->session->userdata('doctor_id');
        $res = $this->Chat_model->checkUnread($sender_id);

        echo json_encode($res->num_rows());
    }


    public function load_chat_data()
    {
        if ($this->input->post('receiver_id')) {
            $receiver_id = $this->input->post('receiver_id');
            $sender_id = $this->session->userdata('doctor_id');
            if ($this->input->post('update_data') == 'read') {
                $this->Chat_model->readMessage($sender_id, $receiver_id);
            }

            $chat_data = $this->Chat_model->fetchChat($sender_id, $receiver_id);
            if ($chat_data->num_rows() > 0) {
                // echo 'hi';

                $rest2 = '';
                $rest = '';
                foreach ($chat_data->result() as $row) {

                    $message_direction = '';
                    if ($row->sender_id == $sender_id) {
                        if ($row->replyID == 0) {
                            $rest = 'yourself';
                        } else {
                            $res1t = $this->Chat_model->fetchreplymess($row->replyID)['sender_id'];
                            if ($res1t === $receiver_id) {
                                $rest = $this->db->query('SELECT * FROM patient WHERE ID=' . $receiver_id)->row_array()['Firstname'];
                            } else {
                                $rest = 'yourself';
                            }
                        }
                        $name = 'yourself';
                        $message_direction = 'right';
                    } else {
                        if ($row->replyID == 0) {
                            $rest2 = 'yourself';
                        } else {
                            $res1t2 = $this->Chat_model->fetchreplymess($row->replyID)['sender_id'];
                            if ($res1t2 === $receiver_id) {
                                $rest2 = 'themself';
                            } else {
                                $rest2 = 'you';
                            }
                        }
                        $res = $this->db->query('SELECT * FROM patient WHERE ID=' . $receiver_id)->row_array();
                        $name = $res['Firstname'];
                        $message_direction = 'left';
                    }
                    $date = date('g:i a', strtotime($row->chat_messages_datetime));

                    if ($row->replyID == 0) {
                        $replymessage = '';
                    } else {
                        $resimg = $this->Chat_model->fetchreplymess($row->replyID);
                        $replymessage = '';
                        if ($resimg['images'] === "" || $resimg['images'] === null) {
                            $replymessage = $resimg['chat_messages_text'];
                        } else {
                            $replymessage = '<i class="fas fa-image"></i> image';
                        }
                    }

                    $output[] = array(
                        'replyTo' => $name,
                        'replyID' => $row->chat_message_id,
                        'chat_messages_text' => $row->chat_messages_text,
                        'chat_messages_datetime' => $date,
                        'message_direction'  => $message_direction,
                        'isReply' => $row->replyID,
                        'replymessage' => $replymessage,
                        'name' => $rest,
                        'names' => $rest2,
                        'image' => $row->images,
                    );
                }
            }
            echo json_encode($output);

            // echo 'hi';
        }
    }

    public function makemessage($receiver_id)
    {
        $sender_id = $this->session->userdata('doctor_id');
        $res = $this->Chat_model->selectChatRequest($sender_id, $receiver_id);

        if ($res->num_rows() > 0) {
            redirect(base_url('DoctorChat/setReceiverSession/' . $receiver_id));
        } else {
            $data = array(
                'sender_id'  => $sender_id,
                'receiver_id' => $receiver_id,
            );
            $this->Chat_model->insertChatRequest($data);
            redirect(base_url('DoctorChat/setReceiverSession/' . $receiver_id));
        }
    }



    public function search_user()
    {
        $sender_id = $this->session->userdata('doctor_id');
        sleep(2);
        if ($this->input->post('search_query')) {
            $data = $this->Chat_model->search_user_data($this->session->userdata('doctor_id'), $this->input->post('search_query'));
            $output = array();
            if ($data->num_rows() > 0) {
                foreach ($data->result_array() as $row) {
                    $dta = $this->Chat_model->searchfetchUser($row['ID']);
                    if ($dta->num_rows() > 0) {
                        $lastchat = $this->Chat_model->fetchLastChat($sender_id, $row['ID']);
                        $data1 = $this->Chat_model->fetchUser1($row['ID']);

                        if ($data1['sender_id'] === $sender_id) {
                            $myid = true;
                        } else {
                            $myid = false;
                        }


                        if ($row['Profile'] === "" || $row['Profile'] === null) {
                            $hasProfile = false;
                        } else {
                            $hasProfile = true;
                        }
                        $output[] = array(
                            'user_id'  => $row['ID'],
                            'mymess' => $myid,
                            'firstname'  => $row['Firstname'],
                            'lastname'   => $row['Lastname'],
                            'hasProfile' => $hasProfile,
                            'profile' => $row['Profile'],
                            'lastchat' => $lastchat['chat_messages_text'],
                        );
                    }
                }
            }
            echo json_encode($output);
        }
    }
    public function fetchuserappointment()
    {
        $doctorsession = $this->session->userdata('doctor_id');
        $user = $this->Doctor_model->fetchuser($doctorsession);

        if ($this->input->post('uid')) {
            $id = $this->input->post('uid');
            $res = $this->Chat_model->fetchapp($id, $user['Medical']);
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $data) {
                    $output[] = array(
                        'thisID' => $data['ID'],
                        'firstname' => $data['firstname'],
                        'lastname' => $data['lastname'],
                        'middlename' => $data['middlename'],
                        'patientType' => ucfirst($data['app_type']),
                        'appType' => 'For ' . ucfirst($data['type']),
                        'date' => $data['app_date'],
                        'status' => ucfirst($data['status']),
                        'viewIcon' => viewIcon(25, 25, "viewIcon"),
                    );
                }
            } else {
                $output = 0;
            }
            echo json_encode($output);
        }
    }

    public function fetchimages()
    {
        $doctorsession = $this->session->userdata('doctor_id');

        if ($this->input->post('uid')) {
            $id = $this->input->post('uid');
            $res = $this->Chat_model->fetchimages($doctorsession, $id);
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $data) {
                    // $output = '';
                    if ($data['images'] !== "" && $data['images'] !== null) {
                        $output[] = array(
                            'image' => $data['images'],
                        );
                    }
                }
            } else {
                $output = 0;
            }
            echo json_encode($output);
        }
    }
}
