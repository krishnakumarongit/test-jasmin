<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller {


	public function index()
	{
		$this->load->view('survey',array());
	}

    public function addquestion() {
	    $question = $this->input->post('question');
	    $answer = $this->input->post('answer');
	    $this->db->query('INSERT INTO survey_questions values (null, "'.$question.'","'.$answer.'")');
	    return json_encode(array(1));
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
