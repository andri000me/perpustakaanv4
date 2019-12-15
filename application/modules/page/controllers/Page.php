<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Page Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pages'] = $this->db->get('pages')->result_array();

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }

    public function add()
    {
        $data['title'] = 'Page Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pages'] = $this->db->get('pages')->result_array();
        $this->form_validation->set_rules('title', 'title', 'required|is_unique[pages.title]', [
            'is_unique' => 'This title has already registered'
        ]);
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('add', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'slug' => slug($this->input->post('title'))
            ];
            $this->db->insert('pages', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New Pages added !</div>');
            redirect('page');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Page Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pages'] = $this->db->get('pages')->result_array();
        $this->load->model('Page_model', 'page_model');
        $data['getpages'] = $this->page_model->getPagesById($id);
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('edit', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'slug' => slug($this->input->post('title'))
            ];
            $this->db->where('id', $id);
            $this->db->update('pages', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role"alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Page updated.
                </div>'
            );
            redirect('page');
        }
    }

    public function hapusPages($id)
    {
        $this->load->model('Page_model', 'page');
        $this->page->hapusDataPages($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Pages deleted !</div>');
        redirect('page');
    }
}
