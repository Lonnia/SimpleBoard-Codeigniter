<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Board_model extends CI_Model {

   public function __construct(){ // DB에 들어가겠습니다 "DB connection"
   parent::__construct();
   $this->load->database();
   $this->load->helper('date');
 }


  public function add_board($data) {

    // initialize a new variable to store a result
    $newdata = array(
      'uploader' =>$data['uploader'],
      'contents'=> $data['contents'],
      'uptime' => date('Y-m-d H:i:s')
    );

    // insert a new data into board (a table of database)
    $this->db->insert('board',$newdata);
  }

  public function read_all() {

    // get all data from board(a table of database)
    $query = $this->db->get("board"); 

    // if a number of data is greather than 0 
    // == there is a data at leat one
    if($query->num_rows()>0) {
      return $query->result_array();   
    }
    
  }

}
