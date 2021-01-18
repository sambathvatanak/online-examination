<?php
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Power_Exam{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

  public function addQuestions($data){
    $quesNo = mysqli_real_escape_string($this->db->link,$data['quesNo']);
    $ques = mysqli_real_escape_string($this->db->link,$data['ques']);
    $ans = array();
    $ans[1] = $data['ans1'];
    $ans[2] = $data['ans2'];
    $ans[3] = $data['ans3'];
    $ans[4] = $data['ans4'];
    $rightAns = $data['rightAns'];
    $query = "INSERT INTO tbl_power_ques(quesNo,ques) VALUES('$quesNo','$ques')";
    $inserted_row = $this->db->insert($query);
    if ($inserted_row) {
      foreach ($ans as $key => $ansName) {
        if ($ansName != '') {
         if ($rightAns == $key) {
           $rquery = "INSERT INTO tbl_power_ans(quesNo,rightAns,T_rightAns,ans,sub_ans_ID) VALUES('$quesNo','1','$rightAns','$ansName','$key')";

         }else{
          $rquery = "INSERT INTO tbl_power_ans(quesNo,rightAns,T_rightAns,ans,sub_ans_ID) VALUES('$quesNo','0','$rightAns','$ansName','$key')";
         }
         $insertrow = $this->db->insert($rquery);
         if ($insertrow) {
           continue;
         }else{
          die('Error....');
         }

        }
      }
     $msg = "<span class='success'>Question Added Successfully...</span>";
     return $msg;

    }
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
    $query = "UPDATE tbl_power_ques
                SET
                ques = '$ques'
                WHERE quesNo = '$quesNo'";
                $updated_row = $this->db->update($query);
  // update answer
  if($updated_row){
      foreach ($ans as $key => $ansName) {
        if ($ansName != '') {
         if ($rightAns == $key) {
           $query = "UPDATE tbl_power_ans
                       SET
                       rightAns = '1',
                       T_rightAns = '$rightAns',
                       ans = '$ansName'
                       WHERE quesNo = '$quesNo' AND sub_ans_ID = '$key'";
                       $updated_row = $this->db->update($query);

          }else{
            //echo $key;
           $query = "UPDATE tbl_power_ans
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
  public function getQues($id){
      $query = "SELECT * FROM tbl_power_ques WHERE quesNo= '$id'";
       $result = $this->db->select($query);
       return $result;
  }

  public function getRightAns($quesNo){
    $query = "SELECT T_rightAns FROM tbl_power_ans WHERE quesNo= '$quesNo' AND rightAns= '1'";
     $result = $this->db->select($query);
     return $result;
  }

  public function getAns($id){
      $query = "SELECT * FROM tbl_power_ans WHERE quesNo= '$id'";
       $result = $this->db->select($query);
       return $result;
  }

  public function getQueByOrder(){
    $query = "SELECT * FROM  tbl_power_ques ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function delQuestion($quesNo){

$tables = array("tbl_power_ques","tbl_power_ans");
foreach ($tables as $table) {
  $delquery = "DELETE FROM $table WHERE quesNo ='$quesNo'";
  $deldata = $this->db->delete($delquery);
}
if ($deldata) {
  $msg = "<span class='success'>Data Deleted Successfully...</span>";
                  return $msg;
}else{
  $msg = "<span class='error'>Data Not Deleted !</span>";
                  return $msg;
}

  }

  public function getTotalRows(){
    $query = "SELECT * FROM tbl_power_ques";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

  public function getQuestion(){

    $query = "SELECT * FROM tbl_power_ques";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }
  public function getQuesByNumber($number){
    $query = "SELECT * FROM tbl_power_ques WHERE quesNo ='$number'";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }

  public function getAnswer($number){
    $query = "SELECT * FROM tbl_power_ans WHERE quesNo ='$number'";
    $getData = $this->db->select($query);
    return $getData;
  }
}


 ?>
