<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
        date_default_timezone_set("Asia/Calcutta");
        if (!$this->session->userdata('user_id')) {
            redirect('google_login/login');
        }
    }

    function index()
    {
        $this->load->view('chat_view');
    }

    function search_user()
    {
        sleep(2);
        if ($this->input->post('search_query')) {
            $data = $this->chat_model->search_user_data($this->session->userdata('user_id'), $this->input->post('search_query'));
            $output = array();
            if ($data->num_rows() > 0) {
                foreach ($data->result() as $row) {
                    $request_status = $this->chat_model->Check_request_status($this->session->userdata('user_id'), $row->user_id);
                    $is_request_send = 'yes';
                    if ($request_status == '') {
                        $is_request_send = 'no';
                    } else {
                        if ($request_status == 'pending') {
                            $is_request_send = 'yes';
                        }
                    }
                    if ($request_status != 'Accept') {
                        $output[] = array(
                            'user_id'  => $row->user_id,
                            'first_name' => $row->first_name,
                            'last_name'  => $row->last_name,
                            'profile_picture' => $row->profile_picture,
                            'is_request_send' => $is_request_send
                        );
                    }
                }
            }
            echo json_encode($output);
        }
    }

    function send_request()
    {
        sleep(2);
        if ($this->input->post('send_userid')) {
            $data = array(
                'sender_id'  => $this->input->post('send_userid'),
                'receiver_id' => $this->input->post('receiver_userid')
            );
            $this->chat_model->Insert_chat_request($data);
        }
    }

    function load_notification()
    {
        sleep(2);
        if ($this->input->post('action')) {
            $data = $this->chat_model->Fetch_notification_data($this->session->userdata('user_id'));
            $output = array();
            if ($data->num_rows() > 0) {
                foreach ($data->result() as $row) {
                    $userdata = $this->chat_model->Get_user_data($row->sender_id);

                    $output[] = array(
                        'user_id'  => $row->sender_id,
                        'first_name' => $userdata['first_name'],
                        'last_name'  => $userdata['last_name'],
                        'profile_picture' => $userdata['profile_picture'],
                        'chat_request_id' => $row->chat_request_id
                    );
                }
            }
            echo json_encode($output);
        }
    }

    function accept_request()
    {
        if ($this->input->post('chat_request_id')) {
            $update_data = array(
                'chat_request_status' => 'Accept'
            );
            $this->chat_model->Update_chat_request($this->input->post('chat_request_id'), $update_data);
        }
    }

    function load_chat_user()
    {
        sleep(2);
        if ($this->input->post('action')) {
            $sender_id = $this->session->userdata('user_id');
            $receiver_id = '';
            $data = $this->chat_model->Fetch_chat_user_data($sender_id);
            if ($data->num_rows() > 0) {
                foreach ($data->result() as $row) {
                    if ($row->sender_id == $sender_id) {
                        $receiver_id = $row->receiver_id;
                    } else {
                        $receiver_id = $row->sender_id;
                    }
                    $userdata = $this->chat_model->Get_user_data($receiver_id);
                    $output[] = array(
                        'receiver_id'  => $receiver_id,
                        'first_name'  => $userdata['first_name'],
                        'last_name'   => $userdata['last_name'],
                        'profile_picture' => $userdata['profile_picture']
                    );
                }
            }
            echo json_encode($output);
        }
    }

    function send_chat()
    {
        if ($this->input->post('receiver_id')) {
            $data = array(
                'sender_id'  => $this->session->userdata('user_id'),
                'receiver_id' => $this->input->post('receiver_id'),
                'chat_messages_text' => $this->input->post('chat_message'),
                'chat_messages_status' => 'no',
                'chat_messages_datetime' => date('Y-m-d H:i:s')
            );

            $this->chat_model->Insert_chat_message($data);
        }
    }

    function load_chat_data()
    {
        if ($this->input->post('receiver_id')) {
            $receiver_id = $this->input->post('receiver_id');
            $sender_id = $this->session->userdata('user_id');
            if ($this->input->post('update_data') == 'yes') {
                $this->chat_model->Update_chat_message_status($sender_id);
            }
            $chat_data = $this->chat_model->Fetch_chat_data($sender_id, $receiver_id);
            if ($chat_data->num_rows() > 0) {
                foreach ($chat_data->result() as $row) {
                    $message_direction = '';
                    if ($row->sender_id == $sender_id) {
                        $message_direction = 'right';
                    } else {
                        $message_direction = 'left';
                    }
                    $date = date('D M Y H:i', strtotime($row->chat_messages_datetime));
                    $output[] = array(
                        'chat_messages_text' => $row->chat_messages_text,
                        'chat_messages_datetime' => $date,
                        'message_direction'  => $message_direction
                    );
                }
            }
            echo json_encode($output);
        }
    }

    function check_chat_notification()
    {
        if ($this->input->post('user_id_array')) {
            $receiver_id = $this->session->userdata('user_id');

            $this->chat_model->Update_login_data();

            $user_id_array = explode(",", $this->input->post('user_id_array'));

            $output = array();

            foreach ($user_id_array as $sender_id) {
                if ($sender_id != '') {
                    $status = "offline";
                    $last_activity = $this->chat_model->User_last_activity($sender_id);

                    $is_type = '';

                    if ($last_activity != '') {
                        $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');

                        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

                        if ($last_activity > $current_timestamp) {
                            $status = 'online';
                            $is_type = $this->chat_model->Check_type_notification($sender_id, $receiver_id, $current_timestamp);
                        }
                    }

                    $output[] = array(
                        'user_id'  => $sender_id,
                        'total_notification' => $this->chat_model->Count_chat_notification($sender_id, $receiver_id),
                        'status'  => $status,
                        'is_type'  => $is_type
                    );
                }
            }
            echo json_encode($output);
        }
    }
}
?>


Chat_model.php (Models)


<?php
class Chat_model extends CI_Model
{
    function search_user_data($user_id, $query)
    {
        $where = "user_id != '" . $user_id . "' AND (first_name LIKE '%" . $query . "%' OR last_name LIKE '%" . $query . "%')";

        $this->db->where($where);

        return $this->db->get('chat_user');
    }

    function Check_request_status($sender_id, $receiver_id)
    {
        $this->db->where('(sender_id = "' . $sender_id . '" OR sender_id = "' . $receiver_id . '")');
        $this->db->where('(receiver_id = "' . $receiver_id . '" OR receiver_id = "' . $sender_id . '")');
        $this->db->order_by('chat_request_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('chat_request');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                return $row->chat_request_status;
            }
        }
    }

    function Insert_chat_request($data)
    {
        $this->db->insert('chat_request', $data);
    }

    function Fetch_notification_data($receiver_id)
    {
        $this->db->where('receiver_id', $receiver_id);
        $this->db->where('chat_request_status', 'Pending');
        return $this->db->get('chat_request');
    }

    function Get_user_data($user_id)
    {
        $this->db->where('user_id', $user_id);
        $data = $this->db->get('chat_user');
        $output = array();
        foreach ($data->result() as $row) {
            $output['first_name'] = $row->first_name;
            $output['last_name'] = $row->last_name;
            $output['email_address'] = $row->email_address;
            $output['profile_picture'] = $row->profile_picture;
        }
        return $output;
    }

    function Update_chat_request($chat_request_id, $data)
    {
        $this->db->where('chat_request_id', $chat_request_id);
        $this->db->update('chat_request', $data);
    }

    function Fetch_chat_user_data($user_id)
    {
        $this->db->where('chat_request_status', 'Accept');
        $this->db->where('(sender_id = "' . $user_id . '" OR receiver_id = "' . $user_id . '")');
        $this->db->order_by('chat_request_id', 'DESC');
        return $this->db->get('chat_request');
    }

    function Insert_chat_message($data)
    {
        $this->db->insert('chat_messages', $data);
    }

    function Update_chat_message_status($user_id)
    {
        $data = array(
            'chat_messages_status'  => 'yes'
        );
        $this->db->where('receiver_id', $user_id);
        $this->db->where('chat_messages_status', 'no');
        $this->db->update('chat_messages', $data);
    }

    function Fetch_chat_data($sender_id, $receiver_id)
    {
        $this->db->where('(sender_id = "' . $sender_id . '" OR sender_id = "' . $receiver_id . '")');
        $this->db->where('(receiver_id = "' . $receiver_id . '" OR receiver_id = "' . $sender_id . '")');
        $this->db->order_by('chat_messages_id', 'ASC');
        return $this->db->get('chat_messages');
    }

    function Count_chat_notification($sender_id, $receiver_id)
    {
        $this->db->where('sender_id', $sender_id);
        $this->db->where('receiver_id', $receiver_id);
        $this->db->where('chat_messages_status', 'no');
        $query = $this->db->get('chat_messages');
        return $query->num_rows();
    }

    function Update_login_data()
    {
        $data = array(
            'last_activity'  => date('Y-m-d H:i:s'),
            'is_type'   => $this->input->post('is_type'),
            'receiver_user_id' => $this->input->post('receiver_id')
        );
        $this->db->where('login_data_id', $this->session->userdata('login_id'));
        $this->db->update('login_data', $data);
    }

    function User_last_activity($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('login_data_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('login_data');
        foreach ($query->result() as $row) {
            return $row->last_activity;
        }
    }

    function Check_type_notification($sender_id, $receiver_id, $current_timestamp)
    {
        $this->db->where('receiver_user_id', $receiver_id);
        $this->db->where('user_id', $sender_id);
        $this->db->where('last_activity >', $current_timestamp);
        $this->db->order_by('login_data_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('login_data');
        foreach ($query->result() as $row) {
            return $row->is_type;
        }
    }
}
?>