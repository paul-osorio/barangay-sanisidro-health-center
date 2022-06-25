<?php

use Shuchkin\SimpleXLSX;

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "/third_party/SimpleXLSX.php";

class Excel extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->model('Admin_model');
    }
}
