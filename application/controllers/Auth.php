<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('google');
    }

    public function index(){
		$data['google_login_url']=$this->google->get_login_url();
		redirect($data['google_login_url']);
    }

    public function oauth2callback(){
		$google_data = $this->google->validate();
                if (isset($google_data['id']) && $google_data['id'] !="") {
                    $name = $google_data['name'];
                    //check if user alredy exists
                    $query = $this->db->query('SELECT * FROM users WHERE social_id="'.$google_data['id'].'" and social_platform = "google"');
        	    $user = $query->row();
                    if ($user) {
                            $_SESSION['id'] = $user->id;
                            $_SESSION['success'] = 'You have successfully logged in.';
			    redirect(site_url('my-account'));
                    } else {
                                //register user
                                $sql = "INSERT INTO users (name, email, password, status, created_at, link, everified, login_type, social_id, social_platform) VALUES ('".$name.
				"', '', '',1,'".date('Y-m-d H:i:s')."','',0,2,'".$google_data['id']."','google')";
				$this->db->query($sql);
				$id = $this->db->insert_id();
				$link = $id.time();
				$sql = "UPDATE users SET link ='".$link."' where id =".$id;
				$this->db->query($sql);
				$_SESSION['id'] = $id;
				$_SESSION['success'] = 'You have successfully registered and logged in.';
				redirect(site_url('my-account'));
                    } 
                } else {
                   $_SESSION['error'] = 'An unexpected error occurred. Please try again later.';
                   redirect(site_url('log-in'));
                }
		/*$session_data=array(
				'name'=>$google_data['name'],
				'email'=>$google_data['email'],
				'source'=>'google',
				'profile_pic'=>$google_data['profile_pic'],
				'link'=>$google_data['link'],
				'sess_logged_in'=>1
				);
			$this->session->set_userdata($session_data);
redirect(base_url());*/
   }
	
}
