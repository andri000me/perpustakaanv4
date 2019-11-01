<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]', [
            'is_unique' => 'This Menu has already registered'
        ]);
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('index', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'menu' => $this->input->post('menu'),
                'icon' => $this->input->post('icon'),
                'menu_id' => slug($this->input->post('menu'))
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New menu added !</div>');
            redirect('menu');
        }
    }
    public function hapusMenu($id)
    {
        $this->load->model('Menu_model', 'menu');
        $this->menu->hapusDataMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Menu deleted !</div>');
        redirect('menu');
    }

    public function editMenu($id)
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Menu_model', 'menu_model');
        $data['getmenu'] = $this->menu_model->getMenuById($id);
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('edit', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'menu' => $this->input->post('menu'),
                'icon' => $this->input->post('icon'),
                'menu_id' => slug($this->input->post('menu'))
            ];
            $this->db->where('id', $id);
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New Menu edited !</div>');
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getsubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'menu_id', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('sort', 'sort', 'required|numeric');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('submenu', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'sort' => $this->input->post('sort'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New Submenu added !</div>');
            redirect('menu/submenu');
        }
    }
    
    public function submenuedit($id)
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        
        $data['subMenu'] = $this->menu->getsubMenu();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['getsubmenu'] = $this->menu->getSubMenuById($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'menu_id', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('sort', 'sort', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('submenuedit', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'sort' => $this->input->post('sort'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert"> Submenu edited !</div>');
            redirect('menu/submenu');
        }
    }
    
    public function submenuhapus($id)
    {
        $this->load->model('Menu_model', 'menu');
        $this->menu->hapusDataSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Sub Menu deleted !</div>');
        redirect('menu/submenu');
    }


    //////////// END
}
