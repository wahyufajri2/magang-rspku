<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function lihatPendaftaran() //Untuk menampilkan data pasien di menu pendaftaran
    {
        $data['title'] = 'Pendaftaran Pasien';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('peran_pengguna')->result_array();

        // $this->load->model('Pendaftaran_model', 'daftar');

        //$data['Kunjungan'] = $this->daftar->getDataKunjungan();
        $data['pasien'] = $this->db->get('pasien')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihatPendaftaran', $data);
        $this->load->view('templates/footer');
    }

    public function lihatMasterPasien() //Untuk menampilkan data master pasien di menu Pendaftaran
    {
        $data['title'] = 'Master Data Pasien';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('peran_pengguna')->result_array();
        // $this->load->model('Pendaftaran_model', 'dpd');

        // $data['DataPasienDaftar'] = $this->dpd->getMasterPasien();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihatMasterPasien', $data);
        $this->load->view('templates/footer');
    }

    public function lihatRekamMedis()
    {
        $data['title'] = 'Data Rekam Medis';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('peran_pengguna')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihatRekamMedis', $data);
        $this->load->view('templates/footer');
    }
}
