<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_library');
    }
    public function index()
    {
        redirect('library/tampil_data');
    }
    public function checklogin()
    {
        $nama = $this->session->userdata('nama_lengkap');
        if ($nama == '') {
            $this->session->set_flashdata('error', 'Silahkan Login Terlebih dahulu');
            redirect('library');
        }
    }
    public function tampil_deskripsi($id)
    {
        $library = $this->M_library->tampil_data(['id_item' => $id])->row_array();
        echo $library['deskripsi'];
    }
    public function tampil_data($jenis = 1)
    {
        $data['title'] = "Library";
        if ($this->input->get('search')) {
            $data['library'] = $this->M_library->search_data($this->input->get('search'))->result_array();
            $data['jenis'] = '';
        } else {
            $data['library'] = $this->M_library->tampil_data(['jenis' => $jenis])->result_array();
            $jenis_file = array(
                1 => "Buku",
                2 => "Game",
                3 => "Film",
            );
            $data['jenis'] = $jenis_file[$jenis];
        }

        $nama = $this->session->userdata('nama_lengkap');
        if ($nama != '') {
            $data['nama'] = $nama;
        }
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('library/tampil_data');
        $this->load->view('layout/footer');
    }
    public function edit_data($id)
    {
        $this->checklogin();
        $data['title'] = "Edit Data Library";
        $data['edit'] = $this->M_library->tampil_data(['id_item' => $id])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('library/tambah_data');
        $this->load->view('layout/footer');
    }
    public function hapus_item($id)
    {
        $this->checklogin();
        $data_old =  $this->M_library->tampil_data(['id_item' => $id])->row_array();
        if ($data_old['foto'] != '') {
            $path = './upload/image/' . $data_old['foto'];
            chmod($path, 0777);
            unlink($path);
        }
        $jenis_file = array(
            1 => "Buku",
            2 => "Game",
            3 => "Film",
        );
        $this->M_library->delete_library($id);
        $this->session->set_flashdata('success', 'Data ' . $jenis_file[$data_old['jenis']] . " Berjudul " . $data_old['judul'] . " Telah Berhasil Di Hapus");
        redirect('library/tampil_data/' . $data_old['jenis']);
    }
    public function aksi_edit_data()
    {
        $this->checklogin();
        $id = $this->input->post('id');
        if ($id != '') {
            $judul = $this->input->post('judul');
            $jenis = $this->input->post('jenis');
            $deskripsi = $this->input->post('deskripsi');
            $foto = '';
            $data_old =  $this->M_library->tampil_data(['id_item' => $id])->row_array();
            if ($_FILES['foto']['name'] != '') {

                $config['upload_path']          = './upload/image';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    if ($data_old['foto'] != '') {
                        $path = './upload/image/' . $data_old['foto'];
                        chmod($path, 0777);
                        unlink($path);
                    }
                } else {
                    $foto = '';
                }
            }
            $data_insert = array();
            if ($judul != '') {
                $data_insert['judul'] = $judul;
            }
            if ($jenis != '') {
                $data_insert['jenis'] = $jenis;
            }
            if ($jenis != '') {
                $data_insert['jenis'] = $jenis;
            }
            if ($foto != '') {
                $data_insert['foto'] = $foto;
            }
            if ($deskripsi != '') {
                $data_insert['deskripsi'] = $deskripsi;
            }
            $insert = $this->M_library->update_library($data_insert, $id);
            $jenis_file = array(
                1 => "Buku",
                2 => "Game",
                3 => "Film",
            );
            if ($insert) {
                $this->session->set_flashdata('success', 'Data ' . $jenis_file[$jenis] . " Berjudul " . $judul . " Telah Berhasil Di Edit");
            } else {
                $this->session->set_flashdata('error', 'Data ' . $jenis_file[$jenis] . " Gagal Di Edit");
            }
            redirect('library/tampil_data/' . $jenis . '#' . $id);
        } else {
            redirect('library/tampil_data/');
        }
    }

    public function tambah_data()
    {
        $this->checklogin();
        $data['title'] = "Tambah Data Library";
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('library/tambah_data');
        $this->load->view('layout/footer');
    }
    public function aksi_tambah_data()
    {
        $this->checklogin();
        $judul = $this->input->post('judul');
        $jenis = $this->input->post('jenis');
        $deskripsi = $this->input->post('deskripsi');
        $foto = '';

        if ($_FILES['foto']['name'] != '') {

            $config['upload_path']          = './upload/image';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $foto = '';
            }
        }
        $data_insert = array();
        if ($judul != '') {
            $data_insert['judul'] = $judul;
        }
        if ($jenis != '') {
            $data_insert['jenis'] = $jenis;
        }
        if ($jenis != '') {
            $data_insert['jenis'] = $jenis;
        }
        if ($foto != '') {
            $data_insert['foto'] = $foto;
        }
        if ($deskripsi != '') {
            $data_insert['deskripsi'] = $deskripsi;
        }
        $insert = $this->M_library->simpan_library($data_insert);
        $jenis_file = array(
            1 => "Buku",
            2 => "Game",
            3 => "Film",
        );
        if ($insert) {
            $this->session->set_flashdata('success', 'Data ' . $jenis_file[$jenis] . " Berjudul " . $judul . " Telah Berhasil Ditambah");
        } else {
            $this->session->set_flashdata('error', 'Data ' . $jenis_file[$jenis] . " Gagal Ditambah");
        }
        redirect('library/tampil_data/' . $jenis . '#' . $insert);
    }
    public function testgpt()
    {
        $this->load->view('viewgpt');
    }
}
