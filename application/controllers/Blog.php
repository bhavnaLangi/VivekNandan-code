<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->load->model('Index_model', 'index');
        $this->login->is_logged_in();
        $this->index->activity_update();
    }

    public function index() {
        $data['page_name'] = 'Blog Category List';
        $this->index->activity_log('Author Add');
        $data['blogcategory_list'] = $this->common->list('blogcategory');
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Blog/blogcategory_list';
        $this->load->view('admin_template', $data);
    }

    //blog category

    public function blogcategory_list() {
        $data['page_name'] = 'Blog Category List';
        $this->index->activity_log('Blog Category List');
        $data['blogcategory_list'] = $this->common->list('blogcategory');
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Blog/blogcategory_list';
        $this->load->view('admin_template', $data);
    }

        public function add_blogcategory() {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('category_name', 'blog category Name', 'trim|required|is_unique[blogcategory.category_name]', array('is_unique' => 'This %s already exists.'));
            if ($this->form_validation->run()) {
                $insert_data = array(
                    'category_name' => $this->input->post('category_name'),
                    'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
                    'status' => '1',
                    'createdBy' => $this->session->userdata('user_id'),
                    'createdDate' => DATE
                );
                $id = $this->common->insert_table('blogcategory', $insert_data);
                if ($id) {
                    $array = array(
                        'success' => 'Blog Category added successfully.'
                    );
                }
            } else {
                $array = array(
                    'error' => true,
                    'categoryname_error' => form_error('category_name')
                );
            }
            echo json_encode($array);
        }

        public function fetch_blogcategory() {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $id = $this->input->post('id');
                $data = $this->common->fetch_data($id, 'blogcategory');
                echo json_encode($data);
            }
        }

        function check_order_no($order_no) {
            if ($this->input->post('id'))
                $id = $this->input->post('id');
            else
                $id = '';
            $result = $this->common->check_unique_order_no( $order_no, 'blogcategory', 'category_name',$id);
            if ($result == 0)
                $response = true;
            else {
                $this->form_validation->set_message('check_order_no', 'Category Name  already exist');
                $response = false;
            }
            return $response;
        }

        public function edit_blogcategory() {
            $id = $this->input->post('id');
            $this->index->activity_log('Edit Blog Category');

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('category_name', 'category Name', 'required|callback_check_order_no');

            if ($this->form_validation->run()) {
                $id = $this->input->post('id');
                $update_data = array(
                    'category_name' => $this->input->post('category_name'),
                    'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
                    // 'createdDate' => DATE
                );
                $this->common->update_table('blogcategory', $update_data, $id);
                if($this->db->affected_rows() == 0){

                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                }else{
                    $update_data['createdDate'] = DATE;
                    $this->common->update_table('blogcategory', $update_data, $id);
                $array = array(
                    'success' => 'Blog Category updated successfully.'
                );
            }
            } else {
                $array = array(
                    'error' => true,
                    'category_error' => form_error('category_name')
                );
            }
            echo json_encode($array);
        }

        public function delete_blogcategory() {

            $this->index->activity_log('Blog Category Delete');
            $id = $this->input->post('id');

            $this->common->delete_table('blogcategory', $id);
            $this->common->delete_table1('blog', 'category_id', $id);

            $array = array(
                'success' => 'Blog Category deleted successfully.'
            );
            echo json_encode($array);
        }

        public function status_blogcategory() {
            $this->index->activity_log('Blog Category status');
            $id = $this->input->post('id');
            $delete_data = array(
                'status' => $this->input->post('status_id'),
            );
            $this->common->update_table('blogcategory', $delete_data, $id);
            $this->common->update_table1('blog', $delete_data, 'category_id', $id);
            $array = array(
                'success' => 'Blog Category status updated successfully.'
            );
            echo json_encode($array);
        }

    // Blog Functionality

    public function addblog() {
        $data['page_name'] = 'Add Articles';
        $this->index->activity_log('Add Articles');
        $data['blog_list'] = $this->common->list('blog');
        
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Blog/addblog';
        $this->load->view('admin_template', $data);
    }

    public function blog_list() {
        $data['page_name'] = 'Articles List';
        $this->index->activity_log('Articles list');
        $data['blog_list'] = $this->common->list('blog');
      
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Blog/blog_list';
        $this->load->view('admin_template', $data);
    }

    public function upload() {
        $config['upload_path'] = './upload';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('upload')) {
            echo json_encode(array('error' => $this->upload->display_errors()));
        } else {
            $upload_data = $this->upload->data();
            $url = base_url() . 'upload/' . $upload_data['file_name'];
            $message = '';
            $function_number = $this->input->get('CKEditorFuncNum');
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
    }

//ADD BLOG
    public function insert_blog() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('blogtitle', 'blogtitle', 'trim|required');
       
        
        if ($this->form_validation->run()) {
            $insert_data = array(

                'title' => $this->input->post('blogtitle'),
                'blog_url' => $this->common->cleanStr($this->input->post('blogtitle')),
                'url' => $this->common->cleanStr($this->input->post('blogtitle')),
                'createdDate'=>DATE,
                'status'=>'1',
            );

        $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");
        $extensionResume1 = array("pdf");
        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume1) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                redirect('add-blog');
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
                redirect('add-blog');
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/pdf/';
            $file_path_image = base_url().'uploads/pdf/';
            $image = $this->common->upload_image1($image_data, 1, $path);
            $insert_data['main_image'] = $image;
            $insert_data['main_imageurl'] = $file_path_image . $image;
        }



        if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
            $extId2 = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId2, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
            }
            if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
            }

            $image_data = $_FILES['featured_image'];
            $path = './uploads/blog_feature_img/';
            $file_path_image = base_url() . 'uploads/blog_feature_img/';
            $image = $this->common->upload_image($image_data, 2, $path);
            $insert_data['featured_image'] = $image;
            $insert_data['featured_imageurl'] = $file_path_image . $image;
        }


        //insert data into database table.  
        $id = $this->common->insert_table('blog', $insert_data);

        $lid = $this->db->insert_id();
        $url = array(
            'column_id' => $lid,
            'type' => 'blog',
            'old_url' => '',
            'new_url' => str_replace(' ', '-', strtolower($this->input->post('blogtitle'))),
        );
        $this->common->insert_table('url_redirections', $url);
        if ($id) {
            $this->session->set_flashdata('success', 'Articles added successfully.');
            redirect("add-blog");
        }
    }else{
        $this->session->set_flashdata('error', 'Something went wrong ');
            redirect("add-blog");
    }
    }

    public function edit_blog($id) {

        $data['page_name'] = 'Edit Articles';
        $this->index->activity_log('Edit Articles ');
        $data['edit_details'] = $this->common->view('blog', $id);
    
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Blog/editblog';
        $this->load->view('admin_template', $data);
    }

    public function editblog() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('blogtitle', 'blogtitle', 'trim|required');
      
        
        if ($this->form_validation->run()) {
        $id = $this->input->post('id');

        $update_data = array(
        
            
            'title' => $this->input->post('blogtitle'),
            'blog_url' => $this->common->cleanStr($this->input->post('blogtitle')),
            'url' => $this->common->cleanStr($this->input->post('blogtitle')),
            'status'=>'1',
        );
    

        $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");
        $extensionResume1 = array("pdf");
        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume1) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                redirect("edit-blog/" . $id);
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
                redirect("edit-blog/" . $id);
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/pdf/';
            $file_path_image = base_url().'uploads/pdf/';
            $image = $this->common->upload_image1($image_data, 1, $path);
            $update_data['main_image'] = $image;
            $update_data['main_imageurl'] = $file_path_image . $image;
        }

        if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
            $extId1 = pathinfo($_FILES['featured_image1']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId1, $extensionResume) && (!empty($_FILES["pic"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
            }
            if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
            }

            $image_data = $_FILES['featured_image'];
            $path = './uploads/blog_feature_img/';
            $file_path_image = base_url() . 'uploads/blog_feature_img/';
            $image = $this->common->upload_image($image_data, 2, $path);

            $update_data['featured_image'] = $image;

            $update_data['featured_imageurl'] = $file_path_image . $image;
        }
        // print_r($update_data);
        $this->common->update_table('blog', $update_data, $id);
        $adf = $this->db->affected_rows();
    //   exit();
        $bb = str_replace(' ', '-', strtolower($this->input->post('blogtitle')));
        $this->db->select('*');
        $this->db->where('column_id', $id);
        $this->db->from('url_redirections');
        $query = $this->db->get();
        $row = $query->row();
        if ($row->new_url != $bb) {
            $url = array(
                'old_url' => $row->new_url,
                'new_url' => $bb,
            );
            $this->common->update_table1('url_redirections', $url, 'column_id', $id);
        }
        
       
        if($adf == 0){
            $this->session->set_flashdata('warning', 'You have made no changes.');
            redirect("edit-blog/".$id);
        }else{
            $update_data['createdDate'] = DATE;
            $this->common->update_table('blog', $update_data, $id);
            $this->session->set_flashdata('success', 'Articles updated successfully ');
            redirect("edit-blog/".$id);
        }
    }else{
        $this->session->set_flashdata('error', 'Something went wrong ');
        redirect("edit-blog/".$id);
    }
    }

    public function fetch_blog() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'blog');
            echo json_encode($data);
        }
    }

    public function delete_blog() {

        $this->index->activity_log('Articles Delete');
        $id = $this->input->post('id');

        $this->common->delete_table('blog', $id);
        $array = array(
            'success' => 'Articles data deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_blog() {
        $id = $this->input->post('id');
        $this->index->activity_log('Articles Status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('blog', $delete_data, $id);
        $array = array(
            'success' => 'Articles status updated successfully.'
        );
        echo json_encode($array);
    }

    public function feature_blog() {
        $id = $this->input->post('id');
        $this->index->activity_log('Blog feature');

        if ($this->input->post('status_id') == '1') {
            $this->db->select('*');
            $this->db->where('alt_features', '1');
            $this->db->from('blog');
            $query = $this->db->get();

            if ($query->num_rows() >= 3) {
                $array = array(
                    'error' => 'Only 3 Articles can be featured.'
                );
            } else {
                $delete_data = array(
                    'alt_features' => $this->input->post('status_id'),
                );
                $this->common->update_table('blog', $delete_data, $id);

                $array = array(
                    'success' => 'Articles Featured status Updated successfully.'
                );
            }
        } else {
            $delete_data = array(
                'alt_features' => $this->input->post('status_id'),
            );
            $this->common->update_table('blog', $delete_data, $id);

            $array = array(
                'success' => 'Articles Featured status Updated successfully.'
            );
        }

        echo json_encode($array);
    }

    public function editseo($id) {

        if ($id == 'editseo') {
           

                $id = $this->input->post('id');
                $update_data = array(
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'url' => $this->input->post('url'),
                    'alt_tag_main_img' => $this->input->post('alt_tag_main_img'),
                    'alt_tag_featured_img' => $this->input->post('alt_tag_featured_img'),
                    'schemap' => $this->input->post('schemap'),
                );
               
                $bb = str_replace(' ', '-', strtolower($this->input->post('url')));
                $this->db->select('*');
                $this->db->where('column_id', $id);
                $this->db->from('url_redirections');
                $query = $this->db->get();
                $row = $query->row();
                if ($row->new_url != $bb) {
                    $url = array(
                        'old_url' => $row->new_url,
                        'new_url' => $bb,
                    );
                    $this->common->update_table1('url_redirections', $url, 'column_id', $id);
                }
                $this->common->update_table('blog', $update_data, $id);
             if($this->db->affected_rows() == 0){
                 $array = array(
                  'error' => 'You have made no changes.'
                 );
             }else{
                 $array = array(
                    'success' => 'SEO data Updated successfully.'
                );
             }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Articles List';
            $data['edit_details'] = $this->common->view('blog', $id);
            $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();
            $this->index->activity_log('Blog Seo');
            $data['content_view'] = 'Blog/seo';
            $this->load->view('admin_template', $data);
        }
    }

    public function deleteAllblogcat() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }
            $abc = $this->common->deleteAll($checkbox, 'blogcategory');

            $abc = $this->common->deleteAllcat($checkbox, 'blog');

            $array = array(
                'success' => 'Selected Articles Category deleted successfully',
            );
        } else {

            $array = array(
                'error' => 'Select atleast Articles Category',
            );
        }
        echo json_encode($array);
    }

    public function statusallblogcat() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }

            $delete_data = array(
                'status' => 1,
            );
            $abc = $this->common->statusall($checkbox, $delete_data, 'blogcategory');
            $abc = $this->common->statusall1($checkbox, $delete_data, 'blog');

            $array = array(
                'success' => 'Selected Articles Category activated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Articles Category',
            );
        }
        echo json_encode($array);
    }

    public function statusalldeblogcat() {
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
            $abc = $this->common->statusall($checkbox, $delete_data, 'blogcategory');
            $abc = $this->common->statusall1($checkbox, $delete_data, 'blog');

            $array = array(
                'success' => 'Selected Articles Category deactivated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Articles Category',
            );
        }
        echo json_encode($array);
    }

    public function deleteAllblog() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }
            $abc = $this->common->deleteAll($checkbox, 'blog');

            $array = array(
                'success' => 'Selected Articles deleted successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Articles',
            );
        }
        echo json_encode($array);
    }

    public function statusallblog() {
        if (!empty($this->input->post('checkbox_value'))) {
            $checkboxs = $this->input->post('checkbox_value');
            $checkbox = [];
            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }

            $delete_data = array(
                'status' => 1,
            );
            $abc = $this->common->statusall($checkbox, $delete_data, 'blog');

            $array = array(
                'success' => 'Selected Articles activated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Articles',
            );
        }
        echo json_encode($array);
    }

    public function statusalldeblog() {
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
            $abc = $this->common->statusall($checkbox, $delete_data, 'blog');

            $array = array(
                'success' => 'Selected Articles deactivated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one Articles',
            );
        }
        echo json_encode($array);
    } 
}
