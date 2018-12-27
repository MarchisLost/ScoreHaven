<?php
require 'fpdf181\fpdf.php';
include '..\conecta_bd.php';

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
ob_start();

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

session_start();
//variaveis a receber de session do login do user
$sql_username=$_SESSION["username"];
$sql_email=$_SESSION["email"];
$sql_date=$_SESSION["data_insc"];

//Buscar os nomes dos gostos do user
$sql_select2="SELECT desporto.nome_d, liga.nome_l, equipa.nome_e FROM users
INNER JOIN desporto on users.id_d= desporto.id_d
INNER JOIN liga on users.id_l= liga.id_l
INNER JOIN equipa on users.id_e= equipa.id_e
WHERE users.username='$sql_username'";
$res_favs = $ligacao->query($sql_select2);
$dados=$res_favs -> fetch_assoc();

$pdf->SetFont('Arial','B',10);
//Table1 user Title
//Cell ( width, height, text, border, end line, [align], fill, link)
$pdf->SetFillColor(255, 0, 128);
$pdf->Cell(189,5,'User Information',1,1,'C',1);

//table
$pdf->SetFillColor(255, 204, 230);
$pdf->Cell(94.5,5,'Username',1,0,'L',1);
$pdf->Cell(94.5,5,$sql_username,1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Email',1,0,'L',0);
$pdf->Cell(94.5,5,$sql_email,1,1,'L',0);//end line
$pdf->Cell(94.5,5,'Date of Registration',1,0,'L',1);
$pdf->Cell(94.5,5,$sql_date,1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Favorite Sport',1,0,'L',0);
$pdf->Cell(94.5,5,$dados['nome_d'],1,1,'L',0);//end line
$pdf->Cell(94.5,5,'Favourite League',1,0,'L',1);
$pdf->Cell(94.5,5,$dados['nome_l'],1,1,'L',1);//end line
$pdf->Cell(94.5,5,'Favorite Team',1,0,'L',0);
$pdf->Cell(94.5,5,$dados['nome_e'],1,1,'L',0);//end line

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
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',0);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',0);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',0);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',0);//end line

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
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',0);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',0);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',0);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',0);//end line

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
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',0);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',0);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',1);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',1);//end line
$pdf->Cell(94.5,5,'ir buscar bd',1,0,'L',0);
$pdf->Cell(94.5,5,'Ir bd',1,1,'L',0);//end line

$pdf-> Output();
ob_end_flush();
?>