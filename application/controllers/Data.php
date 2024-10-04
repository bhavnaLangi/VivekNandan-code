<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }


    public function index(){

        //$filename = base_url().'digihjxp_com_db.sql';
       

        $fields = array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    
            ),
            'flag' => array(
                    'type' =>'INT',
                   
                  
            ),
            'compemail' => array(
                    'type' => 'TEXT',
                   
            ),

            'contact' => array(
                    'type' => 'TEXT',
                   
            ),
             'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',  
                   
            ),
            'password' => array(
                'type' => 'TEXT',
               
            ),
            'login_otp' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'loginotpcount' => array(
                'type' => 'INT',
                'constraint' => 11,
               
            ),
            'forgot_otp' => array(
                'type' => 'INT',
                'constraint' => 11,
               
            ),

            'forgototp_count' => array(
                'type' => 'INT',
                'constraint' => 11,
               
            ),

            'pic_url' => array(
                'type' => 'TEXT',
            ),

            'role' => array(
                'type' => 'TEXT',
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'createdDate' => array(
                'type' => 'DATETIME',
                
            ),
            'pic' => array(
                'type' => 'TEXT',
            ),
            'favicon' => array(
                'type' => 'TEXT',
            ),
            'fav_url' => array(
                'type' => 'TEXT',
            ),
            
            'logo' => array(
                'type' => 'TEXT',
            ),

            'logo_url' => array(
                'type' => 'TEXT',
            ),

            'insta' => array(
                'type' => 'TEXT',
            ),
            'fb' => array(
                'type' => 'TEXT',
            ),

            'twitter' => array(
                'type' => 'TEXT',
            ),
            'wp' => array(
                'type' => 'TEXT',
            ),

            'link' => array(
                'type' => 'TEXT',
            ),
            'yt' => array(
                'type' => 'TEXT',
            ),
            'metatitle' => array(
                'type' => 'TEXT',
            ),
            'metades' => array(
                'type' => 'TEXT',
            ),
            'bpcolor' => array(
                'type' => 'TEXT',
            ),
            'bscolor' => array(
                'type' => 'TEXT',
            ),
            'pcolor' => array(
                'type' => 'TEXT',
            ),
            'scolor' => array(
                'type' => 'TEXT',
            ),
            'paracolor' => array(
                'type' => 'TEXT',
            ),
            'tcolor' => array(
                'type' => 'TEXT',
            ),
            'smtp_host' => array(
                'type' => 'TEXT',
            ),
            'smtp_pass' => array(
                'type' => 'TEXT',
            ),
            'smtp_user' => array(
                'type' => 'TEXT',
            ),
            'smtp_port' => array(
                'type' => 'TEXT',
            ),
            
    );
   $this->dbforge->addKey('id', true);
    $this->dbforge->add_field($fields);
    $this->dbforge->create_table('user_login', TRUE);


    $fields1 = array(
        'id ' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                
        ),
        'user_id' => array( 
                'type' =>'INT',
               
              
        ),
        'activity' => array(
                'type' => 'TEXT',
               
        ),

        'landing_page' => array(
                'type' => 'TEXT',
               
        ),
         'page_url' => array(
            'type' => 'VARCHAR',
            'constraint' => '250',  
               
        ),
        'craetedDate' => array(
            'type' => 'DATETIME',
           
        ),
        'logintime' => array(
            'type' => 'TEXT',
            
        ),
        'logouttime' => array(
            'type' => 'TEXT',
          
           
        ),
        'account_name' => array(
            'type' => 'TEXT',
          
           
        ),

        'session_id' => array(
            'type' => 'TEXT',
           
           
        ),

        'useragent' => array(
            'type' => 'TEXT',
        ),

        'name' => array(
            'type' => 'TEXT',
        ),
        'version' => array(
            'type' => 'TEXT',
           
        ),
        'platform' => array(
            'type' => 'TEXT',
            
        ),
        'device' => array(
            'type' => 'TEXT',
        ),
        'status' => array(
            'type' => 'INT',
        ),
        'expire_time' => array(
            'type' => 'DATETIME',
        ),
        
        'admin_logged_in' => array(
            'type' => 'TEXT',
        ),
   
);
$this->dbforge->addKey('id', true);
$this->dbforge->add_field($fields1);
$this->dbforge->create_table('activity_logs', TRUE);


public function drop_table($tblname){
    $forge->dropTable($tblname, true);
}

}

}