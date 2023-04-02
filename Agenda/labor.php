<?php

//Conexion con la DB y toma de datos del formulario
require('..\Includes\fpdf\fpdf.php');
require('..\db.php');

if(isset($_POST['labor_mensual'])){
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $sig = $mes + 1;
    $logo = "";
  

  switch($mes){
    case 1:
    $mes_palabra = "Enero";
    $logo = "..\Assets\\enero.jpg";
    break;

    case 2:
    $mes_palabra = "Febrero";
    $logo = "..\Assets\\febrero.jpg";
    break;
  
    case 3:
    $mes_palabra = "Marzo";
    $logo = "..\Assets\Marzo.jpg";
    break;
  
    case 4:
    $mes_palabra = "Abril";
    $logo = "..\Assets\abril.jpg";
    break;

    case 5:
    $mes_palabra = "Mayo";
    $logo = "..\Assets\mayo.jpg";
    break;

    case 6:
    $mes_palabra = "Junio";
    $logo = "..\Assets\junio.jpg";
    break;

    case 7:
    $mes_palabra = "Julio";
    $logo = "..\Assets\julio.jpg";
    break;

    case 8:
    $mes_palabra = "Agosto";
    $logo = "..\Assets\agosto.jpg";
    break;

    case 9:
    $mes_palabra = "Septiembre";
    $logo = "..\Assets\septiembre.jpg";
    break;

    case 10:
    $mes_palabra = "Octubre";
    $logo = "..\Assets\octubre.jpg";
    break;
  
    case 11:
    $mes_palabra = "Noviembre";
    $logo = "..\Assets\Noviembre.jpg";
    break;
  
    case 12:
    $mes_palabra = "Diciembre";
    $logo = "..\Assets\diciembre.jpg";
    break;
  }
}


class PDF extends FPDF{
// Cabecera de página

function Header(){
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(80,10,'Labor mensual',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0);
    $this->SetX(-90);
    $this->Cell(0,10,'Creado por sistema Intervenciones EOE',0,0, 'R');
}
}

// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image("$logo",10,8,30,20);
$pdf->Image("$logo",160,8,30,20);
$pdf->SetFont('Times','I',14);
$pdf->Cell(0,10,'Mes: '.$mes_palabra. " de "."$anio",0,1);

//Listado de intervenciones con alumnos del mes
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Intervenciones con Alumnos',0,1);
$pdf->Ln(5);
$pdf->SetFont('Times','B',11);
$pdf->Cell(30, 10, utf8_decode("Fecha"), 1, 0);
$pdf->Cell(30, 10, utf8_decode('Alumno'), 1, 0);
$pdf->Cell(30, 10, utf8_decode('Grado'), 1, 0);
$pdf->Cell(90, 10, utf8_decode('Intervención'), 1, 0);
$pdf->Ln(10);
$pdf->SetFont('Times','',11);
$query = "SELECT i.Fecha, i.Intervención, a.Nombre, a.Grado FROM `intervenciones-alumnos` AS i INNER JOIN Alumnos AS a WHERE (Fecha >= '$anio-$mes-1') AND (Fecha < '$anio-$sig-1') AND i.alumno = a.ID ORDER BY Fecha DESC";
          $result_tasks = mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result_tasks)) {
            $pdf->Cell(30, 10, utf8_decode($row['Fecha']), 1, 0);
            $pdf->Cell(30, 10, utf8_decode($row['Nombre']), 1, 0);
            $pdf->Cell(30, 10, utf8_decode($row['Grado']), 1, 0);            
            $pdf->MultiCell(90, 10, utf8_decode($row['Intervención']), 1, 0);
          }

//Listado de intervenciones con docentes del mes
$pdf->Ln(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Intervenciones con Docentes',0,1);
$pdf->Ln(5);
$pdf->SetFont('Times','B',11);
$pdf->Cell(30, 10, utf8_decode("Fecha"), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode('Docente'), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode('Grado'), 1, 0, 'C', 0);
$pdf->Cell(90, 10, utf8_decode('Intervención'), 1, 0, 'C', 0);
$pdf->Ln(10);
$pdf->SetFont('Times','',11);
$query = "SELECT i.Fecha, i.Intervención, d.Nombre, d.Grado FROM `intervenciones-docentes` AS i INNER JOIN Docentes AS d WHERE (Fecha >= '$anio-$mes-1') AND (Fecha < '$anio-$sig-1') AND i.docente = d.ID ORDER BY Fecha DESC";
          $result_tasks = mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result_tasks)) {
            $pdf->Cell(30, 10, utf8_decode($row['Fecha']), 1, 0);
            $pdf->Cell(30, 10, utf8_decode($row['Nombre']), 1, 0);
            $pdf->Cell(30, 10, utf8_decode($row['Grado']), 1, 0);            
            $pdf->MultiCell(90, 10, utf8_decode($row['Intervención']), 1, 0);
          }

//Listado de intervenciones como EOE
$pdf->Ln(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Intervenciones desde el EOE',0,1);
$pdf->Ln(5);
$pdf->SetFont('Times','B',11);
$pdf->Cell(30, 10, utf8_decode("Fecha"), 1, 0, 'C', 0);
$pdf->Cell(150, 10, utf8_decode('Intervención'), 1, 0, 'C', 0);
$pdf->Ln(10);
$pdf->SetFont('Times','',11);
$query = "SELECT * FROM `intervenciones-emergentes` WHERE (Fecha >= '$anio-$mes-1') AND (Fecha < '$anio-$sig-1') ORDER BY Fecha DESC";
          $result_tasks = mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result_tasks)) {
            $pdf->Cell(30, 10, utf8_decode($row['Fecha']), 1, 0);
            $pdf->MultiCell(150, 10, utf8_decode($row["Intervencion"]), 1, 0);
          }

//Firma y aclaración
$pdf->Ln(50);
$pdf->Cell(30, 10, utf8_decode("___________________________________"), 0, 0);
$pdf->Cell(80);
$pdf->Cell(30, 10, utf8_decode("___________________________________"), 0, 1);
$pdf->Cell(30);
$pdf->Cell(20, 10, utf8_decode("Firma"));
$pdf->Cell(85);
$pdf->Cell(30, 10, utf8_decode("Aclaración"));

$pdf->Output();
?>