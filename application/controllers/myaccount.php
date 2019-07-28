<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Controller {

    protected $id;
    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id']) && $_SESSION['id'] > 0 ) {
			$this->id = $_SESSION['id'];
		} else {
			redirect('log-in');
	    }
    }

	public function index()
	{
		$query = $this->db->query('SELECT * FROM users WHERE id='.$this->id);
        $user = $query->row();
        if ($user) {
		} else {
			redirect('log-in');
		}
		
	$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $postCheck = $this->input->post('profile');
		if ($postCheck == 1) {
		   $temp = 0;
		   $this->form_validation->set_rules('name', 'Full Name', 'required|min_length[3]');
		   if ($this->input->post('email') != $user->email) {
                     $temp = 1;
                     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
	       }  else {
			   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		   }
		   if ($this->form_validation->run() == true) {
			    $link = $user->id.time();
			    $sql = "UPDATE users SET name='".$this->input->post('name')."' WHERE id =".$user->id;
			    if ($temp == 1) {
					//send email verification link from here
					$sql = "UPDATE users SET name='".$this->input->post('name')."',email='".$this->input->post('email')."',link ='".$link."', everified = 0 WHERE id =".$user->id;
                               
                                
			    }
                $this->db->query($sql);
                $_SESSION['success'] = 'Your account updated successfully.';
                if ($temp == 1) {
                   $this->sendEmail($this->input->post('name'), $this->input->post('email'), $link);
                }
                redirect(site_url('my-account'));
		   }
		   $user->name = $this->input->post('name');
		   $user->email = $this->input->post('email');
		}
		
		
		$chk = $this->input->post('chk');
		if ($chk == 1) {
			$_POST['oc_password'] = $user->password;
			$_POST['opassword'] = md5($_POST['opassword']);
			$this->form_validation->set_rules('opassword', 'Current Password', 'required|min_length[6]',
                        array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('oc_password', 'System Stored Password', 'required|matches[opassword]');
			$this->form_validation->set_rules('password', 'New Password', 'required|min_length[6]',
                        array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('cpassword', 'Retype Password', 'required|matches[password]');
             if ($this->form_validation->run() == true) {
				$sql = "UPDATE users SET password='".md5($this->input->post('password'))."' WHERE id =".$user->id;
			    $this->db->query($sql);
                $_SESSION['success'] = 'Your password updated successfully.';
                redirect(site_url('my-account'));
			 }
		}
		
		$meta = array('title' => 'My Account', 'description' => '', 'keywords' => '');
		$bc = array('title' => 'My Account', 'link' => '<li><a href="'.base_url().'">Home</a></li><li>My Account</li>');
		$out = $this->load->view('myaccount', array('user' => $user), true);
		$this->load->view('layout',array('content' => $out,'meta' => $meta, 'bc' => $bc));
	}

        protected function sendEmail($fullName, $email, $link) 
        {
		$this->config->load('config');
	    	$array['subject'] = 'Verify your email on '. $this->config->item('site_domain');
		$array['sender'] = array('name' =>  $this->config->item('site_name'), 'email' =>'201907222049.28647049849@smtp-relay.mailin.fr');
		$array['htmlContent'] = 'Dear '.$fullName.',<br /><br /> Welcome to '.$this->config->item('site_name').'.<br /><br />
Please click the link to verify your email
<br />
<a href="'.site_url('verify/'.$link).'">'.site_url('verify/'.$link).'</a>
<br /><br />
This is a system generated mail. Please DO NOT REPLY to this mail.
<br /><br />
'.$this->config->item('site_name').' team<br />'.$this->config->item('site_email');
		$array['to'] = array(array('name' => $fullName, 'email' => $email));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
		curl_setopt($ch, CURLOPT_POST, 1);
		$headers = array();
		$headers[] = 'Api-Key: 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';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		curl_close($ch);
        }



	
}
