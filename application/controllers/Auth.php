<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('layout/header', $data);
        $this->load->view('auth/login');
        $this->load->view('layout/footer');
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('library');
    }
    public function checklogin()
    {
        $nama = $this->session->userdata('nama_lengkap');
        if ($nama == '') {
            $this->session->set_flashdata('error', 'Silahkan Login Terlebih dahulu');
            redirect('auth');
        }
    }
    public function aksi_login()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->input->post();
            $data['title'] = "Registrasi";
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('auth/registrasi');
            $this->load->view('layout/footer');
        } else {
            $where = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $get_user = $this->M_user->tampil_data($where)->row_array();
            if (empty($get_user)) {
                $this->session->set_flashdata('error', 'Username Atau Password kamu salah');
                $data['user'] = $this->input->post();
                $data['title'] = "Registrasi";
                $this->load->view('layout/header', $data);
                $this->load->view('auth/registrasi');
                $this->load->view('layout/footer');
            } else {
                $this->session->set_flashdata('success', 'Selamat datang ' . $get_user['nama_lengkap']);
                $newdata = array(
                    'nama_lengkap'  => $get_user['nama_lengkap'],
                    'email'     => $get_user['email'],
                    'no_ktp'     => $get_user['no_ktp']
                );
                $this->session->set_userdata($newdata);
                redirect('auth/tampil_user');
            }
        }
    }
    public function registrasi()
    {
        $this->checklogin();
        $data['title'] = "Registrasi";
        $this->load->view('layout/header', $data);
        $this->load->view('auth/registrasi');
    }
    public function aksi_registrasi()
    {
        $this->checklogin();
        $this->form_validation->set_rules('nama_lengkap', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|min_length[16]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->input->post();
            $data['title'] = "Registrasi";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/registrasi');
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_ktp' => $this->input->post('no_ktp'),
                'alamat' => $this->input->post('alamat'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
            );
            $insert = $this->M_user->simpan_user($data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Data User berhasil disimpan.');
            } else {
                $this->session->set_flashdata('error', 'Data User gagal disimpan.');
            }
            redirect('auth/tampil_user');
        }
    }
    public function tampil_user()
    {
        $this->checklogin();
        $data['title'] = "Tampil User";
        $data['user'] = $this->M_user->tampil_data()->result_array();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        // $this->load->view('layout/sidebar');
        $this->load->view('auth/tampil_user');
        $this->load->view('layout/footer');
    }
    public function edit_user($id)
    {
        $this->checklogin();
        $data['user'] = $this->M_user->get_user_id($id);
        $data['title'] = "Edit";
        $this->load->view('layout/header', $data);
        $this->load->view('auth/edit');
    }
    public function aksi_edit()
    {
        $this->checklogin();
        if ($this->input->post('password') != '') {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        }
        $this->form_validation->set_rules('nama_lengkap', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|min_length[16]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->input->post();
            $data['title'] = "Edit";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/edit');
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_ktp' => $this->input->post('no_ktp'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
            );
            if ($this->input->post('password')) {
                $data['password'] = $this->input->post('password');
            }
            $id = $this->input->post('id_user');
            $insert = $this->M_user->update_user($data, $id);
            if ($insert) {
                $this->session->set_flashdata('success', 'Data User berhasil Di Update.');
            } else {
                $this->session->set_flashdata('error', 'Data User gagal Di Update.');
            }
            redirect('auth/tampil_user');
        }
    }
    public function delete_user($id)
    {
        $this->checklogin();
        $this->M_user->delete_user($id);
        $this->session->set_flashdata('success', 'Data User berhasil Di hapus.');
        redirect('auth/tampil_user');
    }
}
