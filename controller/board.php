<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->model('board_model');
		$this->load->helper('date');
	}

	public function index(){

		// POST로 넘겨받은 내용을 변수에 저장
		$uploader = $this->input->post('uploader');

    	// POST로 넘겨받은 내용을 변수에 저장
		$contents = $this->input->post('contents');

		// 넘어온 변수를 체크한다. 내용이 비어있지 않으면 파일을 열어 기록한다.
		if( $uploader!='' && $contents!='' ){

			$data=array(
      			'uploader' =>$uploader,
      			'contents'=> $contents,
      			'uptime' => date('Y-m-d H:i:s')
    		);

			$this->board_model->add_board($data);
			echo "업로드 완료";
			redirect('./', 'refresh');
		}else{
			$result = $this->board_model->read_all();
			$data = array('result'=>$result);
			$this->load->view('board_view', $data);
		}

	}


}

?>