<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Index_model', 'index');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->index->activity_update();

  $this->login->is_logged_in();
    }

    public function index() {
        $data['page_name'] = 'Add Media';
        $this->index->activity_log('Add Media');
        $data['content_view'] = 'Team/add_team';
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }

//Team Functionality



    public function insert_team() {


        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        
       if (empty($_FILES['pdf']['name'])) {
            $this->form_validation->set_rules('pdf', 'Pdf', 'required');
        }

        if (empty($_FILES['featured_image']['name'])) {
            $this->form_validation->set_rules('featured_image', 'Image', 'required');
        }

        if ($this->form_validation->run()) {

            $insert_data = array(
                'name' => $this->input->post('name'),
                
                'url' => str_replace(' ', '-', strtolower($this->input->post('name'))),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                    redirect('add-client');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                    redirect('add-client');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/team/';
                $file_path_image = base_url() . 'uploads/team/';
                $image = $this->common->upload_image($image_data, 1, $path);
                $insert_data['featured_image'] = $image;
                $insert_data['featured_imageurl'] = $file_path_image . $image;
            }
            $extensionResume1 = array("pdf");
            if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
                $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume1) && (!empty($_FILES["pdf"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use valid Format For Feature Image');
                 
                }
                $image_data = $_FILES['pdf'];
                $path = './uploads/team/';
                $file_path_image = base_url().'uploads/team/';
                $image = $this->common->upload_image($image_data, 1, $path);
                $insert_data['fb'] = $image;
                $insert_data['twitter'] = $file_path_image . $image;
            }

            $id = $this->common->insert_table('team', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Media added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'name_error' => form_error('name'),
                'pdf_error' => form_error('pdf'),
                'featured_image_error' => form_error('featured_image'),
            );
        }
        echo json_encode($array);
    }

    public function team_list() {

        $data['page_name'] = 'Media List';
        $this->index->activity_log('Media List');
        $data['team_list'] = $this->common->list('team');
        $data['content_view'] = 'Team/team_list';
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }

    public function edit_team($id) {
        if ($id == 'editteam') {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
          

            if ($this->form_validation->run()) {


                $id = $this->input->post('id');

                $update_data['name'] = $this->input->post('name');
               
               

                $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

                if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                    $extId = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                    $errors = array();
                    $maxsize = 26214400;
                    if (!in_array($extId, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                        $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                        redirect('add-client');
                    }
                    if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                        $this->session->set_flashdata('error', 'Image Size Too Large');
                        redirect('add-client');
                    }

                    $image_data = $_FILES['featured_image'];
                    $path = './uploads/team/';
                    $file_path_image = base_url() . 'uploads/team/';
                    $image = $this->common->upload_image($image_data, 1, $path);
                    $update_data['featured_image'] = $image;
                    $update_data['featured_imageurl'] = $file_path_image . $image;
                }

                $extensionResume1 = array("pdf");
                if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
                    $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
                    $errors = array();
                    $maxsize = 26214400;
                    if (!in_array($extId, $extensionResume1) && (!empty($_FILES["pdf"]["type"]))) {
                        $this->session->set_flashdata('error', 'Please Use valid Format For Feature Image');
                     
                    }
                    $image_data = $_FILES['pdf'];
                    $path = './uploads/team/';
                    $file_path_image = base_url().'uploads/team/';
                    $image = $this->common->upload_image($image_data, 1, $path);
                    $update_data['fb'] = $image;
                    $update_data['twitter'] = $file_path_image . $image;
                }

                $this->common->update_table('team', $update_data, $id);
                if($this->db->affected_rows() == 0){
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                }else{
                    $update_data['createdBy'] = $this->session->userdata('user_id');
                    $update_data['createdDate'] = DATE;
                    $this->common->update_table('team', $update_data, $id);
                $array = array(
                    'success' => 'Media data successfully.'
                );
                }
            } else {
                $array = array(
                    'error' => true,
                    'nameteam_error' => form_error('name'),
                  
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Media List';
            $this->index->activity_log('Edit Media');
            $data['edit_details'] = $this->common->view('team', $id);
            $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();

            $data['content_view'] = 'Team/edit_team';

            $this->load->view('admin_template', $data);
        }
    }

    public function fetch_team() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'team');
            echo json_encode($data);
        }
    }

    public function delete_team() {

        $this->index->activity_log('Delete Media');
        $id = $this->input->post('id');

        $this->common->delete_table('team', $id);
        $array = array(
            'success' => 'Team deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_team() {
        $this->index->activity_log('Status Media');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('team', $delete_data, $id);
        $array = array(
            'success' => 'Team status updated successfully.'
        );
        echo json_encode($array);
    }

    public function deleteAllteam() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }
            $abc = $this->common->deleteAll($checkbox, 'team');

            $array = array(
                'success' => 'Selected Media deleted successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Media',
            );
        }
        echo json_encode($array);
    }

    public function statusallteam() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }

            $delete_data = array(
                'status' => 1,
            );
            $abc = $this->common->statusall($checkbox, $delete_data, 'team');

            $array = array(
                'success' => 'Selected Media activated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Media',
            );
        }
        echo json_encode($array);
    }

    public function statusalldeteam() {
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
            $abc = $this->common->statusall($checkbox, $delete_data, 'team');

            $array = array(
                'success' => 'Selected Media deactivated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Media',
            );
        }
        echo json_encode($array);
    }

}

?>
