<?php
require 'fpdf181\fpdf.php';
//include 'conecta_bd.php';

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

//set font Arial, bold, 14pt
$pdf->SetFont('Arial','B',14);
//Cell ( width, height, text, border, end line, [align], fill, link)

//Cabeçalho
$pdf->Cell(130,6,'Pool Statistics',0,0,'L');
$pdf->Cell(59,6,'2018/19',0,1,'R');//End line
$pdf->Ln(2);//pequeno break entre as duas linhas

$pdf->SetFont('Arial','',12);
$pdf->Cell(130,6,'Resuls',0,1,'L');//End line

//Ln -> Line break (height), By default, the value equals the height of the last printed cell.
$pdf->Ln(12);

$pdf->SetFont('Arial','B',10);
//Table1 user Title
//Cell ( width, height, text, border, end line, [align], fill, link)
$pdf->SetFillColor(255, 0, 128);
$pdf->Cell(189,5,'User Information',1,1,'C',1);

$fundo = false; //variavel ira mudar a cor das linhas
//table
$pdf->SetFillColor(255, 204, 230);
$pdf->Cell(94.5,5,'Username',1,0,'L',1);
$pdf->Cell(94.5,5,'ir buscar bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Email',1,0,'L',1);
$pdf->Cell(94.5,5,'ir buscar bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Date of Registration',1,0,'L',1);
$pdf->Cell(94.5,5,'ir buscar bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Favorite Sport',1,0,'L',1);
$pdf->Cell(94.5,5,'ir buscar bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Favourite League',1,0,'L',1);
$pdf->Cell(94.5,5,'ir buscar bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Favorite Team',1,0,'L',1);
$pdf->Cell(94.5,5,'ir buscar bd',1,1,'L',1);//end line

$pdf->Ln(15);//break entre tabelas

/*----------------------------table deporto----------------------------------------*/
//Table2 deporto Title
//Cell ( width, height, text, border, end line, [align], fill, link)
$pdf->SetFillColor(255, 0, 128);
$pdf->Cell(189,5,'Sport Results',1,1,'C',1);

//Table
$pdf->SetFillColor(255, 204, 230);
$pdf->Cell(94.5,5,'No Likes',1,0,'L',1);
$pdf->Cell(94.5,5,'Sport Name',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line

$pdf->Ln(15);//break entre tabelas

/*----------------------------table liga-------------------------------------------*/
//Table3 liga Title
//Cell ( width, height, text, border, end line, [align], fill, link)
$pdf->SetFillColor(255, 0, 128);
$pdf->Cell(189,5,'League Results',1,1,'C',1);

//Table
$pdf->SetFillColor(255, 204, 230);
$pdf->Cell(94.5,5,'No Likes',1,0,'L',1);
$pdf->Cell(94.5,5,'League Name',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line

$pdf->Ln(15);//break entre tabelas

/*----------------------------table equipa-----------------------------------------*/
//Table4 equipa Title
//Cell ( width, height, text, border, end line, [align], fill, link)
$pdf->SetFillColor(255, 0, 128);
$pdf->Cell(189,5,'Team Results',1,1,'C',1);

//Table
$pdf->SetFillColor(255, 204, 230);
$pdf->Cell(94.5,5,'No Likes',1,0,'L',1);
$pdf->Cell(94.5,5,'Team Name',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line

$pdf->Ln(15);//break entre tabelas


/*$fundo = false;
session_start();
$sql_id_questionario=$_SESSION['id_questionario'];
$sql_select="SELECT * FROM resposta
LEFT JOIN pergunta
ON id_p = id_pergunta WHERE nr_questionario = '$sql_id_questionario'";
$res = $ligacao->query($sql_select);
$pdf->SetFont('Arial','',10);
while ($registo=$res->fetch_assoc()){
	$pdf->SetFillColor(255, 128, 192);

	//Cell ( width, height, text, border, end line, [align], fill, link)
	$pdf->Cell(47.25,5,$registo['id_r'],1,0,'C',$fundo);
	$pdf->Cell(47.25,5,$registo['questao'],1,0,'C',$fundo);
	$pdf->Cell(47.25,5,$registo['resposta'],1,0,'C',$fundo);
	$pdf->Cell(47.25,5,$registo['nr_questionario'],1,1,'C',$fundo);//End Line
	$fundo = !$fundo;
}*/
$pdf-> Output();
?>
