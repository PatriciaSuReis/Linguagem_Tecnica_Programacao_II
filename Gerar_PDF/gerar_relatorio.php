<?php
// BAIXAR BIBLIOTECA DO FPDF PARA ACESAR O ARQUIVO PARA GERAR O PDF 
require_once('fpdf185/fpdf.php');

class PDF extends FPDF {
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

//resolver problema com acentuação
public function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
{
        $txt = utf8_decode($txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
}

function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(48,115,73,45);
    $this->SetTextColor(255);
    $this->SetDrawColor(48,115,73,45);
    $this->SetLineWidth(.5);
    $this->SetFont('','B');

    // Header
    $w = array(35, 25, 100, 25);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();

    // Color and font restoration
    $this->SetFillColor(171,245,177,96);
    $this->SetTextColor(0);
    $this->SetFont('');

    // Data
    $fill = false;
    foreach($data as $row)
    {
        //método Cell(), que especifica quais lados do a célula deve ser desenhada. 
        // L = esquerda  R = direita
        // LR = centro
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

//instanciando
$pdf = new PDF();

// Column headings
$header = array('Nome', 'Curso', 'Disciplina', 'Média');

// Data loading
$data = $pdf->LoadData('alunos.csv');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();

?>