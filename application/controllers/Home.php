<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->load->model('Front_model', 'front');
        $this->load->model('Index_model', 'index');

    }

    public function index() {
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Home';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $data['projects']= $this->front->featured_service('product');
        $data['p1']= $this->front->list1hpsl('1');
        $data['p2']= $this->front->list1hpsl('2');
        $data['p3']= $this->front->list1hpsl('3');
        $data['p4']= $this->front->list1hpsl('4');
        $data['p5']= $this->front->list1hpsl('5');
        // $data['projectfea']= $this->front->list1sq('product');
       $this->load->view('Front/index', $data);
    }

    public function about() {
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'About Us';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/about', $data);
    }
    
    public function media(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Media';
        $data['medialist']= $this->front->frontlistwithstatus('id','team');
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/media', $data);
    }

    public function contact(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Contact';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/contact', $data);
    }
 
    public function career(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Career';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/career', $data);
    }

    public function principal_architect(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Principal Architect';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/principal-architect', $data);
    }

    public function methodology(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Methodology';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/methodology', $data);
    }
    
    public function philosophy(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Philosophy';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/philosophy', $data);
    }

    public function award(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Award';
        $data['award']= $this->front->frontlistwithstatus('id','testimonial');
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/award', $data);
    }

    public function article(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['page_name'] = 'Article';
        $data['article']= $this->front->frontlistwithstatus('id','blog');
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/article', $data);
    }
    

    public function services(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['pg']="";
        $data['page_name'] ='Services';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $this->load->view('Front/services', $data);
    }

    public function search(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $blog_url = $this->input->get('src');
        $data['blog_url']= $this->input->get('src');
        $data['blogcat']= $blog_url;
        $data['page_name'] = 'Project';
        $data['pg']="search";
        $data['project']= $this->common->subcat('tbl_subcategory');
        $data['search_project'] = $this->front->fetch_data_from_search($blog_url);
        $this->load->view('Front/project', $data);
    }

    public function projectcat(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['pg']="";
        $data['page_name'] = 'Project';
        $data['project']= $this->common->subcat('tbl_subcategory');
        $data['search_project']= $this->front->fetch_data_from_url1($this->uri->segment('2'),'url','tbl_subcategory');
        $this->load->view('Front/projectsub', $data); 
    }
    public function project(){
        $data['meta_title']='';
        $data['meta_desc']='';
        $data['meta_key']='';
        $data['pg']="";
        $data['page_name'] = 'Project';
        $data['project']= $this->common->subcat('tbl_subcategory');
        if($this->uri->segment('2')){
            $data['search_project']= $this->front->fetch_data_from_url($this->uri->segment('2'),'url','tbl_subcategory','product');
        }else{
            $data['search_project']= $this->front->frontlistwithstatus('id','product');
        }
      
        $this->load->view('Front/project', $data);
    }
    
    public function project_detail() {
        $blog_url = $this->uri->segment(2);
        $data['pro'] = $this->front->single_data_url($blog_url,'url','product');
       if(!empty($data['pro'])){
           $data['page'] = 'Project';
         
           $this->db->select('*');
           $this->db->where('url',$blog_url);
           $this->db->from('product');
           $q= $this->db->get();
           $r= $q->row();

           $data['page_name'] = 'Project';
           $data['meta_title']= $r->meta_title == '' ? $r->name : $r->meta_title;
           $data['meta_desc']=$r->meta_description;
           $data['meta_key']=$r->meta_keyword;
           $data['og_img']=$r->featured_imageurl;
           $data['project_details'] = $this->front->single_data_url($blog_url,'url','product');
           $data['images'] = $this->front->list1asc('image','name',$r->id);
           $data['project']= $this->common->subcat('tbl_subcategory');
          
           $this->load->view('Front/project-detail', $data);
            }else{
                redirect('index.html');
            }
    }


 
    public function thank(){
      $data['get']=$this->uri->segment('2');
      $data['meta_title']='';
      $data['meta_desc']='';
      $data['meta_key']='';
      $data['page_name'] = 'Thank You';
      $data['project']= $this->common->subcat('tbl_subcategory');
      $this->load->view('Front/thank-you', $data);
    }

    public function error(){
      $data['meta_title']='';
      $data['meta_desc']='';
      $data['meta_key']='';
      $data['page_name'] = 'error 404';
      $data['content_view'] = 'Front/404';
      $data['project']= $this->common->subcat('tbl_subcategory');
      $this->load->view('Front/404', $data);

    }
    public function addcontact() {
        $this->form_validation->set_error_delimiters('', '');
    
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Phone Number', 'trim|numeric|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
       
        if ($this->form_validation->run()) {

          $insert_data = array(

              'email' => $this->input->post('email'),
              'number' => $this->input->post('mobile'),
              'name' => $this->input->post('name'),
              'whereis' => $this->input->post('whereis'),
              'message' => $this->input->post('message'),
              'subject' => $this->input->post('subject'),
              'otherstext'=>$this->input->post('others'),
              'date' => DATE
          );

          $email = $this->input->post('email');
          $mobile = $this->input->post('mobile');
          $message = $this->input->post('message');

          $email1 = 'info@viveknandan.com';
          $subject = "New Contact Enquiry  on " . PRINTDATE . "\n";
          $content = 'Dear Admin' . ",\n\r";
          $content .= "\n\r";
          $content .= "You have received a new contact enquiry. Below are the details received:" . "\n";
          $content .= "\n\r";
          $content .= "Name: " . $this->input->post('name') . "\n\r";
          $content .= "Email ID: " . $email . "\n\r";
          $content .= "Contact Number: " . $mobile . "\n\r";
          $content .= "Subject: " . ($this->input->post('subject')=='Others' ? $this->input->post('others'):$this->input->post('subject')) . "\n\r";
        //   if($this->input->post('subject')=='Others'){
        //      $content .= "Subject text: " . $this->input->post('others') . "\n\r";
        //   }
          $content .= "Message: " . $message . "\n\r";

          $content .= "IP Address: " . $this->index->ipCheck() . "\n\r";
          $content .= "\n\r";
          $content .= "Regards," . "\n";
          $content .= "Vivek Nandan Architects." . "\n";
          $this->index->send_mail($email1, $email1, $content, $subject);
          $id = $this->front->insert_table('newsletter', $insert_data);
          $array = array(
            'success' => 'Contact Form Submitted successfully.'
        );
        }else{
            $array = array(
                'error' => true,
                'name_error'=> form_error('name'),
                'mobile_error' => form_error('mobile'),
                'email_error' => form_error('email'),
                'subject_error' => form_error('subject'), 
                
             );
        }
        echo json_encode($array);
 
    }

    public function add_career(){
        $this->form_validation->set_error_delimiters('', '');
    
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Phone Number', 'trim|numeric|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
       
      
        if (empty($_FILES['file']['name'])) {
            $this->form_validation->set_rules('file', 'Document', 'required|mime_in[file, application/pdf]');
        }
        if ($this->form_validation->run()) {
            $file_element_name = 'file';
            $filename = $_FILES["file"]["name"];
            $file_path = './uploads/job/';
            $file_path_image = base_url() . 'uploads/job/';
            $main_img = $this->common->pdf_upload($file_element_name, $filename, $file_path);
           
            if( $main_img['error'] == false){
            
                $insert_data = array(
                    
                    'name' => $this->input->post('fname'),
                    'exp' => $this->input->post('lname'),
                    'number' => $this->input->post('mobile'),
                    'file' => $main_img['msg'],
                    'whereis' => $this->input->post('whereis'),
                    'email'=> $this->input->post('email'),
                    'date' => DATE
                );
    
                $email = $this->input->post('email');
            
    
                $mobile = $this->input->post('phone');
    
                $message = $this->input->post('message');
    
                $email1 = 'jobs@viveknandan.com';
                $subject = "New Career Application  on " . PRINTDATE . "\n";
                $content = 'Dear Admin' . ",\n\r";
                $content .= "\n\r";
                $content .= "You have received a new career application. Below are the details received:" . "\n";
                $content .= "\n\r";
                $content .= "First Name: " . $this->input->post('fname') . "\n\r";
                $content .= "Last Name: " . $this->input->post('lname') . "\n\r";
                $content .= "Email ID: " . $this->input->post('email') . "\n\r";
                $content .= "Contact Number: " . $this->input->post('mobile') . "\n\r";
                $content .= "Ip Address: " . $this->index->ipCheck() . "\n\r";
                $content .= "\n\r";
                $content .= "Regards," . "\n";
                $content .= "Vivek Nandan Architects." . "\n";
                $this->index->send_mail($email, $email1, $content, $subject);
                $id = $this->front->insert_table('newsletter', $insert_data);
    
                if ($id) {
                    $array = array(
                        'success' => 'Career Form Submitted successfully.'
                    );
                }
            }else{
                $array = array(
                    'error' => true,
                    'file_error' => 'Please select pdf file.', 
                );
            }

        } else {
            $array = array(
                'error' => true,
                'name_error'=> form_error('fname'),
                'mobile_error' => form_error('mobile'),
                'email_error' => form_error('email'),
                'file_error' => form_error('file'), 
                'name1_error' => form_error('lname'),
             );
        }
        echo json_encode($array);
    }   
}