    <?php
    require('fpdf/fpdf.php');

    include "./php/conexion.php";
    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        
        $this->Image('./assets/img/placa.png',15,18,90);
        // Arial bold 15
        $this->Cell(70);
        $this->Image('./assets/img/placa2.png',125,15,20);
        $this->Image('./assets/img/placa3.png',170,17,15);
        $this->Image('./assets/img/aguila.png',170,242,30);
        $this->Ln(15);
        // $this->SetFont('Times','B',20);
        // // Movernos a la derecha
        // $this->Cell(60);
        // $this->Cell(80,5,'Industrial y de Servicios No.67',0,0,'L');
        $this->Ln(15);
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        
        $this->Cell(70,25,'Datos de Pre-Registro',0,0,'C');
        // Salto de línea
        $this->Ln(25);
    }



    }

    $curp=$_GET['CURP'];
    $consulta = "SELECT * FROM aspirante WHERE CURP='$curp'";
    $resultado = consultarSQl($consulta);

    $pdf = new PDF();
    $pdf-> AliasNbPages();
    $pdf->AddPage();





    $row = $resultado->fetch_assoc();
        //agregando nombre por principio el apellido paterno, apellido materno, nombre
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(35, 10,'Nombre', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(53, 10, utf8_decode($row['apellidoPaterno']), 0, 0, 'C', 0);
        $pdf->Cell(53, 10, utf8_decode($row['apellidoMaterno']), 0, 0, 'C', 0);
        $pdf->Cell(53, 10, utf8_decode($row['nombre']), 0, 1, 'C', 0);
        
        
        $pdf->Ln(3);
        
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(21, 10,'Folio', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(55, 10, $row['folio'], 0, 0, 'L', 0);
        
        
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(20, 10,'CURP', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, $row['CURP'], 0, 1, 'L', 0);
        $pdf->Ln(3);
        
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(76, 10,'Escuela de Procedencia', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, utf8_decode($row['nombreEscuela']), 0, 1, 'L', 0);
        $pdf->Ln(3);
        
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(76, 10,'Municipio', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, utf8_decode($row['municipioEscuela']), 0, 1, 'L', 0);
        $pdf->Ln(3);

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(76, 10,'Opcion 1 de especialidad', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, $row['especialidad1'], 0, 1, 'L', 0);
        $pdf->Ln(3);
        
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(76, 10,'Opcion 2 de especialidad', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, $row['especialidad2'], 0, 1, 'L', 0);
        $pdf->Ln(3);
        
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(76, 10,'Opcion 3 de especialidad', 0, 0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, $row['especialidad3'], 0, 1, 'L', 0);
        $pdf->Ln(5);
        
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(76, 10,'Registro exitoso ahora deberas  esperar indicaciones en la pagina oficial para acudir al plantel y dirigirte', 0, 1,'L');
        
        $pdf->Cell(90, 10,'al departamento de servicios escolares con todas la medidas de sanidad.', 0, 1,'L');
    
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(7, 10,'Requisitos', 0, 1,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, utf8_decode('* 2 fotografias tamaño infantil de frente B/N.'), 0, 1, 'L', 0);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(90, 10, utf8_decode('* Certificado de estudios (SI YA CUENTA CON EL DOCUMENTO).'), 0, 1, 'L', 0);
        $pdf->Ln(5);
        $pdf->Cell(175, 10,'_____________________', 0, 1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(175, 10,'Sello', 0, 1,'C');

        $pdf->Ln(1);
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(60, 10,'La fecha del  examen de admision sera publicada  posteriormente en la pagina oficial del CBTis67, favor de estar atentos. ', 0, 1,'L');
        $pdf->Ln(1);
        $pdf->Cell(7, 10,utf8_decode('Facebook: Lic. Ricardo Lunagómez CBTis 67 Oficial  Página web: https://cbtis67.com'), 0, 1,'L');
        
        // Asigna como nombre de titulo y de descarga a la CURP
        $pdf->SetTitle($row['CURP']);    
        $pdf->Output($row['CURP'].".pdf", 'I');
    ?>