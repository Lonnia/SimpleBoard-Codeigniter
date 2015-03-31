<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Board_model extends CI_Model {

   public function __construct(){ // DB에 들어가겠습니다 "DB connection"
   parent::__construct();
   $this->load->database();
   $this->load->helper('date');
 }


  public function add_board($data) {
    $newdata=array(
      'uploader' =>$data['uploader'],
      'contents'=> $data['contents'],
      'uptime' => date('Y-m-d H:i:s')
    );
    $this->db->insert('board',$newdata);
  }

  public function read_all() {
    $query = $this->db->get("board"); // table 명 

    if($query->num_rows()>0)
    {
      return $query->result_array();
      
    }
  }
}
?>