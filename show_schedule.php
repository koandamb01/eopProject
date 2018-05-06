<?php
    require "createpdf/fpdf.php";
    require 'functions/pdo.php';


$mentor_id = 11;
$sql = 'SELECT * FROM tblschedule WHERE mentor_id = :mentor_id AND period = :period ORDER BY day ASC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mentor_id' => $mentor_id, 'period' => 1]);
    $rows1 = $stmt->fetchAll();

    $stmt->execute(['mentor_id' => $mentor_id, 'period' => 2]);
    $rows2 = $stmt->fetchAll();

    $Schedule_1 = array();
    $Schedule_2 = array();


    for ($i=1; $i <= 5; $i++) { 
    
        $check = false;
        foreach ($rows1 as $row) {
            
            if($row->day == $i){
                $Schedule_1[$i] = array($row->start_at, $row->end_at);
                $check = true;
            }
        }

        if($check == false){
            $Schedule_1[$i] = 0;
        }
    }


    for ($i=1; $i <= 5; $i++) { 
    
        $check = false;
        foreach ($rows2 as $row) {
            
            if($row->day == $i){
                $Schedule_2[$i] = array($row->start_at, $row->end_at);
                $check = true;
            }
        }

        if($check == false){
            $Schedule_2[$i] = 0;
        }
    }


$sql = 'SELECT course_name FROM tblcourses WHERE mentor_id = :mentor_id ORDER BY course_name ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute(['mentor_id' => $mentor_id]);
$rows = $stmt->fetchAll();

class myPDF extends FPDF{

     function header(){
        //$this->image('logo.png',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'EOP ACADEMIC MENTOR SCHEDULE',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'Academic Mentor Name Here',0,0,'C');
        $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }


    function headerTable(){
        $this->SetX(13);
        $this->SetFont('Times','B',12);
        $this->Cell(45,20,'Period/Day',1,0,'C');
        $this->Cell(45,20,'Monday',1,0,'C');
        $this->Cell(45,20,'Tuesday',1,0,'C');
        $this->Cell(45,20,'Wednesday',1,0,'C');
        $this->Cell(45,20,'Thursday',1,0,'C');
        $this->Cell(45,20,'Friday',1,0,'C');
        $this->Ln();
    }

    function viewTable($Schedule_1, $Schedule_2, $rows){
        $this->SetX(13);
        $this->SetFont('Times','',12);
            
        $this->Cell(45,20,'Morning',1,0,'C');
        foreach($Schedule_1 as $key => $value){

            if($value == 0){
                $this->Cell(45,20,' ',1,0,'C');
            }
            else{
                $this->Cell(45,20,$value[0]. ' TO ' .$value[1],1,0,'C');
            }
        }

        $this->Ln();
        $this->SetX(13);
        $this->Cell(45,20,'Evening',1,0,'C');
        foreach($Schedule_2 as $key => $value){

            if($value == 0){
                $this->Cell(45,20,' ',1,0,'C');
            }
            else{
                $this->Cell(45,20,$value[0]. ' TO ' .$value[1],1,0,'C');
            }
        }
        $this->Ln();
        $this->Ln();
        $this->Cell(276,10,'Mentor Courses',0,0,'C');
        $this->Ln();
        $this->SetX(13);
        
        $count = 0;
        foreach($rows as $row){
            
            if($count == 6){
                $this->Ln();
                $this->SetX(13);
                $count = 0;
            }
            $this->Cell(45,20,$row->course_name,1,0,'C');
            $count += 1;

        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($Schedule_1, $Schedule_2, $rows);
$pdf->Output();

?>





