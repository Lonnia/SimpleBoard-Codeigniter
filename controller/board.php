<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seminar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->model('board_model');
		$this->load->helper('date');
		$this->load->database();
	}

	public function index()
	{
		redirect('/seminar/sub/presentation', 'location');
	}

	public function sub($menu)
	{

		// Default Load Libraries
		$this->load->library('session');

		// @import head.html 
		$this->load->view('include/header_view');
		// @import navbar.html 
		$this->load->view('include/navbar_view');


		switch($menu)
		{
			case 'presentation':
			$this->load->view('seminar/presentation_view');
			break;

			case 'framework':
			$this->load->view('seminar/framework_view');
			break;

			case 'board':
			$this->board();
			break;

			case 'web':
			$this->load->view('seminar/web_view');
			break;

			case 'source':
			$this->load->view('seminar/source_view');
			break;

			default:
			$this->load->view('seminar/presentation_view');
			break;
		}


		$this->load->view('include/footer_view');


	}

	public function board()
	{
		// initialize new variables stored POST data
		$uploader = $this->input->post('uploader');
		$contents = $this->input->post('contents');

		// if there is post data
		if( $uploader!='' && $contents!='' ){

			// initialize a new variable to store data
			$data = array(
      			'uploader' =>$uploader,
      			'contents'=> $contents,
      			'uptime' => date('Y-m-d H:i:s')
    		);

			// run add_board(a function of board_model)
			$this->board_model->add_board($data);

			// redirect ~/sub/board
			redirect('./sub/board', 'refresh');
		}else{

			// run read_all(a function of board_model)
			// store a result in a new variable
			$result = $this->board_model->read_all();

			// initialize a new variable to store a result
			$data = array('result'=>$result);

			// pass a data to view
			$this->load->view('/seminar/board_view', $data);
			
		}

	}

}
