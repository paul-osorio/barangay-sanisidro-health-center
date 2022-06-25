<?php
class Chat_model extends CI_Model
{

    public function fetchUser($user_id)
    {
        $this->db->where('sender_id', $user_id);
        $this->db->or_where('receiver_id', $user_id);
        $this->db->order_by('chat_request_id', 'DESC');
        return $this->db->get('chat_request');
    }







    public function searchfetchUser($user_id)
    {
        $this->db->where('receiver_id', $user_id);
        return $this->db->get('chat_request');
    }
    function search_user_data($user_id, $query)
    {
        $where = "ID != '" . $user_id . "' AND (Firstname LIKE '%" . $query . "%' OR Lastname LIKE '%" . $query . "%')";

        $this->db->where($where);

        return $this->db->get('patient');
    }
    public function fetchUser1($user_id)
    {
        $this->db->where('sender_id', $user_id);
        $this->db->or_where('receiver_id', $user_id);

        // $this->db->where('receiver_id', $receiver_id);
        // $this->db->limit(1);
        $this->db->order_by('chat_message_id', 'DESC');
        return $this->db->get('messages')->row_array();
    }
    public function getUser($user_id)
    {
        $this->db->where('ID', $user_id);
        $data = $this->db->get('patient');
        $output = array();
        foreach ($data->result_array() as $data) {
            $output['ID'] = $data['ID'];
            $output['Firstname'] = $data['Firstname'];
            $output['Lastname'] =  $data['Lastname'];
            $output['Email'] =  $data['Email'];
            $output['Profile'] =  $data['Profile'];
        }
        return $output;
    }

    public function fetchLastChat($sender_id, $receiver_id)

    {


        $this->db->where('(sender_id = "' . $sender_id . '" OR sender_id = "' . $receiver_id . '")');
        $this->db->where('(receiver_id = "' . $receiver_id . '" OR receiver_id = "' . $sender_id . '")');
        $this->db->limit(1);

        $this->db->order_by('chat_message_id', 'DESC');
        $res = $this->db->get('messages');
        if ($res->num_rows() > 0) {
            // if ($res->result_array() === "" || $res->result_array() === null || $res->num_rows() === 0) {
            //     return "No conversation yet. Start the conversation";
            // } else {
            //     return $res->result_array();
            // }
            return $res->row_array();
        } else {
            return "No conversation yet. Start the conversation";
            // return "No conversation yet. Start the conversation";
        }

        // if ($res->result_array() === "" || $res->result_array() === null || $res->num_rows() === 0) {
        //     return "No conversation yet. Start the conversation";
        // } else {
        //     return $res->result_array();
        // }
    }
    public function readMessage($user_id, $sender_id)
    {
        $data = array(
            'chat_messages_status'  => 'read'
        );
        $this->db->where('receiver_id', $user_id);
        $this->db->where('sender_id', $sender_id);
        $this->db->where('receiver_type', 'doctor');
        $this->db->where('chat_messages_status', 'unread');
        $this->db->update('messages', $data);
    }


    public function checkUnread($user_id)
    {
        $this->db->select('*');
        $this->db->where('receiver_id', $user_id);
        $this->db->where('receiver_type', 'doctor');
        $this->db->where('chat_messages_status', 'unread');
        return $this->db->get('messages');
    }




    public function fetchChat($sender_id, $receiver_id)
    {
        $this->db->where('(sender_id = "' . $sender_id . '" OR sender_id = "' . $receiver_id . '")');
        $this->db->where('(receiver_id = "' . $receiver_id . '" OR receiver_id = "' . $sender_id . '")');
        $this->db->order_by('chat_message_id', 'ASC');
        return $this->db->get('messages');
    }
    public function receiverprofile($id)
    {
        $this->db->select('*');
        $this->db->where('ID', $id);
        $data = $this->db->get('patient');
        return $data->row_array();
    }
    public function insertNewChat($data)
    {
        $this->db->insert('messages', $data);
    }

    public function insertChatRequest($data)
    {
        $this->db->insert('chat_request', $data);
    }
    public function selectChatRequest($user_id, $receiver_id)
    {
        $this->db->select('*');
        $this->db->where('(sender_id ="' . $user_id . '" AND receiver_id="' . $receiver_id . '")');
        return $this->db->get('chat_request');
    }
    public function fetchapp($id, $type)
    {
        $this->db->order_by('ID', "DESC");
        if ($type === "midwife") {
            $this->db->where('patient_ID', $id);
            $this->db->where('app_type !=', 'dental');
            $this->db->where("(status='pending'
                               OR status = 'approve')", NULL, FALSE);
        } elseif ($type === "dentist") {
            $this->db->where('patient_ID', $id);
            $this->db->where('app_type', 'dental');
            $this->db->where("(status='pending'
                               OR status = 'approve')", NULL, FALSE);
        } elseif ($type === "nurse") {
            $this->db->where('patient_ID', $id);
            $this->db->where('app_type', 'immunization');
            $this->db->where("(status='pending'
                               OR status = 'approve')", NULL, FALSE);
        };
        return $this->db->get('appointment');
    }

    public function fetchimages($sender_id, $receiver_id)
    {
        $this->db->order_by('chat_message_id', 'DESC');
        $this->db->where('(sender_id = "' . $sender_id . '" OR sender_id = "' . $receiver_id . '")');
        $this->db->where('(receiver_id = "' . $receiver_id . '" OR receiver_id = "' . $sender_id . '")');
        return $this->db->get('messages');
    }

    public function fetchreplymess($id)
    {
        $this->db->select('*');
        $this->db->where('chat_message_id', $id);
        $res = $this->db->get('messages');
        return $res->row_array();
    }

    public function check($sender_id, $receiver_id)
    {

        $this->db->where('(sender_id = "' . $sender_id . '" OR sender_id = "' . $receiver_id . '")');
        $this->db->where('(receiver_id = "' . $receiver_id . '" OR receiver_id = "' . $sender_id . '")');
        $res = $this->db->get('messages');
    }
}
