<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function tranfusi()
    {
        $data['title'] = 'Tranfusi Darah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Perawat_model', 'kasus');


        $data['Tranfusi'] = $this->kasus->getTranfusi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perawat/tranfusi', $data);
        $this->load->view('templates/footer');
    }
}
