<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

    /**
     * Simpan Data Siswa
     */
    public function simpan_siswa($data)
    {
        $simpan = $this->db->insert("tbl_siswa", $data);

        if($simpan) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

}