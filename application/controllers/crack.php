<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crack extends CI_Controller {

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
		$examId = $this->getExamId();
		$this->load->library('pagination');
		$config['base_url'] = site_url('crack');
		$config['total_rows'] = $this->getQuestionCount($examId);
		$config['per_page'] = 1;
		$config["uri_segment"] = 2;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		
		if (isset($_POST['post_check']) && $_POST['post_check'] == 1) {
                       
			$question_id = $_POST['question_id'];
                        if (isset($_POST['review']) && $_POST['review']=='Mark for review') {
                               $this->insertReview($examId, $question_id, $_POST);
                        } else {
				if (isset($_POST['answer'][0]) && $_POST['answer'][0] > 0) {
					$answer = $_POST['answer'][0];
					$this->insertAnswer($examId, $question_id, $answer);
				} else {
					$this->insertAnswer($examId, $question_id, 0);
				}
                        }
			//check if this is last anser
			if ($config['total_rows'] == $page + 1) {
				die('questions finished');
			} else {
				redirect(site_url('crack/'.($page + 1)));
			}
		}
		$data['previous'] = '';
		$data['next'] = '';
		
		if ($page != 0 ) {
			$data['previous'] = '<a href="'.site_url('crack/'.($page - 1)).'"><button class="prev" type="button" style="padding: 9px 18px;">Previous</button></a>';
		}
		
		if ($config['total_rows'] > ($page + 1) ) {
			$data['next'] = '<a href="'.site_url('crack/'.($page + 1)).'"><button type="button" class="prev" style="padding: 9px 18px;">Next</button></a>';
		}
		
        $data["results"] = $this->getQuestions($examId, $config["per_page"], $page);
		if (!count($data["results"]) > 0) {
			redirect(site_url('crack/0'));
		}
		$data['page'] = $page;
        $data["links"] = $this->pagination->create_links();
		//get all questions with id
		$data['question_bank'] = $this->getQuestionsById($examId);
		$answerData = $this->getAnswerData($this->getExamId());
		$out = $this->load->view('question', array('data' => $data), true);
                $this->load->view('exam-layout',array('content' => $out));
	}
	
	protected function getAnswerData($examId) 
	{
		$sql = 'SELECT questions.id, exam.answer_id';		
	}
	
	protected function getExamId() 
	{
		return $_SESSION['exam']['exam_id'];
	}
	
	protected function getPreviousLink($page) 
	{
		$pre ='';
		if ($page > 0) {
			$pre = '<a href="'.site_url('crack/'.($page - 1)).'" >Previous</a>';
		}
		return $pre;
	}
	
	protected function getNextLink($tot, $page) 
	{
		$pre ='';
		if (!($tot == ($page + 1))) {
			$pre = '<a href="'.site_url('crack/'.($page + 1)).'">Next</a>';
		} 
		return $pre;
	}
	
	protected function getQuestionCount($examId) 
	{
		$this->load->database();
		$query = $this->db->query('select id from questions where exam ="'.$examId.'" and status = 1 order by id');
		return $query->num_rows();
	}
	
	protected function getQuestionsById($examId) 
	{
		$this->load->database();
		$query = $this->db->query('SELECT id FROM questions WHERE exam ="'.$examId.'" and status = 1 ORDER BY id DESC ');
		$result = $query->result_array();
		$return = array();
		$i = 0;
		if (count($result) > 0) {
			foreach($result as $row => $val) {
				$return[$i]['question'] = $val['id'];
				$answer = $this->db->query('SELECT answer_id, for_review FROM user_answer 
				WHERE exam_id ="'.$examId.'" and question_id = '.$val['id'].' and user_id = '.$this->id);
				$user_answer = $answer->row();
				$return[$i]['answer'] = isset($user_answer->answer_id) ? $user_answer->answer_id : 0;
				$return[$i]['review'] = isset($user_answer->for_review) ? $user_answer->for_review : 0;
				$i++;
			}
		}
		return $return;
	}
	
	protected function getQuestions($examId, $offset, $limit) 
	{
		$this->load->database();
		$query = $this->db->query('SELECT id, question FROM questions WHERE exam ="'.$examId.'" and status = 1 ORDER BY id DESC LIMIT '.$limit.','.$offset);
		$result = $query->result_array();
		$return = [];
		if (count($result) > 0) {
			foreach ($result as $row => $val) {
				$return['question'] = $val['question'];
				$return['question_id'] = $val['id'];
				$ansQuery = $this->db->query('select id, answer from answers where question_id ='.$val['id']);
				$ansResult = $ansQuery->result_array();
				if (count($ansResult) >0) {
					$ansData = array();
					foreach ($ansResult as $ansRow => $ansVal) {
						$ansData[] = array('id' => $ansVal['id'], 'answer' => $ansVal['answer']);
					}
					$return['answer'] = $ansData;
				}
			}
		}
		return $return;
	}
	
	protected function insertAnswer($examId, $question_id, $answer) 
	{
		$this->load->database();
		$this->db->query('delete from user_answer where exam_id ="'.$examId.'" and question_id = '.$question_id.' and user_id = '.$this->id);
               
	    if ($answer != 0) {    
			$this->db->query('insert into user_answer values(null,"'.$examId.'", '.$question_id.', '.$answer.', '.$this->id.', 0)');
	    }
	}

        protected function insertReview($examId, $question_id, $post) 
	{
		
                $answer = 0; 
                $this->load->database();
		$query = $this->db->query('select * from user_answer where exam_id ="'.$examId.'" and question_id = '.$question_id.' and user_id = '.$this->id);
                if ($query->num_rows() > 0 ) {
$this->db->query('update user_answer set for_review =1, answer_id ='.$answer.' where exam_id ="'.$examId.'" and question_id = '.$question_id.' and user_id = '.$this->id);
                } else {
	$this->db->query('insert into user_answer values(null,"'.$examId.'", '.$question_id.', '.$answer.', '.$this->id.', 1)');
                
                }           
	}
	
}
