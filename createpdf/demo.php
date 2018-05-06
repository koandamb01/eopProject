<?php 
require "fpdf.php";
require '../functions/pdo.php';

class myPDF extends FPDF{
    function header(){
        //$this->image('logo.png',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Mentor Schedule',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'Mentor Full Name Here',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
   function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'Period/Day',1,0,'C');
        $this->Cell(40,10,'Monday',1,0,'C');
        $this->Cell(40,10,'Tuesday',1,0,'C');
        $this->Cell(60,10,'Wednesday',1,0,'C');
        $this->Cell(38,10,'Thursday',1,0,'C');
        $this->Cell(30,10,'Friday',1,0,'C');
        $this->Ln();
    }
    
   /* function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query('select * from tablepaginate');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(20,10,$data->ID,1,0,'C');
            $this->Cell(40,10,$data->Name,1,0,'L');
            $this->Cell(40,10,$data->Position,1,0,'L');
            $this->Cell(60,10,$data->Office,1,0,'L');
            $this->Cell(38,10,$data->Age,1,0,'L');
            $this->Cell(30,10,$data->Start_date,1,0,'L');
            $this->Cell(50,10,$data->Salary,1,0,'R');
            $this->Ln();
        }
    }*/
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->Output();