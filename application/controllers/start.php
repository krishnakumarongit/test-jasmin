<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

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
		$_SESSION['exam'] = array('user_id' => $this->id,'exam_id' => '2841F3341738C9DC0D3CA84B0CE9D25D');
		redirect(site_url('crack'));
	}
	
}
