<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan_model extends CI_Model
{
    public function getKunjungan()
    {
        $this->db->select('a.no_rm, b.no_rg, a.nama_pasien, a.alamat, c.nama_dokter, b.periksa_tgl');
        $this->db->from('tb_pasien AS a');
        $this->db->join('tb_kunjungan AS b', 'a.id_pasien = b.pasien_id');
        $this->db->join('tb_dokter AS c', 'b.dokter_id = c.id_dokter');
        $query = $this->db->get();

        return $query->result_array();

        // $this->db->select('id_kunjungan, pasien_id, no_rm, no_rg, status, dokter_id, periksa_tgl');
        // $this->db->from('tb_kunjungan');
        // $query = $this->db->get();

        // return $query->result_array();
    }
}
