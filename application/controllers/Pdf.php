<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

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
        $data['page_name'] = 'Add Article';
        $this->index->activity_log('Add Article');
        $data['content_view'] = 'Pdf/add_pdf';
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $this->load->view('admin_template', $data);
    }

//Pdf Functionality

    public function add_pdf() {
        $this->index->activity_log('Add Article');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if (empty($_FILES['pdf']['name'])) {
            $this->form_validation->set_rules('pdf', 'Pdf', 'required');
        }
        if ($this->form_validation->run()) {
        $insert_data = array(
            'status' => '1',
            'createdDate' => DATE, 
            'createdBy' => $this->session->userdata('user_id'),
            'name' => $this->input->post('name'),
        );

        $extensionResume = array("pdf");

        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                redirect('add-client');
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
                redirect('add-client');
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/pdf/';
            $file_path_image = base_url() . 'uploads/pdf/';
            $image = $this->common->upload_image($image_data, 1, $path);
            $insert_data['pdf'] = $image;
            $insert_data['pdf_url'] = $file_path_image . $image;
        }

        $id = $this->common->insert_table('pdf', $insert_data);
        if ($id) {
            $array = array(
                'success' => 'Article added successfully.'
            );
        }
    }else{
        $array = array(
            'error' => true,
            'name_error' => form_error('name'),
            'pdf_error' => form_error('pdf')
        );
    }

        echo json_encode($array);
    }

    public function pdf_list() {
        $data['page_name'] = 'Article List';
        $this->index->activity_log('Article List');
        $data['pdf_list'] = $this->common->list('pdf');
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Pdf/pdf_list';
        $this->load->view('admin_template', $data);
    }

    public function editpdf($id) {
       
        if ($id == 'editpdf') {
            $this->index->activity_log('Edit Article');
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            
            if ($this->form_validation->run()) {
           
                $id = $this->input->post('id');
 
                $update_data['createdBy'] = $this->session->userdata('user_id');
                $update_data['createdDate'] =DATE;
                $update_data['name']= $this->input->post('name');
                 $extensionResume = array("pdf");

        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                redirect('add-client');
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
                redirect('add-client');
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/pdf/';
            $file_path_image = base_url() . 'uploads/pdf/';
            $image = $this->common->upload_image($image_data, 1, $path);
            $update_data['pdf'] = $image;
            $update_data['pdf_url'] = $file_path_image . $image;
        }

                $this->common->update_table('pdf', $update_data, $id);
                $array = array(
                    'success' => 'Article updated successfully.'
                );
            }else{
                $array = array(
                    'error' => true,
                    'name1_error' => form_error('name'),
                    'pdf1_error' => form_error('pdf')
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Article List';
            $data['edit_details'] = $this->common->view('pdf', $id);
            $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();
            $this->index->activity_log('Pdf Edit');
            $data['content_view'] = 'Pdf/edit_pdf';
            $this->load->view('admin_template', $data);
        }
    }

    public function delete_pdf() {
        $this->index->activity_log('Article Delete');
        $id = $this->input->post('id');
        $this->common->delete_table('pdf', $id);
        $array = array(
            'success' => 'Article deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_pdf() {
        $this->index->activity_log('Article Status');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('pdf', $delete_data, $id);
        $array = array(
            'success' => 'Article status updated successfully.'
        );
        echo json_encode($array);
    }

    public function delete_allpdf() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }
            $abc = $this->common->deleteAll($checkbox, 'pdf');

            $array = array(
                'success' => 'Selected Article deleted successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Article',
            );
        }
        echo json_encode($array);
    }

    public function status_allpdf() {
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
            $abc = $this->common->statusall($checkbox, $delete_data, 'pdf');

            $array = array(
                'success' => 'Selected Article activated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Article',
            );
        }
        echo json_encode($array);
    }

    public function status_allpdfdde() {
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
            $abc = $this->common->statusall($checkbox, $delete_data, 'pdf');

            $array = array(
                'success' => 'Selected Article deactivated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Article',
            );
        }
        echo json_encode($array);
    }


}
