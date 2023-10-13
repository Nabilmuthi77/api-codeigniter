<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //load model
        $this->load->model('M_siswa');

        //load library form validasi
        $this->load->library('form_validation');
    }

    /**
     * Simpan Data
     */
    public function simpan()
    {
        //set validasi
        $this->form_validation->set_rules('nama_siswa','Nama Siswa','required');
        $this->form_validation->set_rules('alamat','Alamat Siswa','required');

        if($this->form_validation->run() == TRUE){

            $data = array(
                'nama_siswa' => $this->input->post("nama_siswa"),
                'alamat'     => $this->input->post("alamat"),
            );

            $simpan = $this->M_siswa->simpan_siswa($data);

            if($simpan) {

                header('Content-Type: application/json');
                echo json_encode(
                    array(
                        'success' => true,
                        'message' => 'Data Berhasil Disimpan!'
                    )
                );

            } else {

                header('Content-Type: application/json');
                echo json_encode(
                    array(
                        'success' => false,
                        'message' => 'Data Gagal Disimpan!'
                    )
                );
            }

        }else{

            header('Content-Type: application/json');
            echo json_encode(
                array(
                    'success'    => false,
                    'message'    => validation_errors()
                )
            );

        }

    }

}