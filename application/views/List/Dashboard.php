<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $data['page_name'] = 'Dashboard';
        $data['content_view'] = 'dashboard';
        $this->index->activity_log('Dashboard');
        $data['user_detail'] = $this->common->view1();
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }
    public function newsletter_page() {
        $data['page_name'] = 'Newsletter';
        $this->index->activity_log('Newsletter list');
        $data['content_view'] = 'list/newsletter_enq';
        $data['user_detail'] = $this->common->view1();
        $data['list']= $this->common->enq('newsletter');
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }

    public function contact_enq() {
        $data['page_name'] = 'ContactENQ';
        $this->index->activity_log('Contact list');
        $data['content_view'] = 'list/contactenq';
        $data['list']= $this->common->enq('contact-form');
        $data['user_detail'] = $this->common->view1();
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }

    public function retrivecenq(){
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'newsletter');
            echo json_encode($data);
        }
    }
    public function bookingenq(){
        $data['page_name'] = 'bookingenq';
        $this->index->activity_log('Booking list');
        $data['content_view'] = 'list/booking';
        $data['list']= $this->common->enq('booking-form');
        $data['user_detail'] = $this->common->view1();
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }

    public function retrivebenq(){
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'newsletter');
            echo json_encode($data);
        }
    }
    // public function franchiseenq(){
    //     $data['page_name'] = 'franchiseenq';
    //     $data['content_view'] = 'list/franchise';
    //     $data['list']= $this->common->enq('franchise-form');
    //     $data['user_detail'] = $this->common->view1();
    //     $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
    //     $this->load->view('admin_template', $data);
    // }
    public function loginhis(){
        $data['page_name'] = 'login History';
        $this->index->activity_log('Login History');
        $data['content_view'] = 'list/loginhis';
        $data['list']= $this->common->lis('activity_logs');
        $data['user_detail'] = $this->common->view1();
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }
    public function activiloglist(){
        $data['page_name'] = 'Activity Log';
        $this->index->activity_log('Activity log');
        $data['content_view'] = 'list/activity_log';
        $data['list']= $this->common->lis('login_history');
        $data['user_detail'] = $this->common->view1();
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }
    public function fran_details($id){
        $data['page_name'] = 'franchiseenq';
        $data['content_view'] = 'list/franchise_details';
        $data['list']= $this->common->view('newsletter',$id);
        $data['user_detail'] = $this->common->view1();
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }


    



}

?>
