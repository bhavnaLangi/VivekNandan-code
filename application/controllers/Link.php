<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Index_model', 'index');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->login->is_logged_in();
        $this->index->activity_update();
    }
  
    public function index() {
        $data['page_name'] = 'Link List';
        $this->index->activity_log('Link list');
        $data['link_list'] = $this->common->list('link');
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'Link/link_list';
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();


        $this->load->view('admin_template', $data);
    }

  
//GallaryFunctionality

    public function add_link() {
        $this->index->activity_log('link Add');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Title', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');

        if ($this->form_validation->run()) {
            $insert_data = array(
                'name' => $this->input->post('name'),
                'link' => $this->input->post('link'),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('link', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'link added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'title_error' => form_error('name'),
                'name_error' => form_error('link'),

            );
        }
        echo json_encode($array);
    }

    public function fetch_link() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'link');
            echo json_encode($data);
        }
    }

    public function edit_link() {
        $this->index->activity_log('Edit Link');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Title', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');
        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'name' => $this->input->post('name'),
                'link' => $this->input->post('link'),
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $this->common->update_table('link', $update_data, $id);
            $array = array(
                'success' => 'link updated successfully.'
            );
        } else {
            $array = array(
                'error' => true,
                'title11_error' => form_error('name'),
                'name11_error' => form_error('link')

            );
        }
        echo json_encode($array);
    }

    public function delete_link() {
        $this->index->activity_log('Link Delete');
        $id = $this->input->post('id');
       
        $this->common->delete_table('link', $id);
        $array = array(
            'success' => 'link deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_link() {
        $this->index->activity_log('Link Status');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('link', $delete_data, $id);
        $array = array(
            'success' => 'link status updated successfully.'
        );
        echo json_encode($array);
    }

      public function delete_alllinks() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }
            $abc = $this->common->deleteAll($checkbox, 'link');

            $array = array(
                'success' => 'Selected Link deleted successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Link',
            );
        }
        echo json_encode($array);
    }

    public function status_alllinks() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {
                // echo $row;
                array_push($checkbox, $row);
            }

            $delete_data = array(
                'status' => 1,
            );
            $abc = $this->common->statusall($checkbox, $delete_data, 'link');

            $array = array(
                'success' => 'Selected Link activated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Link',
            );
        }
        echo json_encode($array);
    }

    public function status_alllinksdde() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {
                // echo $row;
                array_push($checkbox, $row);
            }

            $delete_data = array(
                'status' => 0,
            );
            $abc = $this->common->statusall($checkbox, $delete_data, 'link');

            $array = array(
                'success' => 'Selected Link deactivated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Link',
            );
        }
        echo json_encode($array);
    }

  
    
}

?>
