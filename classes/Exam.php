<?php
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


  public function getTotalRows(){
    $query = "select ( select count(*) from tbl_word_ques) + ( select count(*) from tbl_excel_ques) + ( select count(*) from tbl_excel_ques) as total_rows";
    $getResult = $this->db->select($query)->fetch_assoc();
    //$total = $getResult->num_rows;
    $total = $getResult['total_rows'];
    return $total;
  }

  public function getTotalResultRows(){
    $query = "SELECT * FROM tbl_result";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

 public function addWordScore($data){
   $score = $data;
   $id = Session::get("result_id");
   $name = Session::get('name');
   $query = "INSERT INTO tbl_result(name,result_id,word_score) VALUES('$name','$id','$score')";
   $inserted_row = $this->db->insert($query);
 }

 public function addExcelScore($data){
   $score = $data;
   $id = Session::get("result_id");
   $query = "UPDATE tbl_result SET excel_score='$score' WHERE result_id = '$id'";
   $inserted_row = $this->db->insert($query);
 }
 public function addPowerScore($data){
   $score = $data;
   $id = Session::get("result_id");
   $query = "UPDATE tbl_result SET power_score='$score' WHERE result_id = '$id'";
   $inserted_row = $this->db->insert($query);
 }

 public function addTotalScore($data){
   $score = $data;
   $id = Session::get("result_id");
   $query = "UPDATE tbl_result SET total_score='$score' WHERE result_id = '$id'";
   $inserted_row = $this->db->insert($query);
 }

 public function UpExcelScore($data){
   $score = $data;
   $query = "INSERT INTO tbl_word_score(score) VALUES('$score')";
   $inserted_row = $this->db->insert($query);
 }

 public function getWordScore(){
   $id = Session::get("result_id");
   $query = "SELECT word_score FROM tbl_result WHERE result_id = '$id'";
   $result = $this->db->select($query)->fetch_assoc();
   $res = $result['word_score'];
   return $res;
 }

 public function getExcelScore(){
   $id = Session::get("result_id");
   $query = "SELECT excel_score FROM tbl_result WHERE result_id = '$id'";
   $result = $this->db->select($query)->fetch_assoc();
   $res = $result['excel_score'];
   return $res;
 }

 public function getPowerScore(){
   $id = Session::get("result_id");
   $query = "SELECT power_score FROM tbl_result WHERE result_id = '$id'";
   $result = $this->db->select($query)->fetch_assoc();
   $res = $result['power_score'];
   return $res;
 }

 public function getTotalScore(){
   $id = Session::get("result_id");
   $query = "SELECT SUM(word_score) + SUM(excel_score) + SUM(power_score) as result
             FROM tbl_result
             WHERE result_id = '$id'";
   $result = $this->db->select($query)->fetch_assoc();
   $res = $result['result'];
   return $res;
 }

}
?>
