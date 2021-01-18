<?php
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Result_Exam{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

  public function updateQuestion($quesNo, $data){
    //$quesNo = (int)mysqli_real_escape_string($this->db->link,$data['quesNo']);
    $ques = mysqli_real_escape_string($this->db->link,$data['ques']);
    $ans = array();
    $ans[1] = $data['ans1'];
    $ans[2] = $data['ans2'];
    $ans[3] = $data['ans3'];
    $ans[4] = $data['ans4'];
    $rightAns = $data['rightAns'];
  if($quesNo != ""){
    //update question
    $query = "UPDATE tbl_word_ques
                SET
                ques = '$ques'
                WHERE quesNo = '$quesNo'";
                $updated_row = $this->db->update($query);
// update answer
 if($updated_row){
      foreach ($ans as $key => $ansName) {
        if ($ansName != '') {
         if ($rightAns == $key) {
           $query = "UPDATE tbl_word_ans
                       SET
                       rightAns = '1',
                       T_rightAns = '$rightAns',
                       ans = '$ansName'
                       WHERE quesNo = '$quesNo' AND sub_ans_ID = '$key'";
                       $updated_row = $this->db->update($query);

          }else{
            //echo $key;
           $query = "UPDATE tbl_word_ans
                       SET
                       rightAns = '0',
                       ans = '$ansName'
                       WHERE quesNo = '$quesNo' AND sub_ans_ID = '$key'";
                       $updated_row = $this->db->update($query);
              }
       }
     }
  }
   }else{
     $msg = "<span class='success'>No Data !  </span>";
     return $msg;
   }
//end update answer
//alert message after updated
         if ($updated_row) {

           $msg = "<span class='success'>Question Updated !  </span>";
            header("Location:word_queslist.php");
           return $msg;
          //header("Location:word_queslist.php");
           //continue;
         }else{
           $msg = "<span class='error'>User Data Not Updated !  </span>";
        return $msg;
         }
}
  // public function Up($quesNo){
  //   $id = $quesNo;
  //   header("Location:word_ques_update.php");
  //   return $id;
  // }
  public function getResult(){
      $query = "SELECT * FROM tbl_result";
       $result = $this->db->select($query);
       return $result;
  }
}
