<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
require "fpdf/fpdf.php";

define('FPDF_FONTPATH','font/');
//$db = new PDO('mysql:host=localhost;dbname=db_exam','root','');


class myPDF extends FPDF{
    function header(){
        $this->Ln(3);
        $this->image('img/logo.png',6,6,35,35);
      //  $this->AddFont('KHMER','','KHMER.php');
        // $this->SetFont('courier','B',18);
        // $this->Cell(200,15,'វិទ្យាស្ថាន ពាណិជ្ជសាស្រ្ត អេស៊ីលីដា',0,0,'C');
        $this->SetFont('Arial','B',18);
        $this->Cell(200,15,'ACLEDA INSTITUTE of BUSINESS',0,0,'C');
        $this->Ln(2);
        $this->SetFont('Arial','B',15);
        $this->Cell(200,40,'COMPUTER TEST RESULT',0,0,'C');
        $this->Ln(20);
        //$this->Cell(40, 60, "Inscription Number", 0, 1, 'C');
        $this->SetFont('Times','',12);
        date_default_timezone_set("Asia/Bangkok");
        $this->Cell(191,10,'Date:  '.date('d/m/Y'),0,0,'R');
        $this->Ln(5);
        $this->Cell(190,10,'Time:  '.date('h:i A'),0,0,'R');
        $this->Ln(20);

    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->SetFont('Times','',12);
      //  $this->Cell(276,0,'Street Address of Office',0,0,'C');
        //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(15,10,'ID',1,0,'C');
        $this->Cell(40,10,'Name',1,0,'C');
        $this->Cell(25,10,'Word',1,0,'C');
        $this->Cell(25,10,'Excel',1,0,'C');
        $this->Cell(25,10,'PowerPoint',1,0,'C');
        $this->Cell(30,10,'Total Score',1,0,'C');
        $this->Cell(30,10,'Grade',1,0,'C');
        $this->Ln();
    }
    function viewTable(){
        $this->SetFont('Times','',12);
        $db = new Database();
      //  $stmt = $db->query('SELECT result_id,name,word_score,excel_score,power_score,total_score,grade FROM tbl_result');
        $query = "SELECT result_id,name,word_score,excel_score,power_score,total_score,grade FROM tbl_result";
        $result = $db->select($query);
        while($data = $result->fetch_assoc()) {
            $this->Cell(15,10,$data['result_id'],1,0,'C');
            $this->Cell(40,10,$data['name'],1,0,'C');
            $this->Cell(25,10,$data['word_score'],1,0,'C');
            $this->Cell(25,10,$data['excel_score'],1,0,'C');
            $this->Cell(25,10,$data['power_score'],1,0,'C');
            $this->Cell(30,10,$data['total_score'],1,0,'C');
            $this->Cell(30,10,$data['grade'],1,0,'R');
            $this->Ln();
        }
        //draw line
      //  $this->Ln(15);
        //$actual_position_y = $this->GetY();
        // $this->SetFillColor(255, 255, 255);
        // $this->SetDrawColor(5, 3, 0);
        //$this-> SetXY(18,180);
        $this->SetFont('Times','',10);
      //  $this->Cell(190, 25, "", 1, 1, 'C');
        $this->Cell(125,25,'Class grade are based on a 100.00 scale Grade point average is computed on a 4.0 scale',0,0,'C');
        $this->Ln(8);
        $this->Cell(98,20,'A (85-100) = Excellent, B (80-84) = Very Good, C (70-79) = Good ',0,0,'C');
        $this->Ln(5);
        $this->Cell(53,20,'D (65-69) = Fairly Good, E (50-64)',0,0,'C');


          //$this->SetXY(18, 5);
        //Your actual content

    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
