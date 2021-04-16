<?php
if (isset($_GET['as_id']) && isset($_GET['sub_code']))  {
  include_once './includes/dbcon.php';
  $ans_sheet_id=base64_decode($_GET['as_id']);
  $sub_code=base64_decode($_GET['sub_code']);
  $sqli =$link->query("SELECT * FROM `studentdetails` WHERE student_id='$ans_sheet_id'") ;
 if ($sqli->num_rows > 0) {
  $data = $sqli->fetch_assoc();
  $ex_id=$data['ex_id'];
}
$s = $link->query(" SELECT * FROM `exam_details` WHERE ex_id ='$ex_id'") ;
if ($s->num_rows > 0) {
  $que_det = $s->fetch_assoc();
}
}
else {
  header("location:./");
}
 ?>
<?php

$sql =" SELECT * FROM `response` WHERE student_id ='$ans_sheet_id' and type='mcq'" ;
$da = $link->query($sql);
 ?>
 <?php

 $sq =" SELECT * FROM `response` WHERE student_id ='$ans_sheet_id' and type='que_ans'" ;
 $d = $link->query($sq);
  ?>
 <?Php
require('./fpdf/fpdf.php');

class PDF extends FPDF
{
  //for paragraph
  function WordWrap(&$text, $maxwidth)
{
   $text = trim($text);
   if ($text==='')
       return 0;
   $space = $this->GetStringWidth(' ');
   $lines = explode("\n", $text);
   $text = '';
   $count = 0;

   foreach ($lines as $line)
   {
       $words = preg_split('/ +/', $line);
       $width = 0;

       foreach ($words as $word)
       {
           $wordwidth = $this->GetStringWidth($word);
           if ($wordwidth > $maxwidth)
           {
               // Word is too long, we cut it
               for($i=0; $i<strlen($word); $i++)
               {
                   $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                   if($width + $wordwidth <= $maxwidth)
                   {
                       $width += $wordwidth;
                       $text .= substr($word, $i, 1);
                   }
                   else
                   {
                       $width = $wordwidth;
                       $text = rtrim($text)."\n".substr($word, $i, 1);
                       $count++;
                   }
               }
           }
           elseif($width + $wordwidth <= $maxwidth)
           {
               $width += $wordwidth + $space;
               $text .= $word.' ';
           }
           else
           {
               $width = $wordwidth + $space;
               $text = rtrim($text)."\n".$word.' ';
               $count++;
           }
       }
       $text = rtrim($text)."\n";
       $count++;
   }
   $text = rtrim($text);
   return $count;
}

// Page header
function Header()
{
 $this->SetY(20);
 $this->Rect(5, 5, 200, 287, 'D');
}
// Page footer
function Footer()
{
 $this->SetY(-10);
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetMargins(24,62,24);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->Image('../dist/img/logo-pdf.jpg',20,10,20,20);
$pdf->Text(42,19,'INDIAN INSTITUTE OF TECHNOLOGY , PATNA-801106');
$pdf->Line(5, 32, 210-5, 32);
$pdf->SetFont('Times','',13);
$pdf->Text(100,26,$que_det['exam_type']);
$pdf->SetFont('Times','B',15);
$pdf->Text(90,39,'Answer Sheet');
$pdf->SetFont('Times','',13);
$pdf->Text(160,42,'Subject Code:'.$que_det['sub_code']);
$pdf->SetFont('Times','',12);
$pdf->SetY(50);
$pdf->Cell(0,0,'Answer Sheet ID :'.$ans_sheet_id,0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(8,8,'',0,1);
$pdf->Cell(0,0,'Name of student:  '.$data['name'],0,1);
$pdf->Cell(8,8,'',0,1);
$pdf->Cell(0,0,'Roll no  :   '.$data['roll'],0,1);
$pdf->Cell(8,8,'',0,1);
$pdf->Cell(0,0,'Attend on:   '.$data['login_time'],0,1);
$pdf->Cell(8,8,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,0,'Exam Id  :'.$data['ex_id'],0,1);
$pdf->Cell(8,8,'',0,1);
$pdf->Cell(0,0,'Exam Type :  '.$que_det['exam_type'],0,1);
$pdf->Cell(8,8,'',0,1);
$pdf->Cell(0,0,'Semester :  '.$que_det['semester'],0,1);
$pdf->Cell(8,8,'',0,1);
$pdf->Cell(0,0,'Full Marks :  '.$que_det['f_marks'],0,1);
$pdf->Cell(8,8,'',0,1);
$pdf->Cell(3,3,'',0,1);
$pdf->Line(5, 110, 210-5, 110);

if ($da!=null) {

  $count=0;
  $pdf->SetFont('Times','B',18);
  $pdf->Cell(0,0,'                                  MCQ based Questions ',0,1);
  $pdf->Cell(8,8,'',0,1);
  $pdf->SetFont('Times','',12);
while ($rows = $da->fetch_assoc()) {
    $count++;
    $question = $rows['question'];
    $answer=$rows['answer'];
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(0,0,"(".$count.").".$question,0,1);
    $pdf->Cell(8,3,'',0,1);
    $text=str_repeat($answer,1);
    $pdf->SetFont('Times','',12);
    $pdf->Write(5,$text);
    $pdf->Cell(8,8,'',0,1);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(0,0," Marks:   ".$rows['mark'],0,1);
    $pdf->Cell(8,8,'',0,1);
    $pdf->Ln();
  }
  }
  if ($d!=null) {

    $count=0;
    $pdf->SetFont('Times','B',18);
    $pdf->Cell(0,0,'                                  Answer based Questions ',0,1);
    $pdf->Cell(8,8,'',0,1);
    $pdf->SetFont('Times','',12);
  while ($row = $d->fetch_assoc()) {
      $count++;
        $question = $row['question'];
        $answer=$row['answer'];
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,0,"(".$count.").".$question,0,1);
        $pdf->Cell(8,3,'',0,1);
        $text=str_repeat($answer,1);
        $pdf->SetFont('Times','',12);
        $pdf->Write(5,$text);
        $pdf->Cell(8,8,'',0,1);
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(0,0," Marks:   ".$row['mark'],0,1);
        $pdf->Cell(8,8,'',0,1);
        $pdf->Ln();
    }
    }





$pdf->Output('Subject Code : '.$sub_code.'  | Answer Sheet ID:'.$ans_sheet_id.'.pdf',"I");
?>
