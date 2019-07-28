<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller {

	public function index($id)
	{
	    $query = $this->db->query('SELECT * FROM users WHERE link='.$id);
            $user = $query->row();
            if ($user) {
                $sql = "UPDATE users SET link ='', everified = 1 WHERE id =".$user->id;
                $this->db->query($sql);
                redirect(site_url('everify'));
	    } else {
		redirect('log-in');
	    }
           
		
	}
	
	public function everify()
	{
	   $meta = array('title' => 'Email verified', 'description' => 'You have verified your Email address', 'keywords' => '');
	   $bc = array('title' => 'Email verified', 'link' => '<li><a href="'.base_url().'">Home</a></li><li>Email Verified</li>');
	   $out = $this->load->view('everified', array(), true);
	   $this->load->view('layout',array('content' => $out,'meta' => $meta, 'bc' => $bc));	
	}

        public function newpass()
	{
	   $meta = array('title' => 'Password updated', 'description' => 'You have successfully updated your password ', 'keywords' => 'password reset');
	   $bc = array('title' => 'Password updated', 'link' => '<li><a href="'.base_url().'">Home</a></li><li>Password Updated</li>');
	   $out = $this->load->view('newpass', array(), true);
	   $this->load->view('layout',array('content' => $out,'meta' => $meta, 'bc' => $bc));	
	}


        public function reset($id)
        {
            	
	    $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $query = $this->db->query('SELECT * FROM password_reset WHERE link='.$id);
            $pass  = $query->row(); 
            if ($pass) {
            } else {
                redirect('log-in');
            }
            $userQuery = $this->db->query('SELECT * FROM users WHERE id='.$pass->user_id);
            $user = $userQuery->row();
            if ($user) {
                $chk = $this->input->post('chk');
		if ($chk == 1) {
                       
			$this->form_validation->set_rules('password', 'New Password', 'required|min_length[6]',
                        array('required' => 'You must provide a %s.'));
                        $this->form_validation->set_rules('cpassword', 'Retype Password', 'required|matches[password]');
                        if ($this->form_validation->run() == true) {
				$sql = "UPDATE users SET password='".md5($this->input->post('password'))."' WHERE id =".$user->id;
			        $this->db->query($sql);
				$this->db->query('DELETE FROM password_reset where user_id ='.$user->id);
                                redirect(site_url('reset-success'));
			}
		}
                $meta = array('title' => 'Reset Password', 'description' => 'reset your password', 'keywords' => 'reset password');
	  	$bc = array('title' => 'Reset Password', 'link' => '<li><a href="'.base_url().'">Home</a></li><li>Reset Password</li>');
	   	$out = $this->load->view('reset', array(), true);
	   	$this->load->view('layout',array('content' => $out,'meta' => $meta, 'bc' => $bc));
	    } else {
		redirect('log-in');
	    }
        }
}
