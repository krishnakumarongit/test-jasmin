<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (isset($_SESSION['id']) && $_SESSION['id'] > 0 ) {
			redirect('my-account');
		}
		$this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
                $postCheck = $this->input->post('chk');
                if ($postCheck == 1) {
		  if ($this->form_validation->run() == true) {
			$query = $this->db->query('SELECT * FROM users WHERE email="'.$this->input->post('email').'" and status = 1 and password="'.md5($this->input->post('password')).'"');
        		$user = $query->row();
                        if ($user) {
                            $_SESSION['id'] = $user->id;
                            $_SESSION['success'] = 'You have successfully logged in.';
			    redirect(site_url('my-account'));
                        } else {
                           $_SESSION['error'] = 'Login failed invalid credentials.';
                           redirect(site_url('log-in'));
                        } 
		  }
                 }
		$meta = array('title' => 'Log in', 'description' => 'Log-in to your account', 'keywords' => 'login');
		$bc = array('title' => 'Log in', 'link' => '<li><a href="'.base_url().'">Home</a></li><li>Log in</li>');
		$out = $this->load->view('login', array(), true);
		$this->load->view('layout',array('content' => $out,'meta' => $meta, 'bc' => $bc));
	}
	
	public function logout()
	{
		$_SESSION = array();
		session_destroy();
		redirect(site_url('log-in'));
	}
	
	public function signup()
	{
		
	$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',
                        array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('cpassword', 'Retype Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');   
        $postCheck = $this->input->post('check_post');
            if ($postCheck == 1) {
                if ($this->form_validation->run() == true) {
				$sql = "INSERT INTO users (name, email, password, status, created_at, link, everified) VALUES ('".$this->input->post('fullname').
				"', '".$this->input->post('email')."', '".md5($this->input->post('password'))."',1,'".date('Y-m-d H:i:s')."','',0)";
                $this->db->query($sql);
                $id = $this->db->insert_id();
                $link = $id.time();
                $sql = "UPDATE users SET link ='".$link."' where id =".$id;
                $this->db->query($sql);
                $_SESSION['id'] = $id;
                $_SESSION['success'] = 'You have successfully registered and logged in.';
		$this->sendEmail($this->input->post('fullname'), $this->input->post('email'), $link);
		redirect(site_url('my-account'));
		}
	    }
		$meta = array('title' => 'Sign up', 'description' => 'sin-up to '.$this->config->item('site_domain'), 'keywords' => 'sign-up');
		$bc = array('title' => 'Sign up', 'link' => '<li><a href="'.base_url().'">Home</a></li><li>Sign up</li>');
		$out = $this->load->view('signup', array(), true);
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


        public function forgot() 
        {
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0 ) {
			redirect('my-account');
		}
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
                $postCheck = $this->input->post('check_post');
                if ($postCheck == 1) {
                    if ($this->form_validation->run() == true) {
				$query = $this->db->query('SELECT * FROM users WHERE email="'.$this->input->post('email').'"');
				$user = $query->row();
				if ($user) {
                                    //check if todays email sent is grater than 5
                                    $query = $this->db->query('SELECT id FROM password_reset WHERE user_id='.$user->id.' and date="'.date('Y-m-d').'"');
                                    if ($query->num_rows() > 4) {
					$_SESSION['error'] = 'You have reached todays limit for sending password reset mail. <br /> Please try again tomorrow.';
                                    } else {
                                    //create password resetlink
                                    $link = time().$user->id;
                                    $sql = "INSERT INTO password_reset (user_id, link, date) VALUES (".$user->id.
				", '".$link."','".date('Y-m-d')."')";
                                    $this->db->query($sql);
                                    $_SESSION['success'] = 'Your password reset email has been sent. <br />You will receive an email with the subject line "Reset your '.$this->config->item('site_domain').' Password" that contains a link to reset your password.';
                                    }
                                    $this->sendForgotReset($user->name, $user->email, $link);
                                    redirect(site_url('forgot-password'));
				} else {
                                    $_SESSION['error'] = 'This email address is not registered with us.';
                                    redirect(site_url('forgot-password'));
				}

                    }
                }
                $meta = array('title' => 'Forgot Password', 'description' => 'forgot password', 'keywords' => 'forgot password');
		$bc = array('title' => 'Forgot Password', 'link' => '<li><a href="'.base_url().'">Home</a></li><li>Forgot Password</li>');
		$out = $this->load->view('forgot', array(), true);
		$this->load->view('layout',array('content' => $out,'meta' => $meta, 'bc' => $bc));
        
        }
        
        protected function sendForgotReset($fullName, $email, $link) 
        {
		$this->config->load('config');
	    	$array['subject'] = 'Reset your '.$this->config->item('site_domain'). ' password';
		$array['sender'] = array('name' =>  $this->config->item('site_name'), 'email' =>'201907222049.28647049849@smtp-relay.mailin.fr');
		$array['htmlContent'] = 'Dear '.$fullName.',<br /><br /> Welcome to '.$this->config->item('site_name').'.<br /><br />
Please click the link to reset your password
<br />
<a href="'.site_url('reset/'.$link).'">'.site_url('reset/'.$link).'</a>
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
